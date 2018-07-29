<?php

/**
 * News model class
 */
class News
{
	public static function getNewsItemById($id)
	{
		$id = intval ($id);
		if ($id) {
			$db = Db::getConnection();
			$result = $db->query('SELECT * from news WHERE id=' . $id);
			$result->setFetchMode(PDO::FETCH_ASSOC);
			$newsItem = $result->fetch();

			return $newsItem;
		}
	}
	public static function getNewsList()
	{
		$db = Db::getConnection();
		$newsList = array();
		$result = $db->query('SELECT * from news;');
		while ($row = $result->fetch()) {
			$arrItem['id'] = $row['id'];
			$arrItem['title'] = $row['title'];
			$arrItem['date'] = $row['date'];
			$arrItem['short_content'] = $row['short_content'];
			$newsList[]=$arrItem;
		}
		return $newsList;
	}
}