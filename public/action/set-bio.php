<?php
require_once __DIR__ . '/../../vendor/autoload.php';

$UserDB = new Group8\Spyke\Database\User();

$id = $_POST['id'] ?? 0;
$bio = $_POST['bio'] ?? "";

// Return false if the bio is
// longer than 255 characters.
if (strlen($bio) > 255) {
	echo json_encode(false);
	exit;
} else {
	// Set the bio.
	echo json_encode($UserDB->setBio($id, $bio));
}