<?php
include(ROOT.'/../vendor/autoload.php');
include(ROOT.'/../autoload.php');
use res\Router;
switch (APP_ENV) {
	case 'dev':
		error_reporting(E_ALL & ~E_NOTICE);
		break;
	case 'production':
		error_reporting(0);
		break;
	default:
		error_reporting(0);
		break;
}
$router = new Router();
$router->run();