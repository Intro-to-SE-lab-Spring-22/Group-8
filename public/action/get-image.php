<?php
require __DIR__ . '/../../vendor/autoload.php';
use Group8\Spyke\Auth;
Auth::startSession();

//! Spyke User Actions
//! Download Profile Picture

$UserDB = new Group8\Spyke\Database\User();
$Logger = new Group8\Spyke\Log();

$user = $_GET["user"] ?? $_POST["user"] ?? $_SESSION["user"] ?? null;
is_int($user) or die(false);


// Check if the user exists
$userExists = $UserDB->getUsername($user);
if (!$userExists) {
	die(false);
}

// Get the image
header("Content-Type: image/webp");
echo $UserDB->getImage($user);
