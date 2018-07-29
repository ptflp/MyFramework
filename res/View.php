<?php
/**
 * View
 */
class View
{
	public $mustache;
	public $message;
	public $param=[];
	function __construct()
	{
		if (class_exists('Mustache_Engine')) {
		    $this->mustache = new Mustache_Engine;
		}
	}
	public function render($viewScript,$param=false)
	{
		$this->param=$param;
		include_once ROOT.'/../views/'.$viewScript;
	}
}