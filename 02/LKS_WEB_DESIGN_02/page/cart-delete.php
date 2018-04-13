<?php
	session_start();
	include "../config.php";
	$id_product = $_GET['id_product'];
	
	
	$q = mysqli_query($db,"SELECT * FROM cart where code_product = '$id_product'");
	$f = mysqli_fetch_array($q);
	
	if(mysqli_num_rows($q) > 0){
		// return stok to default
		$back = mysqli_query($db,"UPDATE product SET stok = stok+$f[total] where id_product = '$id_product'");
		
		$del = mysqli_query($db,"DELETE FROM cart where code_product = '$id_product'");
		if($back AND $del){
			header("location:../index.php?page=cart&msg=success");
		} else {
			header("location:../index.php?page=cart&msg=failed");
		}
	}
?>