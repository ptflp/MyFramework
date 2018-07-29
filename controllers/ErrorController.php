<?php
require_once ROOT.'/../res/Controller.php';
/**
 * Error
 */
class ErrorController extends Controller
{
	public function actionIndex()
	{
		$this->view->message = "404 Not Found";
		$this->view->render('../views/error/404.html');
	}
}