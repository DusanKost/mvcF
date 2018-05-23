<?php  

/**
 * 
 */
class View
{
	protected $_types = [],$_siteTitle = SITE_TITLE,$_outputBuffer,$_layout = DEFAULT_LAYOUT;
	
	public function __construct()
	{
		foreach (CONTENT_TYPE as $type => $v) 
		{
			$this->_types[] = $type;
			$this->_types[$type] = $v;
		}
		//Helper::dnd($this->_types);
	}

	public function render($viewName)
	{
		$viewArray = explode('.', $viewName);
		$viewString = implode(DS, $viewArray);
		if(file_exists(ROOT . DS . 'app' . DS . 'views' . DS . $viewString . '.php'))
		{
			include(ROOT . DS . 'app' . DS . 'views' . DS . $viewString . '.php');
			include(ROOT . DS . 'app' . DS . 'views' . DS . 'layouts' . DS . $this->_layout . '.php');
		}else{
			die('The view \"' . $viewName . '\" does not exist.');
		}
	}

	public function content($type)
	{
		if (in_array($type, $this->_types)) 
		{
			return $this->_types[$type];
		}
		return false;
	}

	public function start($type)
	{
		$this->_outputBuffer = $type;
		ob_start();
	}

	public function end($type)
	{
		if ($this->_outputBuffer == $type) 
			$this->_types[$type] = ob_get_clean();
		else
			die('You must first run the start method');
	}

	public function siteTitle()
	{
		return $this->_siteTitle;
	}

	public function setSiteTitle($title)
	{
		$this->_siteTitle = $title;
	}

	public function setLayout($path)
	{
		$this->_layout = $path;
	}
}