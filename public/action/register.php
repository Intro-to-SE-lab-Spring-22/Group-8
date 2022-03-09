<?php
require __DIR__ . '/../../vendor/autoload.php';

# Spyke User Actions

$UserDB = new Group8\Spyke\Database\User();
$Logger = new Group8\Spyke\Log();

$username = $_POST["username"];
$password = $_POST["password"];

// Gets an array of two booleans for the username and password check
$check = $UserDB->checkRequirements($username, $password);

if ($check[0] && $check[1]) {
	// All requirements met! An account should be made...
    $response = $UserDB->registerUser($username, $password);
    if ($response) {
        // New user success!
        // Change Logger user to new user
        $newId = $UserDB->pdo->lastInsertId();
        $Logger->changeUser($newId, $username);
        $Logger->add("New account created!", false, "User", 201);
		http_response_code(204);
    } else {
        // The requirements were valid, but there was a database error.
        $Logger->add("Account creation failure", true, "User", 500);
		http_response_code(500);
    }
} else {
    // The new user did not meet all requirements.
	if (!$check[0] && !$check[1]) {$errorMsg = "Both requirements failed";}
	elseif (!$check[0]) {$errorMsg = "Username unavailable";}
	else {$errorMsg = "Unacceptable password";}

	$Logger->add("Account creation failure: {$errorMsg}", true, "User", 400);
	http_response_code(400);
}
