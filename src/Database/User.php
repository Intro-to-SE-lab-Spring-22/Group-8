<?php
namespace Group8\Spyke\Database;

class User extends \Group8\Spyke\Database
{
	public const USER_MIN = 3;
	public const USER_MAX = 16;
	public const PASS_MIN = 8;
	public const PASS_MAX = 128;

	// Setters
	public function registerUser($username, $pass)
	{
		if (!$this->getID($username)) {
			$data = [
				"username" => $username,
				"id" => NULL,
				"pass" => password_hash($pass, PASSWORD_DEFAULT)
			];
			$sql = "INSERT INTO users (username, id, pass) VALUES (:username, :id, :pass)";
			return $this->prepare($sql)->execute($data);
		} else {
			return false;
		}
	}

	// Getters
	public function getUserList()
	{
		// Returns all users as [id] => [username]
		$sql = "SELECT username, id FROM users";
		$obj = $this->prepare($sql);
		if ($obj->execute()) {
			$list = $obj->fetchAll(\PDO::FETCH_COLUMN|\PDO::FETCH_GROUP, 1);
			return array_map("reset", $list);
		} else {
			return false;
		}
	}

	public function checkPassword($username, $password)
	{
		// Checks if a password matches.
		$sql = "SELECT pass FROM users WHERE username = ?";
		$obj = $this->prepare($sql);
		$obj->execute([$username]);
		$hash = $obj->fetch()[0];

		return password_verify($password, $hash);
	}

	public function checkRequirements($username, $password)
	{
		$status = [true, true];
		$minMax = function($string, $min, $max)
		{
			$len = strlen($string);
			$checkMin = $min <= $len;
			$checkMax = $len <= $max;
			return $checkMin && $checkMax;
		};
		// Check Username
		$status[0] = $minMax($username, self::USER_MIN, self::USER_MAX) && !$this->getID($username);
		// Check Password
		$status[1] = $minMax($password, self::PASS_MIN, self::PASS_MAX);
		// Finalize
		return $status;
	}

	public function getId($username)
	{
		// Get a user ID from a username
		$sql = "SELECT id FROM users WHERE username = ?";
		$obj = $this->prepare($sql);
		$obj->execute([$username]);
		$user = $obj->fetch(\PDO::FETCH_ASSOC);
		return $user ? reset($user) : false;
	}

	// Destroyers
	public function deleteUser($id)
	{
		// Delete a user by ID
		$sql = "DELETE FROM users WHERE id = :id";
		$obj = $this->prepare($sql);
		return $obj->execute(["id" => $id]);
	}
}
