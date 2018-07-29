<?php
/**
 * Doctrine Model
 */
class Model
{
	public $db;
 	function __construct()
 	{
 		$paramsPath = ROOT . '/../config/db_params.php';
		$params = include($paramsPath);
 		$configuration = Doctrine\ORM\Tools\Setup::createAnnotationMetadataConfiguration(
		    $paths = [$params['settings']['paths']],
		    $isDevMode = $params['settings']['isDevMode']
		);
		// Setup Doctrine
		// Setup connection parameters
		// Get the entity manager
		$this->db = Doctrine\ORM\EntityManager::create($params['db'], $configuration);
 	}
}