<?php
include "php/header.php";
include "php/func.php";

echo '<div class="content" style="text-align:center; float:left; font-size:14px; margin:0;">';
echo '<form action="" method="get">';
$baseDir_bool = true;
$baseDir = getcwd();
echo '<div style="margin-top:30px;">Main directory</div><br>';
echo $baseDir;
$curDir = !empty($_GET['newDir']) ? $_GET['newDir'] : '';
$curDir = realpath($curDir);
$path = $curDir;
if ($curDir) {
	if (is_dir($path)) {
		chdir($path);
	} else {
		echo '<div style="font-size:12px; color:red">' . '<br>It`s not directory<br>' . $path . '</div>';
		$path = $curDir = realpath($baseDir);
	}
	echo '<div style="margin-top:30px;">Current directory</div><br>';
	echo $path;
}
if ($baseDir == $path) {
	$baseDir_bool = true;
} else {
	$baseDir_bool = false;
}
$scan = create_array($curDir);
create_table($scan, $curDir, $baseDir_bool);
echo '</form>';
?>
	<div class="buttons-sort" style="margin:50px 0 0 0;">
		<form class="table" method="POST">
			<input type="submit" name="sort_up_name" value="up name" />
			<input type="submit" name="sort_down_name" value="down name" />
			<input type="submit" name="sort_up_dir" value="up dir" />
			<input type="submit" name="sort_down_dir" value="down dir" />
			<input type="submit" name="sort_up_size" value="up size" />
			<input type="submit" name="sort_down_size" value="down size" />
			<input type="submit" name="sort_up_date" value="up date" />
			<input type="submit" name="sort_down_date" value="down date" />
		</form>
	</div>
</div>

<?php
include "php/footer.php";
?>