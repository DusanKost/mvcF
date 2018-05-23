<?php 

/**
 * 
 */
class Router 
{

	public static function route($url)
	{
		if (empty($url)) {
			$url = "/";
		}
		$routerJSON = file_get_contents(ROOT . DS . 'app' . DS . 'routes.json');
		$availableRoutes = json_decode($routerJSON,true);
		//Helper::dnd($url);
		if (array_key_exists($url, $availableRoutes)) 
		{
			$params = explode('@', $availableRoutes[$url]);
			$controller = $params[0];
			$action = $params[1];

			require_once(ROOT . DS . 'app' . DS .'controllers'. DS . $controller.'.php');
			$dispach = new $controller();
			if (method_exists($controller, $action)) {
				//this function expects a class function for a class and as a second param an array of params or an empty ary
				call_user_func_array([$dispach,$action],[]);
			}
		}
		else{
			require_once(ROOT . DS . 'app' . DS .'controllers'. DS . DEFAULT_RESTRICTED_CONTROLLER_404.'.php');
			$restricted = DEFAULT_RESTRICTED_CONTROLLER_404;
			$dispach = new $restricted();
			if (method_exists(DEFAULT_RESTRICTED_CONTROLLER_404, DEFAULT_RESTRICTED_CONTROLLER_404_ACTION)) {
				//this function expects a class function for a class and as a second param an array of params or an empty ary
				call_user_func_array([$dispach,DEFAULT_RESTRICTED_CONTROLLER_404_ACTION],[]);
			}
		}
	}

	// public static function route($url,$controller,$function)
	// {
	// 	$routerJSON = file_get_contents(ROOT . DS . 'app' . DS . 'router.json');
	// 	$availableRoutes = json_decode($routerJSON,true);
	// 	if (array_key_exists($controller,$availableRoutes)) {
	// 		if (array_key_exists($function, $availableRoutes[$controller])) {
	// 			if ($availableRoutes[$controller][$function] === $url) {
	// 				require_once(ROOT . DS . 'app' . DS .'controllers'. DS . $controller.'.php');
	// 				$dispach = new $controller();
	// 				if (method_exists($controller, $function)) {
	// 					//this function expects a class function for a class and as a second param an array of params or an empty ary
	// 					call_user_func_array([$dispach,$function],[]);
	// 				}
	// 			}else{
	// 				die('That method does not exist in the controller\"' . $controller);
	// 			}
	// 		}
	// 	}
	// }
}