<?php
namespace Group8\Spyke\Database;

class User extends \Group8\Spyke\Database
{
	// Setters
	public function registerUser($username, $pass)
	{
		$data = [
			"username" => $username,
			"id" => NULL,
			"pass" => password_hash($pass, PASSWORD_DEFAULT)
		];
		$sql = "INSERT INTO users (username, id, pass) VALUES (:username, :id, :pass)";
		return $this->prepare($sql)->execute($data);
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

	// Destroyers
	public function deleteUser($id)
	{
		// Delete a user by ID
		$sql = "DELETE FROM users WHERE id = :id";
		$obj = $this->prepare($sql);
		return $obj->execute(["id" => $id]);
	}
}
