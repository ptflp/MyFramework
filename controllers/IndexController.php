<?php
require_once ROOT.'/../res/Controller.php';
/**
 * Controller
 */
class IndexController extends Controller
{
	public function actionIndex($id)
	{
		echo $id;
		echo 'Test';
	}
}