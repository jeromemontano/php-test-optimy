<?php

define('ROOT', __DIR__);
require_once(ROOT . '/Repository/NewsManager.php');

foreach (NewsManager::getInstance()->listNews() as $news) {
	echo("############ NEWS " . $news->getTitle() . " ############\n");
	echo($news->getBody() . "\n");
	if ($news->getComment()) {
		foreach ($news->getComment() as $comment) {
			echo("Comment " . $comment->getId() . " : " . $comment->getBody() . "\n");
		}
	}	
}