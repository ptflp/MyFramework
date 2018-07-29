<?php
/**
 * Error
 */
class Error extends Contoller
{
	public function IndexAction()
	{
		$this->view->message = "404 Not Found";
		$this->view->render('views/error/404.html');
	}
}