<?php
	session_start();
	include "../config.php";
	$id_product = $_GET['id_product']; // get id_product parameter
	
	if($_SESSION[access_code] == ""){
		$rand_code = rand(000,999); // for get access code
		$_SESSION[access_code] = $rand_code;
	}
	
	$q = mysqli_query($db,"SELECT * FROM product where id_product = '$id_product'");
	$f = mysqli_fetch_array($q);
	

	if(mysqli_num_rows($q) > 0){
		$q_check = mysqli_query($db,"SELECT * FROM cart where code_product = '$id_product' and code_access = '$_SESSION[access_code]'");
		
		// check if user already shopping with the same item
		if(mysqli_num_rows($q_check) == 0){
			$q_insert = mysqli_query($db,"INSERT INTO cart SET code_product = '$id_product', code_access = '$_SESSION[access_code]', total = '1', date = NOW()");
			
		} else {
			$q_update = mysqli_query($db,"UPDATE cart SET total = total+1, date = NOW() where code_product = '$f[id_product]' and code_access = '$_SESSION[access_code]'");
		}
		if($q_insert OR $q_update){
			// update stok in product
			$update_stok = mysqli_query($db,"UPDATE product SET stok = stok-1 where id_product = '$id_product'");
			header("location:../index.php?page=cart");
		}
		
		
	}
?>