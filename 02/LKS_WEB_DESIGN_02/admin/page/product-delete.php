<?php
	$id = $_GET['id'];
	
	$q = mysqli_query($db,"SELECT * FROM product where id_product = '$id'");
	
	$del = mysqli_query($db,"DELETE FROM product where id_product = '$id'");
	if($del){
		header('location:index.php?page=product&action=list');
	}
?>