<?php
    include "php/header.php";

	echo '<div class="content" style="max-width:600px; margin:0; overflow-wrap:anywhere;">';
    echo '<h2 class="title">SERVER_VARIABLES</h2>';
	echo '<div class="server" style="display:grid; grid-template-columns: 1fr 2fr;">';	
    foreach ($_SERVER as $arg => $val) {
    	echo '<div class="arguments">' . $arg . '</div>';
		echo '<div class="value">' . $val . '</div>';
    }
	echo '</div>';
	
    if (count($_GET) > 0) {
		echo '<h2 class="title">GET_VARIABLES</h2>';
		echo '<div class="get" style="display:grid; grid-template-columns: 1fr 2fr;">';	

		foreach ($_GET as $arg => $val) {
			echo '<div class="arguments">' . $arg . '</div>';
			echo '<div class="value">' . $val . '</div>';
		}
		echo '</div>';
	}

    if (count($_POST) > 0) {
		echo '<h2 class="title"POST_VARIABLES</h2>';
		echo '<div class="post" style="display:grid; grid-template-columns: 1fr 2fr;">';

		foreach ($_POST as $arg => $val) {
			echo '<div class="arguments">' . $arg . '</div>';
			echo '<div class="value">' . $val . '</div>';
		}
		echo '</div>';
	}
	echo '</div>';

    include "php/footer.php";
?>