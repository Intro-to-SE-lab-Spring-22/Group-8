<?php
require_once __DIR__ . '/../../vendor/autoload.php';

$UserDB = new Group8\Spyke\Database\User();

$id = $_POST['id'] ?? 0;
$bio = $_POST['bio'] ?? "";
$first = $_POST[''];
$last = $_POST[''];
$location = $_POST[''];
$gender = $_POST[''];


// Return false if the bio is
// longer than 255 characters.
if (strlen($bio) > 255) {
	echo json_encode(false);
	exit;
} else {
	// Set the bio.
	$UserDB->setBio($id, $bio);
}

$UserDB->setFirstName($id, $first);
$UserDB->setLastName($id, $last);
$UserDB->setGender$id, $gender);
$UserDB->setLocation($id, $location);
