<?php

use App\MVC\Controller;
use App\Models\News;

/**
  * NewsController
  */
 class NewsController extends Controller
 {
 	/* Layouts changing
	function __construct()
	{
		parent::__construct();
		$this->view->layout = 'text'; // change layout for this controller
		$this->view->param = ['render'=>'part']; // change render type for this controller
	}*/

 	public function actionList()
 	{
		try {
			$client = new Predis\Client([
				    "scheme" => "tcp",
				    "host" => "redis",
				    "port" => 6379
			]);
	 		$newsList = NEWS::getNewsList();
 			$client->set('newsList', json_encode($newsList));
 			// $response = $client->get('newsList');
 			// $newsList=json_decode($response);
		}
		catch (Exception $e) {
			die($e->getMessage());
		}
		// $this->view->render('index.php',['id'=>$id,'newsList'=>$newsList]);
		dump_r($newsList);
 	}

 	public function actionView($id,$category=false)
 	{
 		$newsList = array();
 		$db = News::getDoctrine();
 		$newsList = News::getNewsItemById($id,$db);
 		$this->isExist($newsList);
 		$content['newsList']=$newsList;
 		echo $this->view->muRender('news/detail',$content);
 	}

 	public function actionIndex()
 	{
 		$db = News::getDoctrine();
 		$newsList = News::getNewsListArr($db);
		$content['title']='moyTitle';
		$content['email']='email';
		$content['newsList']=$newsList;
 		echo $this->view->muRender('news/index',$content);
 	}

 }