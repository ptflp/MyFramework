<?php
include(ROOT.'/../vendor/autoload.php');
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
require(ROOT.'/../res/Router.php');
$router = new Router();
$router->run();