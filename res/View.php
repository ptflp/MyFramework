<?php
/**
 * View
 */
class View
{
	public $mustache;
	function __construct()
	{
		if (class_exists('Mustache_Engine')) {
		    $this->mustache = new Mustache_Engine;
		}
	}
	public function render($viewScript)
	{
		require($viewScript);
	}
}