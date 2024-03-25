<?php
// error_reporting(E_ALL);
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
include "php/header.php";
include "php/func.php";

$ages = Array(
	"until16" => "until 16",
	"16-21" => "16-21",
	"21-27" => "21-27",
	"27-35" => "27-35",
	"35-45" => "35-45",
	"45-55" => "45-55",
	"55+" => "55+"
);
$err = "";
$view = "";
$pattern = "/^[a-zA-Z]+$/";
$action = getVar("action", "");
$fname = getVar("first_name", "");
$lname = getVar("last_name", "");
$pname = getVar("patronymic", "");
$age = getVar("age", "");

if ( $action == "regform" ) {
	if (!preg_match($pattern, $fname)) {
		$err .= "Enter non-latin characters in First`s Name Field<br>";
	}
	if (!preg_match($pattern, $lname)) {
		$err .= "Enter non-latin characters in Last`s Name Field<br>";
	}
	if (!preg_match($pattern, $pname)) {
		$err .= "Enter non-latin characters in Patronymic`s Field<br>";
	}
	
	if ($err == "") {
		$view = "success";
	} else {
		echo '<div class="form-err" style="text-align:center;">' . $err . '</div>';
	}
}

if ( $view != "success") {
?>
<div class="content">
	<form class="table" method="post">
		<input type="hidden" name="action" value="regform">
		<div class="grid-item">
			<label for="first_name">First Name:</label>
			<input type="text" id="first_name" name="first_name" value="<?=str_replace("\"", "&quot;", $fname)?>">
		</div>
		<div class="grid-item">
			<label for="last_name">Last Name:</label>
			<input type="text" id="last_name" name="last_name" value="<?=str_replace("\"", "&quot;", $lname)?>">
		</div>
		<div class="grid-item">
			<label for="patronymic">Patronymic:</label>
			<input type="text" id="patronymic" name="patronymic" value="<?=str_replace("\"", "&quot;", $pname)?>">
		</div>
		<div class="grid-item">
			<label for="age">Age:</label>
			<select id="age" name="age">
				<?php
					foreach($ages as $k => $v)
					{
						echo '<option value="'.$k.'"'.($age == $k ? 'selected' : "").'>'.$v.'</option>';
					}
				?>
			</select>
		</div>
		<div class="grid-item">
			<label for="about">About self:</label>
			<textarea id="about" name="about"></textarea>
		</div>
		<div class="grid-item">
			<button type="submit">Send</button>
		</div>
	</form>
</div>
<?php
} else {
	echo '<p style="text-align:center; color:d9d9d9; font-size:26px;">You are registered. Good luck with the site</p>';
}

include "php/footer.php";
?>