<?php  

/**
 * 
 */
class Validate
{

	protected $_passed = false,$_values = [] ,$_rules = [],$_errors = [];

	public function __construct()
	{

	}
	
	public  function check($values = [],$rules = [])
	{
		$this->_rules = $rules;
		$this->_values = $values;

		if (empty($this->_rules) || empty($this->_values)) {
			$_errors[] = "Rules or values cannot be empty";
		}else{
			foreach ($this->_rules as $name => $rules) 
			{
				$tempRulesAry;
				if (strpos($rules, '|') !== false){
					$tempRulesAry[$name] = explode('|',$rules);
					//Helper::dnd($tempRulesAry);
				}
				else{
					$tempRulesAry[] = $rules;
					//Helper::dnd($tempRulesAry);
				}

				foreach ($tempRulesAry[$name] as $rule) 
				{
					//Helper::dnd($rule);
					if (strpos($rule,':') !== false) {
					    $tempExpR = explode(':',$rule);
					    $rule = $tempExpR[0];
					    //Helper::dnd($rule);
					}

					switch ($rule) {
					
					case 'required':
						if (empty($this->_values[$name]) || $this->_values[$name] == null) {
							$this->_errors[] = "{$name} is required";
						}
						break;

					case 'min':
						if (strlen($this->_values[$name]) < $tempExpR[1]) {
							$this->_errors[] = "{$name} must be at least {$tempExpR[1]} characters long";
						}
						break;

					case 'max':
						if (strlen($this->_values[$name]) > $tempExpR[1]) {
							$this->_errors[] = "{$name} cannot be at longer than {$tempExpR[1]}";
						}
						break;

					case 'email':
						if (!filter_var($this->_values[$name], FILTER_VALIDATE_EMAIL)) {
							$this->_errors[] = "{$name} must be a valid email";
						}
						break;

					case 'matches':
						if (strlen($this->_values[$name]) !== $tempExpR[1]) {
							$_errors[] = "{$name} must match {$tempExpR[1]}";
						}
						break;
					
					}
				}

			}
		}
	}


	public  function hasErrors()
	{
		if (empty($_errors)) {
			return true;
		}
		return false;
	}

	public  function errors()
	{
		return $this->_errors;
	}

}