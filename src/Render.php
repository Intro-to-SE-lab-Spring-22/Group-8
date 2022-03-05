<?php
namespace Group8\Spyke;

class Render
{
	// The <body> buffer. Things are to be appended to this.
	private string $content;

	public function __construct()
	{
		$this->content = "";
	}

	// Adds content to the buffer.
	public function add(string $content)
	{
		$this->content .= $content . "\n";
	}

	// Builds a final HTML output.
	public function build (string $title=null, bool $exitAfterBuild=false)
	{
		$this->htmlHead($title);
		print($this->content ?? "Whoops!"); // The ENTIRE content of <body>
		$this->htmlTail();
		if ($exitAfterBuild) {exit;}
	}

	// Generates the <head> block and begins the <body> block.
    protected function htmlHead(string $title = null)
    {
		$coolTitle = isset($title)? " - {$title}": null;
        echo <<< EOT
		<!DOCTYPE html>
		<html>
		<head>
			<link rel="stylesheet" type="text/css"  href="assets/css/homepage.css">
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<title>Spyke$coolTitle</title>
		</head>
		<body>
		EOT;
    }

	// Ends the <body> block and HTML.
	protected function htmlTail()
    {
        echo <<< EOT
		</body>
		</html>
		EOT;
    }
}
