<?php
namespace Group8\Spyke;

use \Group8\Spyke\Post as Post;

class PostHandler extends \Group8\Spyke\Database\Post
{
	public int $user;

	protected function renderFeed(array $posts) {
		$html = "";
		foreach ($posts as $postData) {
			$Post = new Post($postData);
			$html .= $Post->render();
		}
		return $html;
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
}
