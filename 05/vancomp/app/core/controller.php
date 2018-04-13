<?php

class controller{
	
	protected function view($view, $data = array(), $data_hal = array()){
		require_once 'app/views/' . $view . '.php';
	}
}

?>