<?php
include_once ROOT . '/../models/News.php';
/**
  * NewsController
  */
 class NewsController
 {
 	public function actionIndex()
 	{
 		$newsList = array();
 		$newsList = News::getNewsList();
 		dump_r($newsList);
 	}
 	public function actionView($id)
 	{
 		$newsList = array();
 		$newsList = News::getNewsItemById($id);
 		dump_r($newsList);
 	}
 }