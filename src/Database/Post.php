<?php
namespace Group8\Spyke\Database;

class Post extends \Group8\Spyke\Database
{
	public const CONTENT_MIN = 1; //?			Minimum amount of characters in a post.
	public const CONTENT_MAX = 256; //?			Max length of a post.
	public const PAGE_SIZE = 25; //?			How many posts to show per-page.
	public const FACEBOOK_DELETE = true; //!	Should 'Delete' just *hide* the post?
	private const NIGHTVISION = false; //!		Reveal all hidden posts, globally.

	// Setters
	public function createPost($postedByID, $content)
	{
		//	Creates a new post
		//!	Make sure that $postedByID is the logged-in user's ID
		if (self::checkRequirements($content)) {
			$data = [
				"id" 		=> NULL,
				"author"	=> $postedByID,
				"content"	=> $content,
				"hidden"	=> 0,
				"timestamp"	=> date_timestamp_get(date_create()),
				"likes"		=> 0,
				"dislikes"	=> 0
			];
			$sql = "INSERT INTO posts (id, author, content, hidden, timestamp, likes, dislikes)
					VALUES (:id, :author, :content, :hidden, :timestamp, :likes, :dislikes)";
			// Return the generated ID of the post
			$this->prepare($sql)->execute($data);
			return  $this->pdo->lastInsertId();
		} else {
			//! The post failed to meet requirements.
			return false;
		}
	}

	// Getters
	public function getPost(int $id)
	{
		//	Returns a single post
		$sql = "SELECT * FROM posts WHERE id = ?";
		$obj = $this->prepare($sql);
		$obj->execute([$id]);
		return $obj->fetch();
	}

	public function getFeed(int $id = null, int $page = 0, int $author = null)
	{
		//?	Returns an array of Post objects--
		//?		If a specific author is specified,
		//?		only their posts are returned.
		//!		The NIGHTVISION constant toggles hidden posts.
		$hidden = self::NIGHTVISION ? "AND hidden = true" : "";
		$author = $author ? "AND author = $author" : "";
		$limit = self::PAGE_SIZE;
		$start = $page * self::PAGE_SIZE;
		$sql = "SELECT * FROM posts
				WHERE hidden = false
				$hidden
				$author
				ORDER BY id DESC
				LIMIT :start, :limit";
		// Spicy SQL
		$obj = $this->prepare($sql);
		$obj->bindParam(":start",	$start,	\PDO::PARAM_INT);
		$obj->bindParam(":limit",	$limit,	\PDO::PARAM_INT);
		if ($obj->execute()) {
			$list = $obj->fetchAll(\PDO::FETCH_ASSOC);
			return $list;
		} else {
			return false;
		}
	}

	public function checkRequirements($content)
	{
		//	We can define more advanced requirements later if need be,
		//	But for now, all this does is check the length of the post
		//? Length:	Whether or not the post is within character limits
		$minMax = self::common("minMax", self::CONTENT_MIN, $content, self::CONTENT_MAX);
		return $minMax;
	}

	// Destroyers
	public function deletePost(int $id)
	{
		//? This project called for a Facebook clone;
		//? To come closer to this, deleting all your
		//? data actually doesn't actually delete it;
		//? We actually just have it in our database.
		$sql = self::FACEBOOK_DELETE ?
			"UPDATE posts SET hidden = true WHERE id = :id": //	Hide posts on delete
			"DELETE FROM posts WHERE id = :id"; //!				Full erase on delete
		$obj = $this->prepare($sql);
		return $obj->execute(["id" => $id]);
	}
}
