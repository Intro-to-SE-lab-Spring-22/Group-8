<?php
namespace Group8\Spyke;

class Debug
{
	const DIR = __DIR__ . "/../log/"; // Log Directory
	private int $id;
	private string $user;
	private bool $logUser;

    public function __construct(string $user = "Anonymous", int $id = null)
    {
		// Set values (or default to '-')
		$this->id = (is_int($id) ? $id : -1);
        $this->user = preg_replace("/\s+/", "_", $user);
		$this->logUser = true;

		// Create a folder if needed
		if (!is_dir(self::DIR)) {
			mkdir(self::DIR, 0777, true);
		}
    }

    public function log(string $message, bool $error = false, string $from = null, int $httpStatusInt = null)
	{
		// Initialize variables
		$date =	date("Y-m-d");
		$id =	$this->id  >= 0 ? $this->id : "-";
		$time =	date("[H:i:s]");
		$body =	(is_string($from) ? "[{$from}] " : null) . trim(preg_replace("/\s+/", " ", $message));

		// Status construction block
		if (is_int($httpStatusInt)) {
			$httpStatus = str_pad($httpStatusInt, 3, "0", STR_PAD_LEFT);
		} else {
			$httpStatus = "-";
		}

		// $log construction gets its own block
		$log =	self::DIR . ($error ? "error" : "event") . "-{$date}.log";

		// Construct an NCSA Common Log-formatted string
		$format = "- {$id} {$this->user}\t{$time} \"{$body}\" {$httpStatus} -\n";

		// Write to disk (UTF-8)
		file_put_contents($log, utf8_encode($format),  FILE_APPEND | LOCK_EX);
	}
}