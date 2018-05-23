<?php  

/**
 * 
 */
class DB 
{
	private static $_instance = null;
	private $_pdo, $_query,$_error = false, $_result, $_countRows = 0, $_lastInsertID = null;
	
	public function __construct()
	{
		try {
			//$this->_pdo = new PDO('mysql:host=;dbname=','db user', 'db_password');
			$this->_pdo = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME,DB_USER, DB_PASSWORD);
			//For pdo errors
			$this->_pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			$this->_pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}

	public static function getInstance()
	{
		if (!isset(self::$_instance)) {
			self::$_instance = new DB();
		}
		return self::$_instance;
	}

	public function query($sql,$params = [])
	{
		$this->_error = false;
		if ($this->_query = $this->_pdo->prepare($sql)) 
		{
			if (count($params)) 
			{
				$x = 1;
				foreach ($params as $param)
				{
					$this->_query->bindValue($x, $param);
					$x++;
				}
			}

			if ($this->_query->execute()) 
			{
				$this->_result = $this->_query->fetchAll(PDO::FETCH_OBJ);
				$this->_countRows = $this->_query->rowCount();
				$this->_lastInsertID = $this->_pdo->lastInsertId();
			}else{
				$this->_error = true;
			}
		}
		return $this;
	}

	public function insert($table,$params = [])
	{
		$sqlString = "INSERT INTO {$table} ";
		$columnString = " (";
		$valueString = " VALUES (";
		$values = [];

		foreach ($params as $key => $value) 
		{
			$columnString .= $key . ',';
			$valueString .=  '?,';
			$values[] = $value;
		}

		$columnString = rtrim($columnString, ',');
		$valueString = rtrim($valueString, ',');
		$columnString .= ')';
		$valueString .= ');';
		$sqlString .= $columnString . $valueString;

		if (!$this->query($sqlString,$values)->error())
			return true;
		return false;

	}

	public function update($table,$params,$id)
	{
		$sqlString = "UPDATE {$table} SET ";
		$updateString = "";
		$values = [];

		foreach ($params as $key => $value) 
		{
			$updateString = "$key = " . "? ";
			$values[] = $value;
		}
		$sqlString .= $updateString;
		$sqlString .= "WHERE id = {$id}";

		//Helper::dnd($sqlString);

		if (!$this->query($sqlString,$values)->error())
			return true;
		return false;
	}

	public function delete($table,$id)
	{
		$sqlString = "DELETE FROM {$table} WHERE id = {$id}";

		if (!$this->query($sqlString)->error())
			return true;
		return false;
	}

	public function result()
	{
		return $this->_result;
	}

	public function first()
	{
		return (!empty($this->_result)) ? $this->_result[0] : [];
	}

	public function countRows()
	{
		return $this->_countRows;
	}

	public function lastID()
	{
		return $this->_lastInsertID;
	}

	public function getColumns($table)
	{
		return $this->query("SHOW COLUMNS FROM {$table}")->result();
	}

	public function error()
	{
		return $this->_error;
	}
}