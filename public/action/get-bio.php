<?php
require_once __DIR__ . '/../../vendor/autoload.php';

$UserDB = new Group8\Spyke\Database\User();

$id = $_GET['id'] ?? 0;

header('Content-Type: application/json');
print json_encode($UserDB->getBio($id));