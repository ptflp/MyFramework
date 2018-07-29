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
 		$newsList = array();
 		$newsList = News::getNewsList();
 		include_once ROOT. '/../views/index.html';
 	}
 	public function actionView($id)
 	{
 		$newsList = array();
 		$newsList = News::getNewsItemById($id);
 		dump_r($newsList);
 	}
 }