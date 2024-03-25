<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
	<title>Lab 6</title>
</head>
<?php 
if (basename($_SERVER['PHP_SELF']) === 'animation.php') echo '<body 
		onload="animation(\'main\', {
		from: 0,
		to: 440,
		duration: 1000,
		type: \'break\' //linery, accel, break, sine
	})">';
?>
	<div class="wrapper">
		<header>
			<a class="logo" href="index.php" id="logo"><img src="img/logo.png" alt="SPT-TOWNDIRTY"></a>
			<p>best records music cds singers albums hits tracks spt-towndirty sound music best records music cds
				singers albums hits tracks spt-towndirty</p>
		</header>
		<main id="main">
			<nav>
					<ul>
						<li><a href="forms.php">sign in/up</a></li>
						<li><a href="about.php">about us</a></li>
						<li><a href="files.php">info-cd<span>s</span></a></li>
						<li><a href="animation.php">contacts</a></li>
						<li><a href="shop.php">records</a></li>
						<li><a href="redirection.php">news</a></li>
					</ul>
				</nav>