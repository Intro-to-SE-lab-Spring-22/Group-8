<?php
require __DIR__ . '/../../vendor/autoload.php';
use Group8\Spyke\Auth;
Auth::startSession();

//! Spyke User Actions
//! Upload Profile Picture

$UserDB = new Group8\Spyke\Database\User();
$Logger = new Group8\Spyke\Log();

Auth::user() or die("No user ID provided.");

$image = $_FILES["image"] or die("No image provided."); //?	The body of the post

// Check if the file is an image
if (getimagesize($image["tmp_name"]) === false) {
	die("Uploaded file is not an image.");
}

// Check if file is fewer than 16MB
if ($image["size"] > 16777216) {
	die("Uploaded file is too large.");
}

//

if (Auth::isLoggedIn()) {
	// Convert tmp_name to a GdImage
	$gd = imagecreatefromstring(file_get_contents($image["tmp_name"]));
	$uploadResult = $UserDB->setImage(Auth::user(), $gd);
    if ($uploadResult) {
		http_response_code(204);
    } else {
        // The requirements were valid, but there was a database error.
		http_response_code(500);
		die("There was an error uploading the image.");
    }
} else {
	http_response_code(400);
}
