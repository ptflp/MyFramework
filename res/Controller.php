<?php
namespace res;

/**
 * Controller
 */
{
	abstract class Controller
	{
		public $view;
		function __construct()
		{
			$this->view = new View();
		}
	}
}
