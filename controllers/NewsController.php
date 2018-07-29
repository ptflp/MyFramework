<?php
require_once ROOT.'/../res/Controller.php';
include_once ROOT . '/../models/News.php';
/**
  * NewsController
  */
 class NewsController extends Controller
 {
 	public function actionIndex()
 	{
		try {
			$client = new Predis\Client([
				    "scheme" => "tcp",
				    "host" => "redis",
				    "port" => 6379
			]);
	 		// $newsList = NEWS::getNewsList();
 			// $client->set('newsList', json_encode($newsList));
 			$response = $client->get('newsList');
 			$newsList=json_decode($response);
		}
		catch (Exception $e) {
			die($e->getMessage());
		}
		// $this->view->render('index.php',['id'=>$id,'newsList'=>$newsList]);
		dump_r($newsList);
 		// include_once ROOT. '/../views/index.html';
 	}
 	public function actionView($id,$category=false)
 	{
 		$newsList = array();
 		$newsList = News::getNewsItemById($id);
 		dump_r($category);
 		dump_r($newsList);
 	}
 	public function actionList()
 	{
 		$newsList = array();
 		$newsList = News::getNewsListArr();
		$index['title']='moyTitle';
		$index['email']='email';
		$index['newsList']=$newsList;
 		echo $this->view->muRender('index',$index);
 	}
 }