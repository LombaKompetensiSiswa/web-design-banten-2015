<?php

Class App{
		
	private $controller = 'home',
			$method		= 'index',
			$params		= array();
			
			
	public function __construct(){
				
		$url = $this->parseUrl();
		
		if(isset($url[0])){
			if(file_exists('app/controllers/' . $url[0] . '.php')){
				$this->controller = $url[0];
				unset($url[0]);
			}	
		}
		
		require_once 'app/controllers/' . $this->controller . '.php';
		
		$obj = new $this->controller;
		
		if(isset($url[1])){
			if(method_exists($this->controller, $url[1])){
				$this->method = $url[1];
				unset($url[1]);
			}	
		}
		
		$this->params = (!empty($url))?array_values($url):array();
		
		call_user_func_array(array($obj, $this->method), $this->params);
	}
	
	private function parseUrl(){
		if(isset($_GET['url'])){
			return explode('/', filter_var( trim($_GET['url']), FILTER_SANITIZE_URL));	
		}	
	}
		
}


?>