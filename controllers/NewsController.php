<?php
use res\Controller;
use models\News;

/**
  * NewsController
  */
 class NewsController extends Controller
 {
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
 		$newsList = News::getNewsItemById($id);
 		$content['newsList']=$newsList;
 		echo $this->view->muRender('news/detail',$content);
 	}
 	public function actionIndex()
 	{
 		asfasfas
 		foreach ($f as $key => $value) {
 			echo $key;
 		}
		try {
			$client = new Predis\Client([
				    "scheme" => "tcp",
				    "host" => "redis",
				    "port" => 6379
			]);
 			$response = $client->get('newsList');
 			if ($response) {
 				$newsList=json_decode($response);
 			} else {
		 		$newsList = array();
		 		$newsList = News::getNewsListArr();
		 		$client->set('newsList', json_encode($newsList));
 			}

		}
		catch (Exception $e) {
			die($e->getMessage());
		}
		$content['title']='moyTitle';
		$content['email']='email';
		$content['newsList']=$newsList;
 		echo $this->view->muRender('news/index',$content);
 	}
 }