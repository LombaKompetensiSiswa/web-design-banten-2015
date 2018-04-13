<?php
	require_once "../config.php";
	error_reporting(0);
	session_start();
	
	$page = addslashes(strip_tags($_GET['page']));
	$action = addslashes(strip_tags($_GET['action']));
	$id = addslashes(strip_tags($_GET['id']));
	
?>
<!DOCTYPE html>
<html>
<head>
	<title> Admin Panel </title>
	<link rel="stylesheet" type="text/css" href="../assets/css/style.css">
</head>
<body>
<?php
	if(isset($_POST['login'])){
		$user = addslashes(strip_tags($_POST['username']));
		$password = addslashes(strip_tags(md5($_POST['password'])));
		
		$q = mysqli_query($db,"SELECT * FROM users where username = '$user' and password = '$password'");
		$f = mysqli_fetch_array($q);
		if(mysqli_num_rows($q) > 0){
			$_SESSION['username'] = $f['username'];
			$_SESSION['level'] = $f['level'];
			$_SESSION['fullname'] = $f['fullname'];
		} else {
		
			echo "<script>alert('Username Or Password invalid');</script>";
		}
		
		
	}
	
	if($_SESSION['level'] == "" || $_SESSION['level'] !== "admin"){
?>
	<div class="box-login">
		<div class="control-box">
			<h2 class="color-white h-normal"> Login </h2>
			<form action="" method="POST">
				<input type="text" name="username" placeholder="Username" class="form form-login" required>
				<input type="password" name="password" placeholder="Password" class="form form-login" required>
				<input type="submit" name="login" value="Login" class="form form-login btn-login">
			</form><br>
			<a href="../register.php" class=" color-white reg"> Or Register </a>
		</div>
	</div>
<?php
	} else {
	
?>
	<main>
		<header id="head-admin">
			<h2 class="h-dash"> Dashboard </h2>
			<a href="logout.php" class="btn btn-dark color-white logout"> Logout </a>
		</header>
		
		<section id="menu-admin">
			<nav id="admin">
				<li><a href="index.php?page=home"> Home </a></li>
				<li><a href="index.php?page=product&action=list"> List Product </a></li>
				<li><a href="index.php?page=category&action=list"> Category Product </a></li>
				<li><a href="index.php?page=transaksi&action=list"> Transaksi User </a></li>
				<li><a href="index.php?page=member&action=list"> List Member </a></li>
				<li><a href="index.php?page=banner&action=list"> Banner Slideshow </a></li>
			</nav>
		</section>
		
		<section id="content-admin">
			<div class="control-box">
	<?php
		if($page == ""){
			include "page/home.php";
		} else if($action == ""){
			include "page/$page.php";
		} else include "page/$page-$action.php";
	?>
			
			</div>
		</section>
	</main>
<?php
	}
?>
</body>
</html>