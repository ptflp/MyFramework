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
			$options =  array('extension' => '.html');
		    $this->mustache = new Mustache_Engine(array(
								'loader' => new Mustache_Loader_FilesystemLoader(dirname(__FILE__) . '/../views',$options),
							));
		}
	}
	public function render($viewScript,$param=false)
	{
		$this->param=$param;
		include_once ROOT.'/../views/'.$viewScript;
	}
}