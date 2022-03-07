<?php
namespace Group8\Spyke;

class Log
{
	const DIR = __DIR__ . "/../log/"; // Log Directory
	private int $id;
	private string $user;

    public function __construct(string $user = "Anonymous", int $id = null)
    {
		// Set values (or default to '-')
		$this->id = (is_int($id) ? $id : -1);
        $this->user = preg_replace("/\s+/", "_", $user);

		// Create a folder if needed
		if (!is_dir(self::DIR)) {
			mkdir(self::DIR, 0777, true);
		}
    }

    public function add(string $message, $error = false, string $from = null, int $httpStatusInt = null)
	{
		// Initialize variables
		$fixedId =	$this->id  >= 0 ? $this->id : "-";
		$body =	(is_string($from) ? "[{$from}] " : null) . trim(preg_replace("/\s+/", " ", $message));
		$httpStatus = (is_int($httpStatusInt) ? $httpStatusInt : "-");

		// User Logging
		$user = isset($httpStatusInt) ? "{$fixedId} {$this->user}" : "- -\t";

		// $log construction gets its own block
		$file = (is_bool($error)) ? ($error ? "error" : "event") : $error;
		$log =	self::DIR . "{$file}-" . date("Y-m-d") . ".log";

		// Construct an NCSA Common Log-formatted string
		$format = "- {$user}\t{" . date("[H:i:s]") . " \"{$body}\" {$httpStatus} -\n";

		// Write to disk (UTF-8)
		file_put_contents($log, utf8_encode($format),  FILE_APPEND | LOCK_EX);
	}
}
