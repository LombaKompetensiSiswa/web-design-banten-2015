<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
	include('../include/config.php');
	
	$status = $_POST['status'];
	$id = $_POST['id_pesan'];
	$edit = mysql_query("update pesan set status='$status' where id_pesan='$id'");
	$edit2 = mysql_query("update pembayaran set status='$status' where id_pesan='$id'");
	
	if($edit && $edit2){
		echo "<script language='JavaScript'>
				alert('edit status pesan berhasil');
				document.location='../admin/cek_pesan.php';
		  </script>";	
	}else{
			echo "<script language='JavaScript'>
				alert('edit status pesan gagal');
				document.location='../admin/edit_pesan.php';
		  </script>";	
	}
				
?>
</body>
</html>