<?php

class NewsManager
{
	private static $instance = null;

	private function __construct()
	{
		require_once(ROOT . '/Entity/News.php');
		require_once(ROOT . '/Entity/Comment.php');
		require_once(ROOT . '/Utils/DB.php');
	}

	/**
	 * Returns the instance of the NewsManager
	 *
	 * @return NewsManager
	 */
	public static function getInstance(): NewsManager
	{
		if (null === self::$instance) {
			$c = __CLASS__;
			self::$instance = new $c;
		}

		return self::$instance;
	}

	/**
	 * Returns an array of news objects
	 *
	 * @return array<News>
	 */
	public function listNews(): array
	{
		$db = DB::getInstance();
		$rows = $db->select('
			SELECT n.*, c.id as c_id, c.body as c_body, c.created_at as c_date 
			FROM `news` n
			LEFT JOIN `comment` c
			ON n.id=c.news_id'
		);
		
		$news = [];
		foreach ($rows as $row) {
			$n = new News();
			if (!isset($news[$row['id']])) {
				$news[$row['id']] = $n->setId($row['id'])
					->setTitle($row['title'])
					->setBody($row['body'])
					->setCreatedAt($row['created_at']);
			}

			if ($row['c_id']) {
				$c = new Comment();
				$comment = $c->setId($row['c_id'])
					->setBody($row['c_body'])
					->setCreatedAt($row['c_date'])
					->setNewsId($row['id']);

				$news[$row['id']]->setComment($comment);
			}
		}

		return $news;
	}

	/**
	 * Adds a record to the news table.
	 *
	 * @param string $title The title of the news.
	 * @param string $body The body of the news.
	 * @return int The ID of the newly created news record.
	 */
	public function addNews(string $title, string $body): int
	{
		$db = DB::getInstance();

		$sql = "INSERT INTO `news` (`title`, `body`, `created_at`) 
			VALUES('". $title . "','" . $body . "','" . date('Y-m-d') . "')";
		$db->exec($sql);
		$newsId = $db->lastInsertId();
		
		return $newsId;
	}

	/**
	 * Deletes a news record and all associated comments.
	 *
	 * @param int $id The ID of the news record to delete.
	 * @return bool True if the news record was deleted, false otherwise.
	 */
	public function deleteNews(int $id): bool
	{
		$db = DB::getInstance();

		$sql = "DELETE FROM `news` WHERE `id`=". $id;
		$result = $db->exec($sql);

		return $result;
	}
}