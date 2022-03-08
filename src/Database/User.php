<?php
namespace Group8\Spyke\Database;

class User extends \Group8\Spyke\Database
{
	public const USERNAME_MIN = 3;
	public const USERNAME_MAX = 30;
	public const PASSWORD_MIN = 8;
	public const PASSWORD_MAX = 128;

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
		$status[0] = $minMax($username, self::USERNAME_MIN, self::USERNAME_MAX) && !$this->getID($username);
		// Check Password
		$status[1] = $minMax($password, self::PASSWORD_MIN, self::PASSWORD_MAX);
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
