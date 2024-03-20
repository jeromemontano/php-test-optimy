<?php

class DB
{
	private $pdo;

	private static $instance = null;

	private function __construct()
	{
		$dsn = 'mysql:dbname=phptest;host=127.0.0.1';
		$user = 'root';
		$password = 'root';

		$this->pdo = new \PDO($dsn, $user, $password);
	}

	/**
	 * Returns the instance of the DB class, creating it if it does not exist.
	 *
	 * @return DB The instance of the DB class
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
	 * Executes a SELECT query and returns the results as an array.
	 *
	 * @param string $sql The SQL query to execute.
	 * @return array The results of the SELECT query.
	 */
	public function select($sql)
	{
		$sth = $this->pdo->query($sql);
		return $sth->fetchAll();
	}

	/**
	 * Executes an SQL statement and returns the number of affected rows.
	 *
	 * @param string $sql The SQL statement to execute.
	 * @return int The number of affected rows.
	 */
	public function exec($sql)
	{
		return $this->pdo->exec($sql);
	}

	/**
	 * Returns the ID of the last inserted row or sequence value
	 *
	 * @return int The ID of the last inserted row or sequence value
	 */
	public function lastInsertId()
	{
		return $this->pdo->lastInsertId();
	}
}