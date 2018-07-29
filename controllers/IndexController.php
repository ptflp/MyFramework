<?php
require_once ROOT.'/../res/Controller.php';
/**
 * Controller
 */
class IndexController extends Controller
{
	public function actionIndex($id=false)
	{
		$this->view->message = 'Hello World ';
		$this->view->render('index/index.php');
	}
}