<?php

namespace App\Resource;

/**
 * Controller
 */
abstract class Controller
{
	public $view;
	public $route;
	public $layout='main';

	function __construct()
	{
		$this->view = new View($this->layout);
 		if (!empty($_GET['__route'])) {
 			$this->route = trim($_GET['__route'],'/');
 		} else {
			$this->route = '/';
 		}
	}
}