<?php
require __DIR__ . '/../../vendor/autoload.php';
use Group8\Spyke\Auth;
Auth::startSession();

//! Spyke User Actions
//! Add Friends

Auth::isLoggedIn() or die("You must be logged in to do that.");

$FriendDB = new Group8\Spyke\FriendHandler();
$UserDB = new Group8\Spyke\Database\User();
$Logger = new Group8\Spyke\Log();


$user = $_POST["user"];
$action = $_POST["action"];

switch ($action) {
	case "add":
		$FriendDB->addFriend(Auth::user(), $user);
		break;
	case "remove":
		$FriendDB->removeFriend(Auth::user(), $user);
		break;
	case "block":
		$FriendDB->blockFriend(Auth::user(), $user);
		break;
}
http_response_code(204);