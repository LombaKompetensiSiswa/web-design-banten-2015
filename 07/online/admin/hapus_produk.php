<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
	include('../include/config.php');
	
	$id = $_POST['hapus'];
	$query = mysql_query("delete from produk where id_produk='$id'");
	if($query){
		echo "<script language='JavaScript'>
				alert('berhasil menghapus produk');
				document.location='input_produk.php';
		  </script>";	
	}else{
		echo "<script language='JavaScript'>
				alert('gagal menghapus produk');
				document.location='input_produk.php';
		  </script>";	
	}
?>
</body>
</html>