<?php 

/**
 * 
 */
require_once(ROOT . DS . 'coreF' . DS . 'Controller.php');

class RestrictedController extends Controller
{
	
	public function __construct()
	{
		parent::__construct();
	}

	public function restricted()
	{
		$this->view->render('home.index');
	}

	public function pageNotFound()
	{
		$this->view->render('restricted.404');
	}
}