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
 		$i=0;
 		foreach ($this->routes as $uriPattern => $path) {
 			if (preg_match("~$uriPattern~",$uri) && !$i) {
 				$i++;
 				$internalRoute = preg_replace("~$uriPattern~",$path,$uri); // создание внутреннего роута для определения controller/action/parameters
 				$parts = explode('/',$internalRoute);
 				$controllerName = array_shift($parts) . 'Controller';
 				$controllerName = ucfirst($controllerName); // Создание имени контроллера

 				$actionName = 'action' . ucfirst(array_shift($parts)); // Создание имени экшион

 				$parameters=$parts; // оставшиеся параметры

 				$controllerFile = ROOT . '/../controllers/' . $controllerName . '.php'; // имя файла контроллера

 				if (file_exists($controllerFile)) {
 					include_once($controllerFile);

	 				$controllerObject = new $controllerName;
	 				$result = method_exists($controllerObject,$actionName); // проверка на существование экшиона в конроллере

	 				if ($result == false) {
	 					echo 'wtf';
	 				} else {
	 					call_user_func_array([$controllerObject,$actionName],$parameters); // вызов экшиона с передачей параметров
	 				}
 				}
 			}
 		}
 	}
 }