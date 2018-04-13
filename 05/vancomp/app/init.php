<?php
session_start();

$db = new PDO('mysql:host=localhost;dbname=vancomp','root','');

spl_autoload_register(function($class){
	require_once 'app/libraries/' . $class . '.php';	
});


function base_url(){
	return 'http://localhost/vancomp/';
}

require_once 'core/app.php';
require_once 'core/controller.php';
?>