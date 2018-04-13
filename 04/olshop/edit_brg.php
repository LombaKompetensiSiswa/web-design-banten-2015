<?php
require_once 'inc/init.php';

if(!$_SESSION['uid']) die ('Harap Login terlebih dahulu');

$sql=dbq('SELECT * FROM barang WHERE kd_brg="'.dbes($_GET['kd_brg']).'"');
$dt=dbfa($sql);

if(!$_POST['do'] == 'update'){
	$_POST['kd_brg'] = $dt['kd_brg'];
	$_POST['nm_brg'] = $dt['nm_brg'];
	$_POST['harga'] = $dt['harga'];
	$_POST['jumlah'] = $dt['jumlah'];
	$_POST['kd_kategori'] = $dt['kd_kategori'];
	$_POST['deskripsi'] = $dt['deskripsi'];
	
}
if($_POST['do'] == 'update'){
	$kd=dbes($_POST['kd_brg']);
	$name=dbes($_POST['nm_brg']);
	$harga=dbes($_POST['harga']);
	$jumlah=dbes($_POST['jumlah']);
	$kdk=dbes($_POST['kd_kategori']);
	$desk=dbes($_POST['deskripsi']);
	
	$image_upload=$update_kd=0;
	
	$errors=array();
	
	
	if($_POST['kd_brg'] != $dt['kd_brg']){
		if(!$_POST['kd_brg']){
		$errors['kd_brg'] = pem('Harap masukan Kode Barang');
	}else{
		$sqql=dbq('SELECT * FROM barang WHERE kd_brg="'.dbes($_POST['kd_brg']).'"');
		$dta=dbfa($sqql);
		if($dta) $errors['uid']=pem('Kode Barang yang Anda masukan sudah ada di dalam sistem, Harap masukan Kode yang lain');
		}
		$update_kd=1;
	}
	
	if(!$_POST['nm_brg']){
		$errors['nm_brg'] = pem('Harap masukan Nama Barang');
	}
	
	if(!(int)$_POST['harga']){
		$errors['harga'] = pem('Harap masukan Harga hanya dengan Angka');
	}
	
	if(!(int)$_POST['jumlah']){
		$errors['jumlah'] = pem('Harap masukan Jumlah Barang hanya dengan Angka');
	}
	
	if(!$_POST['deskripsi']){
		$errors['deskripsi'] = pem('Harap masukan Deskripsi Barang');
	}
	
	if(!$_POST['kd_kategori']){
		$errors['kd_kategori'] = pem('Harap masukan Kode Barang');
	}else{
		$sql=dbq('SELECT * FROM kategori WHERE kd_kategori="'.dbes($_POST['kd_kategori']).'"');
		$dt=dbfa($sql);
		if(!$dt) $errors['kd_kategori']=pem('Kode Kategori yang Anda masukan tidak ada, Harap gunakan Kode Kategori yang ada');
	}	
	
	if(!empty($_FILES['image']) || !empty($_FILES['image']['name'])){
		$image_upload=1;
	}
	
	$uploaddir='gambar/';
	$imgname=$_POST['kd_brg'];
	if($imgname){
		@unlink('gambar/'.$_GET['kd_brg'].'');
		$upload=move_uploaded_file($_FILES['image']['tmp_name'],$uploaddir.$imgname);
		$fotobrg=dbes($_FILES['image']['type']);
	}
	
	if($image_upload){
		@rename($uploaddir.hsc($dt['kd_brg']),$uploaddir.$imgname);
	}
	
	if(empty($errors)){
		$q=dbq('UPDATE barang SET kd_brg="'.$kd.'", nm_brg="'.$name.'", harga="'.$harga.'", jumlah="'.$jumlah.'", kd_kategori="'.$kdk.'", deskripsi="'.$desk.'", foto="'.$fotobrg.'"  WHERE kd_brg="'.dbes($_GET['kd_brg']).'"');
		
		header('Location: barang.php?kd_brg='.hsc($_GET['kd_brg']).'');
	}
}

$title='Edit Pengguna';
$contents='
<form action="" method="post" enctype="multipart/form-data" class="formbarang">
<input type="hidden" name="do" value="update">
<div class="textbox">Kode Barang<input type="text" name="kd_brg" value="'.hsc($_POST['kd_brg']).'" size="20">'.$errors['kd_brg'].'</div>
<div class="textbox">Nama Barang<input type="text" name="nm_brg" value="'.hsc($_POST['nm_brg']).'" size="20">'.$errors['nm_brg'].'</div>
<div class="textbox">Harga<input type="text" name="harga" value="'.hsc($_POST['harga']).'" size="10">'.$errors['harga'].'</div>
<div class="textbox">Jumlah<input type="text" name="jumlah" value="'.hsc($_POST['jumlah']).'" size="10">'.$errors['jumlah'].'</div>
<div class="textbox">Deskripsi <textarea name="deskripsi">'.hsc($_POST['deskripsi']).'</textarea></div>
<div class="textbox">Kode Kategori <input type="text" name="kd_kategori" values="'.hsc($_POST['kd_kategori']).'" size="5">'.$errors['kd_kategori'].'</div>
<input type="file" name="image">
<input type="submit" value="Simpan">
</form>';


include 'inc/page.php';

echo $page;
?>