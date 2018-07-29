<?php
/**
 * View
 */
class View
{
	public $mustache;
	public $message;
	function __construct()
	{
		if (class_exists('Mustache_Engine')) {
		    $this->mustache = new Mustache_Engine;
		}
	}
	public function render($viewScript)
	{
		include_once ROOT.'/../views/'.$viewScript;
	}
}