<?php
	$id = $_GET['id'];
	
	$q = mysqli_query($db,"SELECT * FROM category where id = '$id'");
	
	$del = mysqli_query($db,"DELETE FROM category where id = '$id'");
	if($del){
		header('location:index.php?page=category&action=list');
	}
?>