

<?php
# Spyke Main Index
require __DIR__ . '/../vendor/autoload.php';

$Auth = new \Group8\Spyke\Auth;

# $Auth->helloWorld();   ### REMOVE ON IMPLEMENTATION OF AUTH ###
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css"  href="assets/css/homepage.css">
	

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Spyke.space</title>
	
	
</head>
	
<body>
	<div class="wrapper">
		<div class="logo">
			<img src="#" alt="">
		</div>
		<ul class="nav-area">
			<li><a href="#">Home</a></li>
			<li><a href="About.php">About</a></li>
			<li><a href="Login.php">Login</a></li>
			<li><a href="Register.php">Register</a></li>

		</ul>
	</div>
	<div class="Welcome-text">
		<h1>We are Spyke</h1>
		<ul><li><a href="Register.php">Register here!</a></li></ul>

	</div>
</body>
</html>
