<?php
require __DIR__ . '/../../vendor/autoload.php';
use Group8\Spyke\Auth;
Auth::startSession();

//! Spyke User Actions
//! Login

$Auth = new Auth();
$UserDB = new Group8\Spyke\Database\User();
$Logger = new Group8\Spyke\Log();

$username = $_POST["username"];
$password = $_POST["password"];

if ($UserDB->checkPassword($username, $password)) {
	// THE USERNAME AND PASSWORD ARE REAL, WORKING, AND TRUE

	header("Location: ../UserPage.php");
	$Auth->login($UserDB->getID($username));
	print("Welcome.");
} else {
	// FAILURE.
	header("Location: ../Login.php?error=1");
	print("Login failed.");
}