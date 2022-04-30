<?php
require_once __DIR__ . '/../../vendor/autoload.php';
use Group8\Spyke\Auth;
Auth::startSession();

$UserDB = new Group8\Spyke\Database\User();

Auth::isLoggedIn() or die("Not logged in.");


$id = $_SESSION["user"] ?? die("No user ID provided.");
$bio = $_POST['bio'] ?? "";
$first = $_POST['firstname'];
$last = $_POST['lastname'];
$location = $_POST['location'];
$gender = $_POST['gender'];


// Return false if the bio is
// longer than 255 characters.
if (strlen($bio) > 255) {
	echo json_encode(false);
	exit;
} else {
	// Set the bio.
	$UserDB->setBio($id, $bio);
	$UserDB->setFirstName($id, $first);
	$UserDB->setLastName($id, $last);
	$UserDB->setGender($id, $gender);
	$UserDB->setLocation($id, $location);
}
