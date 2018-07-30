<?php
/**
 * View
 */
namespace res;
use Mustache_Engine;
use Mustache_Loader_FilesystemLoader;
{
	class View
	{
		private $mustache;
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
		public function muRender($template,$data)
		{
	 		$view=$this->mustache->loadTemplate($template);
	 		return $view->render($data);
		}
	}
}
