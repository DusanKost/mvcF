<?php  

/**
 * 
 */
class Helper
{
	// From string to array by ,
	public static function toArray($params)
	{
		if(empty($params))
			return false;

		$paramsAry = explode(',', $params);
		return $paramsAry;
	}

	// Var dump 
	public static function dnd($request)
	{
		echo "<pre>";
			var_dump($request);
		echo "</pre>";
		die();
	}
	// Clearing input 
	public static function sanitaze($input)
	{
		return htmlentities($input, ENT_QUOTES, 'UTF-8');
	}

	// Client current page
	public static function currentPage()
	{
		$currentPage = $_SERVER['REQUEST_URI'];
		if ($currentPage == PROOT || $currentPage == PROOT . 'home/index') {
			$currentPage = PROOT . 'home';
		}
		return $currentPage;
	}

	// Cleared ary
	public static function cleared_values($ary)
	{
		$clear_ary = [];
		foreach ($ary as $key => $value) 
		{
			$clear_ary[$key] = self::sanitaze($value);
		}
		return $clear_ary;
	} 
}