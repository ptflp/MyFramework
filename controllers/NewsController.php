<?php
/**
  * NewsController
  */
 class NewsController
 {
 	public function actionIndex()
 	{
 	}
 	public function actionView($category,$id)
 	{
 		dump_r($category);
 		echo $id;
 	}
 }