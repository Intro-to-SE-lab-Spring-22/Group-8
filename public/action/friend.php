<?php
require __DIR__ . '/../../vendor/autoload.php';
use Group8\Spyke\Auth;
Auth::startSession();

//! Spyke User Actions
//! Add Friends

$FriendDB = new Group8\Spyke\FriendHandler();
$UserDB = new Group8\Spyke\Database\User();
$Logger = new Group8\Spyke\Log();

$user_a = $_POST["user"];
$user_b = $_SESSION["user"]; //?	The user responsible
$action = $_POST["action"];

switch ($action) {
	case "add":
		$FriendDB->addFriend($user_a, $user_b);
		break;
	case "remove":
		$FriendDB->removeFriend($user_a, $user_b);
		break;
	case "block":
		$FriendDB->blockFriend($user_a, $user_b);
		break;
}