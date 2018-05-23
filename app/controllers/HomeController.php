<?php 

/**
 * 
 */
require_once(ROOT . DS . 'coreF' . DS . 'Controller.php');
require_once(ROOT . DS . 'app' . DS . 'models'.DS .'User.php');

class HomeController extends Controller
{
	
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$user = new User('users');
		$users = $user->getAll();
		//Helper::dnd($userS);
		$this->view->users = $users;
		$this->view->render('home.index');
	}

	public function home(){die("Home");}
}