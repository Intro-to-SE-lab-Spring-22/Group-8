<?php
require_once __DIR__ . '/../../vendor/autoload.php';

$UserDB = new Group8\Spyke\Database\User();

$id = $_POST['id'] ?? 0;
$bio = $_POST['bio'] ?? "";

// Set the bio
$UserDB->setBio($id, $bio);