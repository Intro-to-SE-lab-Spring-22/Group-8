<?php
namespace Group8\Spyke;

class Auth extends \Group8\Spyke\Database
{
	public static function startSession() {
		session_start();
		session_name("SpykeID");

		// Set the User cookie if logged-in
		!isset($_SESSION["user"]) or setcookie("user", $_SESSION["user"]);
	}

	public static function login(int $userID) {
		// Set the user ID in the session
		$_SESSION["user"] = $userID;
	}

	public static function logout() {
		// Destroy the session
		unset($_SESSION["user"]);
		session_destroy();
	}

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
}
