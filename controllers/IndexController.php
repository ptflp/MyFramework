<?php

use App\Resource\MVC\Controller;

/**
 * Controller
 */
class IndexController extends Controller
{
	public function actionIndex($id=false)
	{
		// $this->view->message = 'Hello World ';
		// $this->view->render('index/index.php',['id'=>$id]);
		echo $this->view->muRender('index',['message'=>'Hello World']);
	}
}