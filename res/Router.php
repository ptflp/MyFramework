<?php
/**
  * Class Router
  */
 class Router
 {
 	private $routes;
 	function __construct()
 	{
 		$routesPath = ROOT.'/../config/routes.php'; // get aliases
 		$this->routes = include($routesPath);
 	}
 	private function getUri() // get URL address
 	{
 		if (!empty($_GET['__route'])) {
 			return $uri = trim ($_GET['__route'],'/');
 		}
 	}
 	public function run()
 	{
 		$uri=$this->getUri();
 		foreach ($this->routes as $uriPattern => $path) {
 			if (preg_match("~$uriPattern~",$uri)) {
 				$parts = explode('/',$path);
 				$controllerName = array_shift($parts) . 'Controller';
 				$controllerName = ucfirst($controllerName);
 				$actionName = 'action' . ucfirst(array_shift($parts));
 				$controllerFile = ROOT . '/../controllers/' . $controllerName . '.php';
 				if (file_exists($controllerFile)) {
 					include_once($controllerFile);
 				}
 				$controllerOject = new $controllerName;
 				$result = $controllerOject->$actionName();
 				if ($result != null) {
 					break;
 				}
 			}
 		}
 	}
 }