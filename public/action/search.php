<?php
require __DIR__ . '/../../vendor/autoload.php';

Use Group8\Spyke\Database\Post;

//! Spyke; Search by Author

$PostDB = new Post();

$page = min(($_GET['page'] ?? 1) - 1, 0);
$user = ($_GET['user'] > 0) ? floor($_GET['user']) : die("Invalid user ID");

$feed = $PostDB->getFeed("id", $page, true, $user);

header('Content-Type: application/json');
echo json_encode($feed);