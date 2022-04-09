<?php
namespace Group8\Spyke;

use \Group8\Spyke\Post as Post;

class PostHandler extends \Group8\Spyke\Database\Post
{
	public int $user;
	protected array $idMap;

	protected function renderFeed(array $posts) {
		$html = "";
		foreach ($posts as $postData) {
			$Post = new Post($postData);
			$Post->username = $this->getUsernameFromID($Post->author);
			$html .= $Post->render();
		}
		return $html;
	}

	private function getUsernameFromID(int $id) {
		// Maps IDs to usernames.
		// If we already looked one up,
		// We skip it.
		if ($this->idMap[$id]) {
			return $this->idMap[$id];
		} else {
			$stmt = $this->prepare("SELECT username FROM users WHERE id = :id");
			$stmt->bindParam(":id", $id);
			$stmt->execute();
			$result = $stmt->fetch();
			if ($result) {
				$this->idMap[$id] = $result[0];
				return $result["username"];
			}
		}
		return "Anonymous";
	}

	//? Feeds
	public function feedByTime(bool $desc = true, int $page = 0, int $author = null) {
		return $this->renderFeed($this->getFeed("id", $page, $desc, $author));
	}

	public function feedByLikes(bool $desc = true, int $page = 0, int $author = null) {
		return $this->renderFeed($this->getFeed("likes", $page, $desc, $author));
	}

	public function feedByScore(bool $desc = true, int $page = 0, int $author = null) {
		return $this->renderFeed($this->getFeed("rating", $page, $desc, $author));
	}

	public function feedByAuthor(int $author, bool $desc = true, int $page = 0) {
		return $this->feedByTime($desc, $page, $author);
	}
}
