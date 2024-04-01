<?php
// error_reporting(E_ALL);
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
include "php/header.php";
include "php/func.php";

$login = getVar("login", "");
$pass = getVar("pass", "");

?>
<div class="content">
	<form class="cms-admin sign-in table checked" method="post">
		<input type="hidden" name="action" value="signinform">
		<label for="login">Login:</label>
		<input type="text" id="login" name="login" value="<?= str_replace("\"", "&quot;", $login) ?>">
		<label for="pass">Password:</label>
		<input type="password" id="pass" name="pass" value="<?= str_replace("\"", "&quot;", $pass) ?>">
		<button type="submit" class="submit-signin">Sign in</button>
	</form>
</div>
<?
include "php/footer.php";
?>