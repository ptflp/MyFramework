<?php

namespace App\MVC;

use Mustache_Engine;
use Mustache_Loader_FilesystemLoader;

/**
 * View
*/
class View
{
	private $mustache;
	public $param;
	public $layout;

	function __construct()
	{
		if (class_exists('Mustache_Engine')) {
			$options =  array('extension' => '.html');
			$this->mustache = new Mustache_Engine(array(
									'loader' => new Mustache_Loader_FilesystemLoader(dirname(__FILE__) . '/../../views',$options),
								));
		}
		$this->layout='main';
	}

	public function render($viewScript,$param=false)
	{
		$this->param=$param;
		include_once ROOT.'/../views/'.$viewScript;
	}

	/*
	* If $param['render']='page' renders page without layouts
	 */
	public function muRender($template,$data,$param=false)
	{
		if(!$param) {
			$param = $this->param;
		}
		switch ($param['render']) {
			case 'part':
		 		$page = $this->muRenderPart($template,$data);

				break;

			default:
		 		$data['content'] = $this->muRenderPart($template,$data);
		 		$page = $this->muRenderPart('layouts/'.$this->layout,$data);
				break;
		}
		return $page;
	}

	public function muRenderPart($template,$data)
	{
		 $view=$this->mustache->loadTemplate($template);
		 return $view->render($data);
	}
}