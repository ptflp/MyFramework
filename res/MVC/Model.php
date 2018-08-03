<?php

namespace App\MVC;

use \PDO;
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use App\Resource\Component;

/**
 * Doctrine Model
 */
class Model
{
	public $db;

	public static function getDoctrine()
	{
		$params = Component::getParams();
 		$configuration = Setup::createAnnotationMetadataConfiguration(
		    $paths = [$params['settings']['paths']],
		    $isDevMode = $params['settings']['isDevMode']
		);
		// Setup Doctrine
		// Setup connection parameters
		// Get the entity manager
		$db = EntityManager::create($params['db'], $configuration);
		return $db;
	}

	public static function getConnection()
	{
		$params = Component::getParams();
		$params = $params['db'];

		$dsn = "mysql:host={$params['host']};dbname={$params['dbname']}";
		$db = new PDO($dsn, $params['user'], $params['password']);

		return $db;
	}
}