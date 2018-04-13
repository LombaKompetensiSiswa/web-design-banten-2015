<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
	include('../include/config.php');
	if(isset($_POST['daftar_member'])){
		$user = $_POST['username'];
		$pass = md5($_POST['password']);
		$nama = $_POST['name'];
		$level = "member";
		
		$cek = mysql_query("select * from user where username='$user'");
		$cek_rows = mysql_num_rows($cek);
		
		if($cek_rows==0){
			$ins = mysql_query("insert into user values('','$user','$pass','$nama','$level')");
			if($ins){
				echo "<script language='JavaScript'>
								alert('berhasil daftar');
								document.location='../';
						  </script>";	
			}else{
				echo "<script language='JavaScript'>
								alert('gagal daftar');
								document.location='../';
						  </script>";		
			}
		}else{
			echo "<script language='JavaScript'>
								alert('username sudah terdaftar sebelumnya');
								document.location='../';
						  </script>";		
		}
		
	}else{
		echo "<script language='JavaScript'>
								alert('anda belum mengisi form daftar member');
								document.location='../';
						  </script>";		
	}
?>
</body>
</html>