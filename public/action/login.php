<?php
require __DIR__ . '/../../vendor/autoload.php';

# Spyke User Actions
# Login

$UserDB = new Group8\Spyke\Database\User();
$Logger = new Group8\Spyke\Log();

$username = $_POST["username"];
$password = $_POST["password"];

if ($UserDB->checkPassword($username, $password)) {
	// THE USERNAME AND PASSWORD ARE REAL, WORKING, AND TRUE
	header("Location: ../UserPage.php");
	print("Welcome.");
} else {
	// FAILURE.
	header("Location: ../Login.php");
	print("Login failed.");
}