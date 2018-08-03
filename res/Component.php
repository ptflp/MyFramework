<?php

namespace App\Resource;

/**
 * Class Component
 */
class Component
{
	protected $params;
	function __construct()
	{
		$this->$params = Component::getParams();
	}

	public static function getParams()
	{
		$paramsPath = dirname(__FILE__).'/../config/db_params.php';
		return include($paramsPath);
	}
}