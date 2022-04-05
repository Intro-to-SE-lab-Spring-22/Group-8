<?php
namespace Group8\Spyke;

class Auth extends \Group8\Spyke\Database
{
	public function verifyPassword(int $id, string $password)
	{
		$stmt = $this->prepare("SELECT pass FROM users WHERE id = :id");
		$stmt->bindParam(":id", $id);
		$stmt->execute();
		$result = $stmt->fetch();
		if ($result) {
			$hash = $result["pass"];
			return password_verify($password, $hash);
		}
		return false;
	}

	public function whoAmI()
	// Get the user's ID from the session.
	{
		return isset($_SESSION["user"]) ? $_SESSION["user"] : false;
	}
}
