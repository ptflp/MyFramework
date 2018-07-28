<?php
/**
  * NewsController
  */
 class NewsController
 {
 	public function actionIndex()
 	{
 		echo 'news list';
 		return true;
 	}
 	public function actionView()
 	{
 		echo 'news content';
 		return true;
 	}
 }