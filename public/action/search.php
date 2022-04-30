<?php
require __DIR__ . '/../../vendor/autoload.php';

Use Group8\Spyke\Database\Post;

//! Spyke; Search by Author

$PostDB = new Post();

$page = min(($_POST['page'] ?? 1) - 1, 0);
$user = ($_POST['user'] > -1) ? floor($_POST['user']) : die("Invalid user ID");

$feed = $PostDB->getFeed("id", $page, true, $user);

header('Content-Type: application/json');
echo json_encode($feed);