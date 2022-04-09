


<?php
require __DIR__ . '/../../vendor/autoload.php';
use Group8\Spyke\Auth;
Auth::startSession();

//! Spyke User Actions
//! Register Account

$UserDB = new Group8\Spyke\Database\User();
$Logger = new Group8\Spyke\Log();

$username = $_POST["username"];
$password = $_POST["password"];
$confirmPass = $_POST["confirm"];
$firstName = $_POST["firstname"];
$lastName = $_POST['lastname'];



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
		Auth::login($newId);
        header("Location: ../UserPage.php");
    } else {
        // The requirements were valid, but there was a database error.
        $Logger->add("Account creation failure", true, "User", 500);
		http_response_code(500);
        echo '<script>alert("There was a server side error, please try again later."), window.location.replace("https://spyke.msstate.wolfgang.space/Register.php");</script>';

    }
} else {
    // The new user did not meet all requirements.
	if (!$check[0] && !$check[1]) {$errorMsg = "Both requirements failed"; echo '<script>alert("Username is Unavailable and Password is Unacceptable"); window.location.replace("https://spyke.msstate.wolfgang.space/Register.php");</script>';}
	elseif (!$check[0]) {$errorMsg = "Username unavailable"; echo '<script>alert("Username unavailable"); window.location.replace("https://spyke.msstate.wolfgang.space/Register.php");</script>';}
    elseif($password != $confirmPass){$errorMsg = 'Password does not match';echo '<script>alert("Password does not match"); window.location.replace("https://spyke.msstate.wolfgang.space/Register.php"); </script>';}
	else {$errorMsg = "Unacceptable password"; echo '<script>alert("Unacceptable password"); window.location.replace("https://spyke.msstate.wolfgang.space/Register.php");</script>';}
	$Logger->add("Account creation failure: {$errorMsg}", true, "User", 400);
	http_response_code(400);
}
