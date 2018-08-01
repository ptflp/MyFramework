<?php
use res\Controller;

/**
 * Error
 */
class ErrorController extends Controller
{
	public function actionIndex()
	{
		header("HTTP/1.0 404 Not Found");
		header("HTTP/1.1 404 Not Found");
		header("Status: 404 Not Found");
		$content['message'] = "404 Not Found";
 		echo $this->view->muRender('404',$content);
	}
}