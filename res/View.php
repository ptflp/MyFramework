<?php
/**
 * View
 */
class View
{

	function __construct()
	{
		
	}
	public function render($viewScript)
	{
		require($viewScript);
	}
}