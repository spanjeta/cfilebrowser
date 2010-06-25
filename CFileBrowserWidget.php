<?php

// @see http://abeautifulsite.net/blog/2008/03/jquery-file-tree/

class CFileBrowserWidget extends CWidget
{
	/**
	 * The ID of the div element
	 *
	 * @access	public
	 * @var		string
	 */
	public $containerID = 'filebrowser';
	
	
	/**
	 * Specify the file root
	 * 
	 * @access	public
	 * @var 	string
	 */
	public $root = '/';
	
	
	/**
	 * The url of the script that acts as the connector.
	 * Arrays will be converted using Yii::app()->createUrl()
	 * 
	 * @access	public
	 * @var 	mixed
	 */
	public $script = array();
	
	
	/**
	 * Event to trigger folder/collapse
	 * 
	 * @access	public
	 * @var 	string
	 */
	public $folderEvent = 'click';
	
	
	/**
	 * Folder expand speed. Default 500ms (-1 for no animation)
	 * 
	 * @access	public
	 * @var		integer
	 */
	public $expandSpeed = 500;
	
	
	/**
	 * The collapse speed. Default 500ms (-1 for no animation)
	 * 
	 * @access	public
	 * @var		integer
	 */
	public $collapseSpeed = 500;
	
	
	/**
	 * The easing function (optional)
	 * 
	 * @access	public
	 * @var		string
	 */
	public $expandEasing = '';
	
	
	/**
	 * The collapse easing function (optional)
	 * 
	 * @access	public
	 * @var		string
	 */
	public $collapseEasing = '';
	
	
	/**
	 * Limit browsing to one folder at a time
	 * 
	 * @access 	private
	 * @var		boolean
	 */
	public $multiFolder = false;
	
	
	/**
	 * Loading message
	 * 
	 * @access	public
	 * @var		string
	 */
	public $loadMessage = 'Loading File Browser';
	
	
	/**
	 * Specify your custom CSS file (set false for nothing)
	 * 
	 * @access	public
	 * @var		mixed
	 */
	public $cssFile = null;
	
	
	/**
	 * Callback function of a selected file
	 *
	 * @access	public
	 * @var		string
	 */
	public $callbackFunction = '';
	
	
	/**
	 * The init method
	 * 
	 * @access 	public
	 * @return	null
	 */
	public function init()
	{
		if(!is_dir($this->root))
			$this->root = '/';
		
		$this->_loadScripts();
		$this->_loadStyles();
		
		parent::init();
	}
	
	/**
	 * Run
	 * 
	 * This is the main function that gets called
	 * to render stuff by the widget
	 * 
	 * @access	public
	 * @return	null
	 */
	public function run()
	{
		if(empty($this->script))
			throw new CException('Please specify the script url to the plugins connector');
			
		$script = '';
		
		if(is_array($this->script))
			$script = Yii::app()->createUrl($this->script[0], array_slice($this->script,1));
		
		$this->render('filebrowser',
			array(
				  'script'=>$script
			)
		);
		
	}
	
	/**
	 * Load scripts
	 * 
	 * @access	private
	 * @return	null
	 */
	private function _loadScripts()
	{
		$cs=Yii::app()->getClientScript();
		$cs->registerCoreScript('jquery');
		
		$basePath = Yii::getPathOfAlias('application.extensions.cfilebrowser.assets');
		$baseUrl = Yii::app()->getAssetManager()->publish($basePath);
		
		$cs->registerScriptFile($baseUrl.'/jquery.easing.js');
		$cs->registerScriptFile($baseUrl.'/jqueryFileTree.js');
	}
	
	/**
	 * Load styles
	 * 
	 * @access	private
	 * @return null
	 */
	private function _loadStyles()
	{
		if($this->cssFile === false)
			return false;
		
		$cs=Yii::app()->getClientScript();
		
		$basePath = Yii::getPathOfAlias('application.extensions.cfilebrowser.assets');
		$baseUrl = Yii::app()->getAssetManager()->publish($basePath);
		
		if(is_null($this->cssFile))
			$cs->registerCssFile($baseUrl.'/jqueryFileTree.css');
		else
			$cs->registerCssFile($this->cssFile);
	}
}

?>