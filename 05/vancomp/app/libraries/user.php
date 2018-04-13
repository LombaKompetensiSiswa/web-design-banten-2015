<?php

class user{

	public static function is_login(){
		return (isset($_SESSION['id']))? true: false;	
	}
	
	public static function is_admin (){
		return (isset($_SESSION['admin']))? true: false;	
	}
	
	public static function ambil_data ($id){
		$us = $db->prepare('SELECT * FROM `users` WHERE `id` = :id');
		$us->execute(array('id' => $id));
		return $us->fetch(PDO::FETCH_ASSOC);
	}
	
}


?>