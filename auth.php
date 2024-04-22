<?php
// error_reporting(E_ALL);
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);

session_start();

class MyRequest
{
	public static function getVar($name, $defval = "")
	{
		$val = $defval;
		if (isset($_POST[$name]))
			$val = $_POST[$name];
		else if (isset($_GET[$name]))
			$val = $_GET[$name];

		return $val;
	}
}

class MyAuth
{
	private $filename;
	private $is_authorized;
	private $user_login;
	private $auth_meth;

	public function __construct($file_auth)
	{
		$this->filename = $file_auth;
		$this->is_authorized = false;
		$this->user_login = "";
		$this->auth_meth = "csv";
	}

	public function setAuthMethod($meth = "csv") {
		$this->auth_meth = $meth;
	}

	public function checkIfAuth() {
		if (isset($_SESSION['im_is_auth']) && ($_SESSION['im_is_auth'] != "")) {
			return true;
		}

		return false;
	}

	private function makeAuthCSV($login, $pass)
	{
		$f = fopen($this->filename, "r");
		if (!$f)
			return false;

		while (($data = fgetcsv($f, 1000, ";")) !== false) {
			// var_dump($data);
			// echo "<br>";
			if (count($data) >= 2) {
				if (($data[0] == $login) && ($data[1] == md5($pass))) {
					fclose($f);
					return true;
				}
			}
		}

		return false;
	}

	public function makeAuthDB($login, $pass) {
		return false;
	}

	public function makeAuth($login, $pass) {
		if ($this->auth_meth == "csv") {
			if ($this->makeAuthCSV($login, $pass)) {
				$_SESSION['im_is_auth'] = $login;
				return true;
			}
		}
		else if ($this->auth_meth == "db") {
			$this->makeAuthDB($login, $pass);
		}

		return false;
	}

	public function makeLogout() {
		unset($_SESSION['im_is_auth']);
	}
}


include "php/header.php";

$login = MyRequest::getVar("login", "");
$pass = MyRequest::getVar("pass", "");
$action = MyRequest::getVar("action", "");

$auth = new MyAuth("user.csv");
$is_auth = false;
if ($action == "signinform") {
	$auth = new MyAuth("user.csv");
	if ($auth) {
		$is_auth = $auth->makeAuth($login, $pass);

		// if ($is_auth) {
		// 	$_SESSION['im_is_auth'] = $login;
		// }
	}
} else if ($action == "makelogout") {
	// unset($_SESSION['im_is_auth']);
	$auth->makeLogout(); 
}

echo '<div class="content" style="text-align: center; min-width: 500px;">';
// echo '<div>'.md5('mypass11').'</div>';
// echo '<div>'.md5('mypass22').'</div>';
// var_dump($_SESSION);
echo '<div style="color: red; padding: 20px; text-align: center;">
	' . ($is_auth ? "Form action Now Authorized" : "Form action Now Guest") . '
	</div>';

if (isset($_SESSION['im_is_auth']) && ($_SESSION['im_is_auth'] != "")) {
	echo "<div>Your are logged in as " . $_SESSION['im_is_auth'] . "</div><br>";

	echo '<a style="font-size: 20px; text-decoration: underline;" href="?action=makelogout">Log out</a>';
} 
else {
?>

	<form class="cms-admin sign-in table checked" method="post">
		<input type="hidden" name="action" value="signinform">
		<label for="login">Login:</label>
		<input type="text" id="login" name="login" value="<?= str_replace("\"", "&quot;", $login) ?>">
		<label for="pass">Password:</label>
		<input type="password" id="pass" name="pass" value="<?= str_replace("\"", "&quot;", $pass) ?>">
		<button type="submit" class="submit-signin">Sign in</button>
	</form>
<?
}
echo '</div>';

include "php/footer.php";
?>