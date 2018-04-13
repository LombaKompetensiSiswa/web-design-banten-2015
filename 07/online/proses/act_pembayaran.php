<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
	$dir = "struk/";
	if(!empty($_FILES['struk']['tmp_name'])){
		$foto_brg = $_FILES['struk']['type'];
		
		if($foto_brg == "image/jpg" || $foto_brg == "image/jpeg" || $foto_brg == "image/x-png"){
			$foto = $dir . basename($_FILES['struk']['name']);
			if(move_uploaded_file($_FILES['struk']['tmp_name'], $foto)){
					include('../include/config.php');
					$user = $_POST['username'];
					$pass = md5($_POST['password']);
					
					$cek_user = mysql_query("select * from user where username='$user' and password='$pass'");
					$cek_user_rows = mysql_num_rows($cek_user);
					$cek_id = mysql_fetch_array($cek_user);
					if($cek_user_rows==1){
					
					
					$id_pro = $_POST['produk'];
					$cek_prdk = mysql_query("select * from produk where id_produk='$id_pro'");
					$cek_prdk_nm = mysql_fetch_array($cek_prdk);
					
					$id_user = $cek_id[0];
					$jumlah = 1;
					$total = 1*$cek_prdk_nm['harga'];
					
					$tgl_psn = date('Y-m-d');
					$status = "belum cek";
					$ris = date('dmYHis');
					
					$up_pesan = mysql_query("insert into pesan values('','$id_pro','$id_user','$jumlah','$total','$tgl_psn','$status','$ris')");
					$cek_id_pesan = mysql_query("select * from pesan where ris='$ris'") or die("gagal upload pemesanan".mysql_error());
					$id_pesan_ris = mysql_fetch_array($cek_id_pesan);
					
					$id_pesan = $id_pesan_ris[0];
					$no_hp = $_POST['no_hp'];
					$prov = $_POST['provinsi'];
					$kota = $_POST['kota'];
					$kec = $_POST['kecamatan'];
					$almt = $_POST['alamat'];
					
					$up_almt = mysql_query("insert into alamat values('','$id_pesan','$no_hp','$prov','$kota','$kec','$almt')") or die("gagal upload alamat".mysql_error());;
					
					$nama = $_POST['nama'];
					$no_rek = $_POST['no_rek'];
					$nom = $_POST['nominal'];
					$bank = $_POST['bank'];
					
					$up_bayar = mysql_query("insert into pembayaran values('','$id_user','$id_pesan','$nama','$no_rek','$nom','$bank','$status','$foto')") or die("gagal upload pembayaran".mysql_error());
					
					
					$up_stok = mysql_query("update produk set stok=(stok-1) where id_produk='$id_pro'") or die("gagal update stok".mysql_error());;
				if($up_pesan && $up_almt && $up_bayar && $up_stok){
					echo "<script language='JavaScript'>
								alert('Pembayaran Berhasil Dilakukan. Terimakasih telah melakukan pembelian');
								document.location='../';
						  </script>";	
				}else{
					echo "<script language='JavaScript'>
								alert('pembayaran gagal dilakukan. coba beberapa saat lagi');
								document.location='step_alamat.php';
						  </script>";	
				}
						
						
						
						
					}
			}else{
					echo "<script language='JavaScript'>
								alert('gambar gagal di upload');
								document.location='step_pembayaran.php';
						  </script>";	
			}
		}else{
			echo "<script language='JavaScript'>
				alert('ekstensi file harus .jpeg .jpg .png');
				document.location='step_pembayaran.php';
		  </script>";	
		}
	}else{
		echo "<script language='JavaScript'>
				alert('anda belum mengisi form alamat pengiriman');
				document.location='step_alamat.php';
		  </script>";		
	}
		
		
?>
</body>
</html>