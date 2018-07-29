<?php
/**
 * Class database
 */
class Db
{
	public static function getConnection()
	{
		$paramsPath = ROOT . '/../config/db_params.php';
		$params = include($paramsPath);
		$params = $params['db'];

		$dsn = "mysql:host={$params['host']};dbname={$params['dbname']}";
		$db = new PDO($dsn, $params['user'], $params['password']);

		return $db;
	}
}