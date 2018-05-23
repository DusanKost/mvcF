<?php 

// odvajac foldera  kao / ili \ zavisi od operativnog
define('DS', DIRECTORY_SEPARATOR);
//root ili file path od fila
define('ROOT', "C:" .DS ."xampp".DS."htdocs".DS."mvcF"); 

session_start();

// ucita konfiguracije i helper funkcije
require_once(ROOT . DS . 'config' . DS . 'config.php');
require_once(ROOT . DS . 'coreF' . DS . 'Helper.php');
require_once(ROOT . DS . 'coreF' . DS . 'Router.php');

//echo $_SERVER['PATH_INFO'];die();
$url = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : [];

// if (!Session::exists(CURRENT_USER_SESSION_NAME) && Cookie::exists(REMEMBER_ME_COOKIE_NAME)) {
// 	Users::loginUserFromCookie();
// }

//route the request
Router::route($url);
//Router::route($url,DEFAULT_CONTROLLER,DEFAULT_FUNCTION);