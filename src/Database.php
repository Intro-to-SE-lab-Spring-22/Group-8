<?php
namespace Group8\Spyke;

class Database
{
	const ENGINE = "mysql";
	const HOST = "localhost";

	private string $dsn;
	public \PDO $pdo;
    public function __construct($username = "spyke")
    {
		$engine = self::ENGINE;
		$host = self::HOST;
		// Compose DSN String
		$this->dsn = ""; // Initialize string (Jakes code prettier)
		$this->dsn .= "{$engine}:host={$host};";
		$this->dsn .= "dbname=spyke;";
		$this->dsn .= "charset=utf8mb4;";

		// Build PDO (If it can)
		$this->pdo = new \PDO($this->dsn, $username, $this->getCredentials());
    }

	private function getCredentials()
	{
		return file_get_contents(__DIR__ . "/../password.txt");
	}
}
