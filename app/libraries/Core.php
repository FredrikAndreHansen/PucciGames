<?php
//Core App class
class Core {
	
	protected $currentController = "Index";
	protected $currentMethod = "index";
	protected $params = [];
	
	public function __construct() {
		
		$url = $this->getURL() ? $this->getURL() : ['', ''];
		//if ($url == ''){$url = ['', ''];}
		
		//Check if the first index in the url array exists, ucwords will capitalize the first letter
		if (file_exists("../app/controllers/" . ucwords($url[0]) . ".php")) {
			//Will set a new controller
			$this->currentController = ucwords($url[0]);
			unset($url[0]);
			
		}
		
		//Requre the controller
		require_once "../app/controllers/" . $this->currentController . ".php";
		$this->currentController = new $this->currentController;
		
		//Check for the second parameter in the url
		if(isset($url[1])){
			
			if(method_exists($this->currentController, $url[1])){
				
				$this->currentMethod = $url[1];
				unset($url[1]);
				
			}
		}
		
		//Get parameters, if there are not then it will return empty
		$this->params = $url ? array_values($url) : [];
		
		//Call a callback with array of params
		call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
	}
	
	//Function to remove the last "/" in the URL
	public function getURL() {
		
		if(isset($_GET["url"])){
			//Trims the "/" from the url
			$url = rtrim($_GET["url"], "/");
			//Not allowing charactes a URL should not have(@ or $ etc..)
			$url = filter_var($url, FILTER_SANITIZE_URL);
			//Break the url to an array
			$url = explode("/", $url);
			return $url;	
		}
		
	}
	
}

?>