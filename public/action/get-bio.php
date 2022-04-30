<?php
require_once __DIR__ . '/../../vendor/autoload.php';

$UserDB = new Group8\Spyke\Database\User();

$id = $_POST['id'] ?? 0;

header('Content-Type: application/json');
$result = array();
result.append($UserDB->getFirstName($id));
result.append($UserDB->getLastName($id));
result.append($UserDB->getGender($id));
result.append($UserDB->getLocation($id));
result.append($UserDB->getBio($id));

echo json_encode($result);

?>
