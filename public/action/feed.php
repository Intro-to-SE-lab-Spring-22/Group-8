<?php
require __DIR__ . '/../../vendor/autoload.php';

Use Group8\Spyke\Database\Post;

//! Spyke Feed

$PostDB = new Post();

$page = min(($_GET['page'] ?? 1) - 1, 0);

$feed = $PostDB->getFeed("id", $page);

header('Content-Type: application/json');
echo json_encode($feed);