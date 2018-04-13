<?php
	require_once "../config.php";
	session_start();
	error_reporting(0);
	
	$msg = $_GET['msg'];
	$id_product = $_GET['id_product'];
	
	
	$q_cart = mysqli_query($db,"SELECT * FROM cart where code_product = '$id_product and code_access = '$_SESSION[access_code]''");
	$f_cart = mysqli_fetch_array($q_cart);
?>
<!DOCTYPE html>
<html>
<head>
	<title> Transaksi </title>
	<link rel="stylesheet" type="text/css" href="../assets/css/style.css">
	
	
</head>
<body>	
<?php
	if(isset($msg) && $msg == 1){
		if(isset($_POST['buy'])){
			$name = addslashes(strip_tags($_POST['name']));
			$email = addslashes(strip_tags($_POST['email']));
			$address = addslashes(strip_tags($_POST['address']));
			$method = addslashes(strip_tags($_POST['method']));
			$kode = rand(000,999);
			$_SESSION[kode] = $kode;
			
			$q_t = mysqli_query($db,"INSERT INTO transaksi SET code_product = '$f_cart[code_product]', kode_transaksi = '$_SESSION[kode]', name = '$name', email = '$email', method = '$method', address = '$address', date = NOW()");
			if($q_t){
				session_destroy();
				header("location:checkout.php");
			}
		}
?>

	<div class="box-login">
		<div class="control-box">
			<h2 class="color-white h-normal"> Konfirmasi </h2>
			<form action="" method="POST">
				<input type="text" name="name" placeholder="Your name..." class="form form-login" required>
				<input type="text" name="email" placeholder="Your email..." class="form form-login" required>
				<textarea name="address" placeholder="Your address..." class="form form-login form-textarea" required></textarea>
				<p class="color-white"> Your Method : </p>
				<p class="color-white"><input type="radio" name="method" value="cash"> Cash </p>
				<p class="color-white"><input type="radio" name="method" value="credit"> Credit </p>
				<input type="submit" name="buy" value="Buy" class="form form-login btn-login">
			</form><br>
			
		</div>
	</div>
<?php
	} else {
?>
<h2 align="center" class="color-dark h-normal" style="padding-top:50px"> History Shopping </h2>
<table class="table-history">
	<thead>	
		<tr>
			<th> Your Product </th>
			<th> Total Shop </th>
			<th> Date </th>
			<th> Kode Transaksi </th>
		</tr>
	</thead>
	<tbody>
<?php
	$q = mysqli_query($db,"SELECT * FROM transaksi 
	INNER JOIN product ON product.id_product = transaksi.code_product
	INNER JOIN cart ON cart.code_product = transaksi.code_product
	where kode_transaksi = '$_SESSION[kode]'");
	
	if(mysqli_num_rows($q) > 0){
		while($f = mysqli_fetch_array($q)){
?>

		<tr>
			<td> <?= $f[title] ?> </td>
			<td> <?= $f[total] ?> Item </td>
			<td> <?= $f[date] ?> </td>
			<td> <?= $_SESSION[kode] ?> </td>
		</tr>
<?php
		}
	}
?>
	</tbody>
</table>
<p align="center"><a href="../index.php" class="btn btn-read btn-blue color-white"> Back to Shopping </a></p>

<?php
	}
?>
</body>
</html>