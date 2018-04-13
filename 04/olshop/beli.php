<?php
require_once 'inc/init.php';

if(!$_SESSION['uid']){
	header('Location: register_pelanggan.php');
}
if(!$_GET['kd_brg']) die ('Data tidak ada');

$tet=dbq('SELECT * FROM barang');
$tot=dbfa($tet);

if(isset($_POST['submit'])){
	$uid=dbes($_SESSION['uid']);
	$nama=dbes($_GET['kd_brg']);
	$pem=dbes($_POST['nm_pembeli']);
	$email=dbes($_POST['email_pembeli']);
	$penerima=dbes($_POST['nm_penerima']);
	$alamat=dbes($_POST['alamat_penerima']);
	$bank=dbes($_POST['bank']);
	$no=dbes($_POST['no_rek']);
	$beli=dbes($_POST['beli']);
	$jml=$tot['harga'];
	
	$errors=array();
	
	$hsl=$jml*$beli;
	
	if(!$_POST['nm_pembeli']){
		$errors['nm_pembeli']=pem('Harap isi nama Pembeli');
	}else{
		if((int)$_POST['nm_pembeli']){
			$errors['nm_pembeli']=pem('Harap isi nama pembeli hanya dengan Huruf');
		}
	}
	if(!$_POST['email_pembeli']){
		$errors['email_pembeli']=pem('Harap masukan email');
	}
	if(!$_POST['nm_penerima']){
		$errors['nm_penerima']=pem('Harap isi nama Pembeli');
	}else{
		if((int)$_POST['nm_penerima']){
			$errors['nm_penerima']=pem('Harap isi nama pembeli hanya dengan Huruf');
		}
	}
	if(!$_POST['bank']){
		$errors['bank']=pem('Harap masukan email');
	}
	if(!(int)$_POST['no_rek']){
		$errors['no_rek']=pem('Harap masukan no Rekening hanya dengan Angka');
	}
	if(!(int)$_POST['beli']){
		$errors['beli']=pem('Harap isi jumlah barang yang ingin di beli');
	}
	
if(empty($errors)){
	dbq('INSERT INTO transaksi (uid,kd_brg,nm_pembeli,email_pembeli,nm_penerima,alamat_penerima,bank,no_rek,jml,jumlah_harga,ttgl) VALUES ("'.$uid.'","'.$nama.'","'.$pem.'","'.$email.'","'.$penerima.'","'.$alamat.'","'.$bank.'","'.$no.'","'.$beli.'","'.$hsl.'",now())');
	}
}

$sql=dbq('SELECT * FROM barang WHERE kd_brg="'.dbes($_GET['kd_brg']).'"');
$dt=dbfa($sql);
if(!$dt) die ('Kode tidak ada');

$jm=dbes($dt['jumlah']);
if(isset($_POST['submit'])){
	
	$jms=$jm-$beli;
	
	
	$q=dbq('update barang set jumlah="'.dbes($jms).'" where kd_brg="'.dbes($_GET['kd_brg']).'"');
	header('Location: barang.php?kd_brg='.dbes($_GET['kd_brg']).'');
	
}

$title='pembelian';
$contents='
<form action="" method="post" class="form">
<div><img src="gambar/'.$dt['kd_brg'].'" width="100" heigth="100"></div>
<div>'.hsc($dt['nm_brg']).'</div>
<div>Rp. '.hsc($dt['harga']).'</div>
<div>Nama Pembeli</div>
<div><input type="text" name="nm_pembeli" value="'.hsc($_POST['nm_pembeli']).'"></div>'.$errors['nm_pembeli'].'
<div>Email Pembeli</div>
<div><input type="text" name="email_pembeli" value="'.hsc($_POST['email_pembeli']).'"></div>'.$errors['email_pembeli'].'
<div>Nama Penerima</div>
<div><input type="text" name="nm_penerima" value="'.hsc($_POST['nm_penerima']).'"</div>'.$errors['nm_penermima'].'
<div>Alamat Penerima</div>
<div><textarea name="alamat_penerima">'.hsc($_POST['alamat_penerima']).'</textarea></div>
<div>BANK</div>
<div><select name="bank">
	<option value="BNI">BNI</option>
	<option value="BCA">BCA</option>
	<option value="Mandiri">Mandiri</div>
	</select></div>
<div>No.Rekening</div>
<div><input type="text" name="no_rek"></div>
<div>Jumlah beli</div>
<div><input type="text" name="beli"></div>
<div><input type="submit" name="submit" value="Beli" class="button"></div>
</div>
</form>';

include 'inc/page.php';

echo $page;
?>