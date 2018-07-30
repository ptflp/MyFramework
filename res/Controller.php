<?php
/**
 * Controller
 */
namespace res;
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
