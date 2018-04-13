<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
	session_start();
	
	if(isset($_POST['login_admin'])){
		include('../include/config.php');
		$user = $_POST['username'];
		$pass = md5($_POST['password']);
		$cek = mysql_query("select * from user where username='$user' and password='$pass'");
		$cek_rows = mysql_num_rows($cek);
		
		if($cek_rows==1){
			$_SESSION['username'] = $user;
			$show = mysql_fetch_array($cek);
			
			$_SESSION['level'] = $show['level'];
			$nama = $show['name'];
			echo "<script language='JavaScript'>
						alert('selamat datang admin = $nama');
						document.location='../admin/menus.php';
				  </script>";	
			
		}else{
			echo "<script language='JavaScript'>
						alert('username atau password salah');
						document.location='../admin/';
				  </script>";	
		}
		
	}else{
		echo "<script language='JavaScript'>
				alert('anda harus mengisi form login terlebih dahulu');
				document.location='../admin/';
		  </script>";	
	}
?>
</body>
</html>