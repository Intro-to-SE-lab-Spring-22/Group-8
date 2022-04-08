<?php
namespace Group8\Spyke;

use \Group8\Spyke\Post as Post;

class FriendHandler extends \Group8\Spyke\Database\Friend
{
	public static function roles(int $userA, int $userB)
	{
		// Return whether or not user A is higher than user B
		$roles = ["adam", "eve"];
		($userA > $userB) or $roles = array_reverse($roles);
		return $roles;
	}

	public function addFriend(int $userA, int $userB){
		// If User A is not being blocked by User B,
		// set their relationship to asking.
		$relationship = $this->getRelationship($userA, $userB);
		$roles = self::roles($userA, $userB);
		switch ($relationship) {
			case $roles[1] . "_asks":
				// User A has been asked! Accept!
				$this->setRelationship
			case "friends":
			case $roles[0] . "_asks":
				return true;
				break;
			case "adam_blocks":
			case "eve_blocks":
			default:
				return false;
				break;
		}
	}

	public function isBlocked(int $userA, int $userB){
		// If either user is blocking the other return true
		$relationship = $this->getRelationship($userA, $userB);
		return ($relationship == "adam_blocks" || $relationship == "eve_blocks");
	}



}
