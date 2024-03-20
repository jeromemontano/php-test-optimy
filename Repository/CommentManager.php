<?php

class CommentManager
{
	private static $instance = null;

	private function __construct()
	{
		require_once(ROOT . '/Entity/Comment.php');
		require_once(ROOT . '/Utils/DB.php');
	}

	/**
	 * Returns the instance of the CommentManager
	 *
	 * @return CommentManager
	 */
	public static function getInstance()
	{
		if (null === self::$instance) {
			$c = __CLASS__;
			self::$instance = new $c;
		}
		return self::$instance;
	}

	/**
	 * Returns a list of all comments in the database
	 *
	 * @return array<Comment>
	 */
	public function listComments(): array
	{
		$db = DB::getInstance();
		$rows = $db->select('SELECT * FROM `comment`');

		$comments = [];
		foreach ($rows as $row) {
			$n = new Comment();
			$comments[] = $n->setId($row['id'])
				->setBody($row['body'])
				->setCreatedAt($row['created_at'])
				->setNewsId($row['news_id']);
		}

		return $comments;
	}

	/**
	 * Adds a new comment to the database
	 *
	 * @param string $body The body of the comment
	 * @param int $newsId The ID of the news article to which the comment is associated
	 * @return int The ID of the newly created comment
	 */
	public function addCommentForNews(string $body, int $newsId): int
	{
		$db = DB::getInstance();
		$sql = "INSERT INTO `comment` (`body`, `created_at`, `news_id`) VALUES ('$body', '". date('Y-m-d'). "','$newsId')";
		$db->exec($sql);
		$commentId = $db->lastInsertId($sql);

		return $commentId;
	}

	/**
	 * Deletes a comment from the database
	 *
	 * @param int $id The ID of the comment to delete
	 * @return bool True if the comment was deleted, false otherwise
	 */
	public function deleteComment(int $id): bool
	{
		$db = DB::getInstance();
		$sql = "DELETE FROM `comment` WHERE `id`=". $id;
		return $db->exec($sql);
	}
}