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
		$this->dsn = "{$engine}:host={$host};";
		$this->dsn .= "dbname=spyke;";
		$this->dsn .= "charset=utf8mb4;";

		// Build PDO (If it can)
		$this->pdo = new \PDO($this->dsn, $username, $this->getCredentials());
    }

	protected function getCredentials()
	{
		// Get our database password.
		return file_get_contents(__DIR__ . "/../password.txt") ?? "BobbyTables-8";
	}

	// Pipes
	public function query(...$args)
	{
		return $this->pdo->query(...$args);
	}

	public function prepare(...$args)
	{
		return $this->pdo->prepare(...$args);
	}
}
