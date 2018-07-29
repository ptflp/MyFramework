<?php
require_once ROOT.'/../res/Controller.php';
include_once ROOT . '/../models/News.php';
require  ROOT . "/../entities/News.php";
/**
  * NewsController
  */
 class NewsController extends Controller
 {
 	public function actionIndex()
 	{
 		$db=NEWS::getDoctrine();
 		$news = $db->getRepository('entities\News')->findOneBy(['id' => 4]);
 		dump_r($news);
 		$newsList = array();
 		$newsList = News::getNewsList();
 		echo $news->getId();
 		include_once ROOT. '/../views/index.html';
 	}
 	public function actionView($id,$category=false)
 	{
 		$newsList = array();
 		$newsList = News::getNewsItemById($id);
 		dump_r($category);
 		dump_r($newsList);
 	}
 }