<?php
/**
  * NewsController
  */
 class NewsController
 {
 	public function actionIndex()
 	{
 	}
 	public function actionView($parametrs)
 	{
 		dump_r($parametrs);
 		return true;
 	}
 }