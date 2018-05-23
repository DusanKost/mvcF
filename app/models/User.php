<?php  

/**
 * 
 */
require_once(ROOT . DS . 'coreF' . DS . 'Model.php');

class User extends Model
{
	
	public function __construct($table)
	{
		parent::__construct($table);
	}
}