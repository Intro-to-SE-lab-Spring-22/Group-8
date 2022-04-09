<?php
namespace Group8\Spyke\Database;

class Friends extends \Group8\Spyke\Database
{
	protected static function sort(int $user_a, int $user_b)
	{
		$users = [$user_a, $user_b];
		rsort($users);
		return $users;
	}

	protected static function whoIs(int $user_a, int $user_b)
	{
		$users = self::sort($user_a, $user_b);
		return ["adam" => $users[0], "eve" => $users[1]];
	}

	public function setRelationship(int $user_a, int $user_b, string $relationship = "strangers")
	{
		if ($user_a == $user_b) {
			return false;
		}
		$whoIs = self::whoIs($user_a, $user_b);
		$sql = "INSERT INTO friends (adam, eve, relationship)
				VALUES (:adam, :eve, :relationship)";
		// SQL: If there is no matching adam and eve column, insert a new row
		$stmt = $this->pdo->prepare($sql);
		$stmt->bindParam(":adam", $whoIs["adam"], \PDO::PARAM_INT);
		$stmt->bindParam(":eve", $whoIs["eve"], \PDO::PARAM_INT);
		$stmt->bindParam(":relationship", $relationship, \PDO::PARAM_STR);
		return $stmt->execute() or false;
	}

	public function getRelationship(int $user_a, int $user_b)
	{
		if ($user_a == $user_b) {
			return "self";
		}
		$sql = "SELECT relationship FROM friends
				WHERE (adam = :adam AND eve = :eve)
				OR (adam = :eve AND eve = :adam)";
		$stmt = $this->pdo->prepare($sql);
		$stmt->bindParam(":adam", $user_a, \PDO::PARAM_INT);
		$stmt->bindParam(":eve", $user_b, \PDO::PARAM_INT);
		// Return as a string
		$stmt->execute();
		return $stmt->fetchColumn() or "strangers";
	}

	public function getFriends(int $user_id)
	{
		$sql = "SELECT * FROM friends
				WHERE adam = :user_id
				OR eve = :user_id
				AND relationship = 'friends'";
		$stmt = $this->pdo->prepare($sql);
		$stmt->bindParam(":user_id", $user_id, \PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetchAll();
	}

	public function getPending(int $user_id, bool $incoming = true)
	{
		// The two possible 'directions' of pending requests
		$direction = ["adam_asks", "eve_asks"];
		// SQL where if user_id is adam, it is adam_asks, but if it is on eve, it is eve_asks
		$sql = "SELECT * FROM friends
				WHERE (adam = :user_id AND relationship = :adam)
				OR (eve = :user_id AND relationship = :eve)";
		$stmt = $this->pdo->prepare($sql);
		$stmt->bindParam(":user_id", $user_id, \PDO::PARAM_INT);
		$stmt->bindParam(":adam", $direction[$incoming], \PDO::PARAM_STR);
		$stmt->bindParam(":eve", $direction[!$incoming], \PDO::PARAM_STR);
		$stmt->execute();
		return $stmt->fetchAll();
	}

	public function deleteRelationship(int $user_a, int $user_b)
	{
		// Delete relationship
		$sql = "DELETE FROM friends
				WHERE (adam = :user_a AND eve = :user_b)
				OR (adam = :user_b AND eve = :user_a)";
		$stmt = $this->pdo->prepare($sql);
		$stmt->bindParam(":user_a", $user_a, \PDO::PARAM_INT);
		$stmt->bindParam(":user_b", $user_b, \PDO::PARAM_INT);
		return $stmt->execute() or false;
	}
}
