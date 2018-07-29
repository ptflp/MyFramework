<?php
require_once ROOT . '/../res/View.php';
/**
 * Controller
 */
abstract class Controller
{
	public $view;
	function __construct()
	{
		$this->view = new View();
	}
}