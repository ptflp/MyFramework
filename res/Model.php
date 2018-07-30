<?php
/**
 * Doctrine Model
 */
namespace res;
use \PDO;
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
class Model
{
	public $db;
	public static function getDoctrine()
	{
 		$paramsPath = dirname(__FILE__).'/../config/db_params.php';
		$params = include($paramsPath);
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
		$paramsPath = dirname(__FILE__).'/../config/db_params.php';
		$params = include($paramsPath);
		$params = $params['db'];

		$dsn = "mysql:host={$params['host']};dbname={$params['dbname']}";
		$db = new PDO($dsn, $params['user'], $params['password']);

		return $db;
	}
}