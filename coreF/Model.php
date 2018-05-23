<?php 

/**
 * 
 */
require_once(ROOT . DS . 'coreF' . DS . 'DB.php');

class Model
{
	protected $_db,$_table,$_columnNames = null;
	
	public function __construct($table)
	{
		$this->_table = $table;
		$this->_db = DB::getInstance();
		$this->_columnNames = $this->_db->getColumns($table);
	}

	public function getAll()
	{
		return $this->_db->query("SELECT * FROM {$this->_table}")->result();
	}

	public function findFirst()
	{
		return $this->_db->query("SELECT * FROM {$this->_table}")->first();
	}

	public function create($params = [])
	{
		return $this->_db->insert($this->_table,$params);
	}

	public function update($params,$id)
	{
		return $this->_db->update($this->_table,$params,$id);
	}

	public function delete($id)
	{
		return $this->_db->delete($this->_table,$id);
	}

	/*
	Getters
	*/

	public function columnNames()
	{
		return $this->_columnNames;
	}
}