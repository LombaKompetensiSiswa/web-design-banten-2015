<?php
require_once 'inc/init.php';

if(!$_SESSION['uid']) die ('Harap Login terlebih dahulu');

if($_POST['do'] == 'submit'){
	$kd=dbes($_POST['kd_brg']);
	$nm=dbes($_POST['nm_brg']);
	$harga=dbes($_POST['harga']);
	$jmlh=dbes($_POST['jumlah']);
	$dec=dbes($_POST['deskripsi']);
	$kdk=dbes($_POST['kd_kategori']);
	
	$errors=array();
	
	if(!$_POST['kd_brg']){
		$errors['kd_brg'] = pem('Harap masukan Kode Barang');
	}else{
		$sql=dbq('SELECT * FROM barang WHERE kd_brg="'.dbes($_POST['kd_brg']).'"');
		$dt=dbfa($sql);
		if($dt) $errors['kd_brg']=pem('Kode Barang yang Anda masukan sudah ada, Harap gunakan Kode Barang yang lain');
	}
	
	if(!$_POST['nm_brg']){
		$errors['nm_brg'] = pem('Harap masukan Nama Barang');
	}
	
	if(!(int)$_POST['harga']){
		$errors['harga'] = pem('Harap masukan Harga hanya dengan Angka');
	}
	
	if(!(int)$_POST['jumlah']){
		$errors['jumlah'] = pem('Harap masukan Jumlah hanya dengan Angka');
	}
	
	if(!$_POST['deskripsi']){
		$errors['deskripsi']=pem('Harap masukan Deskripsi Produk Anda');
	}
	
	if(!$_POST['kd_kategori']){
		$errors['kd_kategori'] = pem('Harap masukan Kode Barang');
	}else{
		$sql=dbq('SELECT * FROM kategori WHERE kd_kategori="'.dbes($_POST['kd_kategori']).'"');
		$dt=dbfa($sql);
		if(!$dt) $errors['kd_kategori']=pem('Kode Kategori yang Anda masukan tidak ada, Harap gunakan Kode Kategori yang ada');
	}
	
	$uploaddir='gambar/';
	$imgname=$_POST['kd_brg'];
	if($imgname){
		$upload=move_uploaded_file($_FILES['image']['tmp_name'],$uploaddir.$imgname);
	}
	
	$foto=dbes($_FILES['image']['type']);
	
	
	if(empty($errors)){
		$q=dbq('INSERT INTO barang (kd_brg,nm_brg,harga,jumlah,deskripsi,foto,kd_kategori,tgl) VALUES ("'.$kd.'","'.$nm.'","'.$harga.'","'.$jmlh.'","'.$dec.'","'.$foto.'","'.$kdk.'",now())');
		
		header('Location: index.php');
	}
}

$title='Tambah Barang';
$contents='
<div class="caption"> TAMBAH BARANG</div>
<form action="" method="post" enctype="multipart/form-data" class="form formlogin">
<input type="hidden" name="do" value="submit">
<div>Kode Barang</div>
<div><input type="text" name="kd_brg" value="'.hsc($_POST['kd_brg']).'" size="10">'.$errors['kd_brg'].'</div>
<div>Nama Barang</div>
<div><input type="text" name="nm_brg" value="'.hsc($_POST['nm_brg']).'" size="50">'.$errors['nm_brg'].'</div>
<div>Harga</div>
<div><input type="text" name="harga" value="'.hsc($_POST['harga']).'" size="10">'.$errors['harga'].'</div>
<div>Jumlah</div>
<div><input type="text" name="jumlah" value="'.hsc($_POST['jumlah']).'" size="10">'.$errors['jumlah'].'</div>
<div>Deskripsi</div>
<div><textarea name="deskripsi" rows="10" cols="45"></textarea></div>
<div>Kode Kategori</div>
<div><input type="text" name="kd_kategori" values="'.hsc($_POST['kd_kategori']).'" size="5">'.$errors['kd_kategori'].'</div>
<div><input type="file" name="image"></div>
<div><input type="submit" value="Simpan" class="button"></div>
</form>';

include 'inc/page.php';

echo $page;
?>
	