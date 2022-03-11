


<?php
require __DIR__ . '/../../vendor/autoload.php';

# Spyke User Actions

$UserDB = new Group8\Spyke\Database\User();
$Logger = new Group8\Spyke\Log();

$username = $_POST["username"];
$password = $_POST["password"];
$confirmPass = $_POST["confirm"];
$firstName = $_POST["firstname"];
$lastName =$_POST['lastname'];



// Gets an array of two booleans for the username and password check
$check = $UserDB->checkRequirements($username, $password, $confirmPass);

if ($check[0] && $check[1]) {
	// All requirements met! An account should be made...
    $response = $UserDB->registerUser($username, $password, $firstName, $lastName);
    if ($response) {
        // New user success!
        // Change Logger user to new user
        $newId = $UserDB->pdo->lastInsertId();
        $Logger->changeUser($newId, $username);
        $Logger->add("New account created!", false, "User", 201);
		http_response_code(204);
        header("Location: ../Login.php");
    } else {
        // The requirements were valid, but there was a database error.
        $Logger->add("Account creation failure", true, "User", 500);
		http_response_code(500);
        echo '<script>alert("There was a server side error, please try again later.")</script>';
        header("Location: ../Register.php");
    }
} else {
    // The new user did not meet all requirements.
	if (!$check[0] && !$check[1]) {$errorMsg = "Both requirements failed"; echo '<script>alert("Username is Unavailable and Password is Unacceptable")</script>';}
	elseif (!$check[0]) {$errorMsg = "Username unavailable"; echo '<script>alert("Username unavailable")</script>';}
    elseif($password != $confirmPass){$errorMsg = 'Password does not match';echo '<script>alert("Password does not match")</script>';}
	else {$errorMsg = "Unacceptable password"; echo '<script>alert("Unacceptable password")</script>';}
    header("Location: ../Register.php");
	$Logger->add("Account creation failure: {$errorMsg}", true, "User", 400);
	http_response_code(400);
}
