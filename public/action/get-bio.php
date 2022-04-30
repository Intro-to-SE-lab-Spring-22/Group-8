<?php
require_once __DIR__ . '/../../vendor/autoload.php';

$UserDB = new Group8\Spyke\Database\User();

$id = $_POST['id'] ?? 0;

header('Content-Type: application/json');
$result =[
	$UserDB->getFirstName($id),
		$UserDB->getLastName($id),
			$UserDB->getGender($id),
				$UserDB->getLocation($id),
					$UserDB->getBio($id)
];

echo json_encode($result);

?>
