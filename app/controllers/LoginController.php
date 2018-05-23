<?php 

require_once(ROOT . DS . 'coreF' . DS . 'Controller.php');
require_once(ROOT . DS . 'coreF' . DS . 'Validate.php');

class LoginController extends Controller
{
	
	public function __construct()
	{
		parent::__construct();
	}


	public function index()
	{
		$this->view->render('auth.login');
	}

	public function create()
	{
		if ($_POST) {
			$request = Helper::cleared_values($_POST);
			//Helper::dnd($request);
			$validate = new Validate();
			$validate->check($request,[
				'email' => 'required|min:3',
				'password' => 'required|min:3'
			]);
			//Helper::dnd($validate->hasErrors());
			if ($validate->hasErrors()) {
				$this->view->errors = $validate->errors();
				$this->view->render('auth.login');
			}else{
				Helper::dnd("passed");
			}
		}else{
			//Helper::dnd("Location: http://localhost" . PROOT . "login");
			header("Location: http://" . PROOT . "login");
			exit();
		}
	}
}