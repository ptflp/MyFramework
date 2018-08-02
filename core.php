<?php
include dirname(__FILE__).'/vendor/autoload.php';

use Tracy\Debugger;
use App\Resource\Router;

switch (APP_ENV) {
	case 'dev':
		error_reporting(E_ALL & ~E_NOTICE);
		Debugger::$strictMode = TRUE;
		Debugger::enable(Debugger::DEVELOPMENT);
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