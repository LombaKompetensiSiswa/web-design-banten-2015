<?php

include '../../app/init.php'; 

//header('Content-type:application/json');

if(!empty($_POST)){
	
	$user = $_POST['user'];
	$pass = $_POST['pass'];
	
	
	$query = $db->prepare('SELECT * FROM users WHERE `username` = :user AND `password` = :pass');
	$query->execute(array(
			'user' => $user,
			'pass'  => $pass
		));
	
	$id = $query->fetch(PDO::FETCH_ASSOC);
	if($query->rowCount() > 0){
		$_SESSION['id'] = $id['id'];
		echo "sukses"; 
	}else{
		echo "gagal";
	}
}

?>