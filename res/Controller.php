<?php

namespace App\Resource;

/**
 * Controller
 */
class Controller
{
	public $view;
	public $route;

	function __construct()
	{
		$this->view = new View();
 		if (!empty($_GET['__route'])) {
 			$this->route = trim($_GET['__route'],'/');
 		} else {
			$this->route = '/';
 		}
	}
	public function notFound($param)
	{
		if ($param) {
			header("HTTP/1.0 404 Not Found");
			header("HTTP/1.1 404 Not Found");
			header("Status: 404 Not Found");
			$content['message'] = "404 Not Found";
	 		echo $this->view->muRender('404',$content);
	 		die();
		}
	}
}