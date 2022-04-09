<?php
session_start();

require __DIR__ . '/../../vendor/autoload.php';

# Spyke User Actions

$FriendDB = new Group8\Spyke\FriendHandler();
$UserDB = new Group8\Spyke\Database\User();
$Logger = new Group8\Spyke\Log();

$user_a = $_POST["userA"];
$user_b = $_SESSION["userB"]; //?	The user responsible
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