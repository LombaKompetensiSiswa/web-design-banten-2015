<?php
	require_once "config.php";
?>
<!DOCTYPE html>
<html>
<head> 
	<title> REgister </title>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body>
<?php
	if(isset($_POST['register'])){
		$user = addslashes(strip_tags($_POST['username']));
		$password = addslashes(strip_tags(md5($_POST['username'])));
		$password_c = addslashes(strip_tags($_POST['password_c']));
		$fullname = addslashes(strip_tags($_POST['fullname']));
		
		$q = mysqli_query($db,"INSERT INTO users SET username = '$user', password = '$password', password_real = '$password_c', fullname = '$fullname', level = 'member'");
		if($q){
			echo '<script>alert("Your account has been created, login with this account")</script>';
			
		} else {
			alert('Sorry, something problem');
		}
	}
?>
	<div class="box-login">
		<div class="control-box">
			<h2 class="color-white h-normal"> Register </h2>
			<form action="" method="POST">
				<input type="text" name="username" placeholder="Username" class="form form-login" required>
				<input type="password" name="password" placeholder="Password" class="form form-login" required>
				<input type="password" name="password_c" placeholder="Confirm Password" class="form form-login" required>
				<input type="text" name="fullname" placeholder="Full name" class="form form-login" required>
				<input type="submit" name="register" value="Register" class="form form-login btn-login">
			</form><br><br>
			<a href="index.php" class="btn btn-read btn-blue color-white"> Home </a>
		</div>
	</div>
</body>
</html>