<?php

namespace App\Models;

use App\MVC\Model;
use Predis\Client;

/**
 * News model class
 */
class News extends Model
{
	public $db;

	public function __construct()
	{
		$this->$db = News::getDoctrine();
	}
	public static function getNewsItemById($id,$db=false)
	{
		$static = !(isset($this) && get_class($this) == __CLASS__);
		if (!$static) {
			$db = $this->db;
		}
		$id = intval ($id);
		if ($id) {
 			$query=$db->createQueryBuilder();
		    $result = $query->select('p')
	            ->from('App\Entities\NewsOrm', 'p')
	            ->where('p.id= :id')
	            ->setParameter('id', $id)
	            ->getQuery()
	            ->getResult(\Doctrine\ORM\Query::HYDRATE_ARRAY);
		}
		return $result;
	}

	public static function getNewsList($db=false)
	{
		$static = !(isset($this) && get_class($this) == __CLASS__);
		if (!$static) {
			$db = $this->db;
		}
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

	public static function getNewsListArr($db=false)
	{
		$static = !(isset($this) && get_class($this) == __CLASS__);
		if (!$static) {
			$db = $this->db;
		}
		try {
			$client = new Client([
				    "scheme" => "tcp",
				    "host" => "redis",
				    "port" => 6379
			]);

			$response = $client->get('newsList');
		}
		catch (Exception $e) {
			die($e->getMessage());
		}
		$response=false;
		if ($response) {
			$result=json_decode($response);
		} else {
			$query=$db->createQueryBuilder();
		    $result = $query->select('p')
	            ->from('App\Entities\NewsOrm', 'p')
	            ->getQuery()
	            ->getResult(\Doctrine\ORM\Query::HYDRATE_ARRAY);
		 	$client->set('newsList', json_encode($result));
		}
		return $result;
	}
}