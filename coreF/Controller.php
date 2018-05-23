<?php  

/**
 * 
 */
require_once(ROOT . DS . 'coreF' . DS . 'View.php');

class Controller 
{
	public $view;

	public function __construct()
	{
		$this->view = new View();
	}
}