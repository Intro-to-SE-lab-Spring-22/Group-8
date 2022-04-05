<?php
namespace Group8\Spyke;

class Post
{
	public int $id; //			The unique post ID
	public int $author; //		The ID of the OP
	public int $timestamp; //?	The Unix timestamp of the post
	public int $likes; //?		The number of likes
	public int $dislikes; //?	The number of dislikes
	public bool $hidden; //		Whether or not the post should be visible
	public string $username; //	The username of the OP
	public string $content; //?	The body of the post

	public function __construct(array $values = null) {
		// Set values for each item in array
		if ($values) {
			foreach ($values as $key => $value) {
				$this->$key = $value;
			}
		}
		// Default values
		isset($this->author)	or $this->author	= 0;
		isset($this->username)	or $this->username	= "Anonymous";
		isset($this->content)	or $this->content	= "";
		isset($this->timestamp)	or $this->timestamp	= time(); //! Default to current time
	}

	public function render() {
		$timestampPretty = date("F j, Y, g:i a", $this->timestamp);
		$timestampISO = date("c", $this->timestamp);
		$html = <<<POST
		<article>
			<span>
				<b>$this->username</b>
				&mdash;
				<time datetime="$timestampISO">$timestampPretty</time>
			</span>
			<p>$this->content</p>
			<span>
				<a href="">↑<b>$this->likes</b></a>
				&mdash;
				<a href="">↓<b>$this->dislikes</b></a>
			</span>
		</article>\n
		POST;
		return $html;
	}
}
