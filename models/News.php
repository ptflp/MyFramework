<?php
namespace models;
use res\Model as Model;
/**
 * News model class
 */
class News extends Model
{
	public static function getNewsItemById($id)
	{
		$id = intval ($id);
		if ($id) {
			$db = News::getDoctrine();
 			$query=$db->createQueryBuilder();
		    $result = $query->select('p')
	            ->from('entities\News', 'p')
	            ->where('p.id= :id')
	            ->setParameter('id', $id)
	            ->getQuery()
	            ->getResult(\Doctrine\ORM\Query::HYDRATE_ARRAY);
		}
		return $result;
	}
	public static function getNewsList()
	{
		$db = News::getConnection();
		$newsList = array();
		$result = $db->query('SELECT * from news;');
		while ($row = $result->fetch()) {
			$arrItem['id'] = $row['id'];
			$arrItem['title'] = $row['title'];
			$arrItem['author_name'] = $row['author_name'];
			$arrItem['date'] = $row['date'];
			$arrItem['short_content'] = $row['short_content'];
			$newsList[]=$arrItem;
		}
		return $newsList;
	}
	public static function getNewsListArr()
	{
		$db = News::getDoctrine();
			$query=$db->createQueryBuilder();
	    $result = $query->select('p')
            ->from('entities\News', 'p')
            ->getQuery()
            ->getResult(\Doctrine\ORM\Query::HYDRATE_ARRAY);
		return $result;
	}
}