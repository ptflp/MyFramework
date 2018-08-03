<?php

namespace App\Resource;

/**
  * Class Router
  */
 class Router
 {
 	private $routes;

 	function __construct()
 	{
 		$routesPath = dirname(__FILE__) . '/../config/routes.php'; // get aliases
 		$this->routes = include($routesPath);
 	}

 	private function getUri() // get URL address
 	{
 		if (!empty($_GET['__route'])) {
 			return $uri = trim ($_GET['__route'],'/');
 		}
 	}

 	public function dispatch($uri,$uriPattern=false,$path=false)
 	{
		if ($uriPattern && $path) {
			$internalRoute = preg_replace("~$uriPattern~",$path,$uri); // создание внутреннего роута для определения controller/action/parameters
		} else {
			if ($uri==null) {
				$uri='index/index';
			}
			$internalRoute = $uri;
		}
		$parts = explode('/',$internalRoute);
		$controllerName = array_shift($parts) . 'Controller';
		$controllerName = ucfirst($controllerName); // Создание имени контроллера

		$actionName = 'action' . ucfirst(array_shift($parts)); // Создание имени экшион

		$parameters=$parts; // оставшиеся параметры
		$controllerFile = dirname(__FILE__) . '/../controllers/' . $controllerName . '.php'; // имя файла контроллера
		if (file_exists($controllerFile)) {
			include_once($controllerFile);
			$controllerObject = new $controllerName;
			$result = method_exists($controllerObject,$actionName); // проверка на существование экшиона в конроллере

			if ($result == true) {
				call_user_func_array([$controllerObject,$actionName],$parameters); // вызов экшиона с передачей параметров
			} else {
				$this->notFound();
			}
		} else {
			$this->notFound();
		}
 	}

 	public function notFound()
 	{
 		$controllerName = 'Controller';
		$controllerFile = dirname(__FILE__) . '/'.$controllerName.'.php';
		if (file_exists($controllerFile)) {
			include_once($controllerFile);
			$controllerObject = new Controller;
			$result = method_exists($controllerObject,'notFound'); // проверка на существование экшиона в конроллере
			if ($result == true) {
				call_user_func_array([$controllerObject,'notFound'],[]); // вызов экшиона с передачей параметров
			}
		}
 	}

 	public function run()
 	{
 		$uri=$this->getUri();
 		$i=0;
 		foreach ($this->routes as $uriPattern => $path) {
 			if (preg_match("~$uriPattern~",$uri) && !$i) {
 				$i++;
 				$this->dispatch($uri,$uriPattern,$path);
 			}
 		}
 		if(!$i) {
 			$this->dispatch($uri,$uriPattern);
 		}
 	}
 }