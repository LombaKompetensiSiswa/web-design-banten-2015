<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
	include('../include/config.php');
	$dir = "gambar/";
	if(!empty($_FILES['foto_produk']['tmp_name'])){
		$foto_brg = $_FILES['foto_produk']['type'];
		
		if($foto_brg == "image/jpg" || $foto_brg == "image/jpeg" || $foto_brg == "image/x-png"){
			$foto = $dir . basename($_FILES['foto_produk']['name']);
			if(move_uploaded_file($_FILES['foto_produk']['tmp_name'], $foto)){
				$nama = $_POST['nama_produk'];
				$stok = $_POST['stok'];
				$label = $_POST['label'];
				$harga = $_POST['price'];
				$tgl = date('Y-m-d');
				$des = $_POST['desk'];
						
				$query = mysql_query("update produk set nama_produk='$nama', foto_produk='$foto', id_label='$label', stok='$stok', harga='$harga', tgl_input='$tgl', deskripsi='$des'");
				if($query){
					echo "Data berhasil di update $foto<center>";
					echo "<div><img src='$foto' width='150' height='200'/></div>";	
					echo "<div><b><small>$nama</small></b></div>";
					echo "<div><font color='red'><small>$harga</small></font></div>";
					echo "<a href='input_produk.php'>Input Produk Baru</a>";
					echo "</center>";
				}else{
					echo "<script language='JavaScript'>
								alert('data gagal di input');
								document.location='../admin/input_produk.php';
						  </script>";	
				}
				
			}else{
					echo "<script language='JavaScript'>
								alert('gambar gagal di upload');
								document.location='../admin/input_produk.php';
						  </script>";	
			}
		}else{
			echo "<script language='JavaScript'>
				alert('ekstensi file harus .jpeg .jpg .png');
				document.location='../admin/input_produk.php';
		  </script>";	
		}
	}else{
		echo "<script language='JavaScript'>
				alert('anda belum mengisi form');
				document.location='../admin/input_produk.php';
		  </script>";		
	}
?>
</body>
</html>