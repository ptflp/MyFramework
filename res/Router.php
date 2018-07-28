<?php
/**
  * Class Router
  */
 class Router
 {
 	private $routes;
 	function __construct()
 	{
 		$routesPath = ROOT.'/../config/routes.php';
 		$this->routes = include($routesPath);
 	}
 	public function run()
 	{
 		if (!empty($_GET['__route'])) {
 			$uri = trim ($_GET['__route'],'/');
 		}
 		print_r($this->routes);
 		echo 'start';
 	}
 }