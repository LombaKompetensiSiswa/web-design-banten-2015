<?php
require_once 'inc/init.php';

if($_SESSION['uid']) die ('Anda sudah login');

if($_POST['do'] == 'submit'){
	$uid=dbes($_POST['uid']);
	$name=dbes($_POST['username']);
	$pass=dbes($_POST['password']);
	$group=2;
	$nm=dbes($_POST['nm_lengkap']);
	$al=dbes($_POST['alamat']);
	$no=dbes($_POST['no_tlp']);
	
	$errors=array();
	
	if(!(int)$_POST['uid']){
		$errors['uid'] = pem('Harap masukan uid dengan angka');
	}else{
		$sql=dbq('SELECT * FROM user WHERE uid="'.dbes($_POST['uid']).'"');
		$dt=dbfa($sql);
		if($dt) $errors['uid']=pem('UID yang Anda masukan sudah ada di dalam sistem, Harap masukan UID yang lain');
	}
	
	if(!$_POST['username']){
		$errors['username'] = pem('Harap masukan Nama');
	}
	
	if(!$_POST['password']){
		$errors['password'] = pem('Harap masukan password');
	}
	
	if(!$_POST['nm_lengkap']){
		$errors['nm_lengkap'] = pem('Harap masukan nama lengkap Anda');
	}else{
		if((int)$_POST['nm_lengkap']){
			$errors['nm_lengkap']=pem('Hanya isi nama lengkap anda dengan huruf');
		}
	}
	
	if(!$_POST['alamat']){
		$errors['alamat']=pem('Harap mengisi Alamat Anda');
	}
	
	if(!$_POST['no_tlp']){
		$errors['no_tlp']=pem('Harap isi No Telepon Anda');
	}else{
		if(!(int)$_POST['no_tlp']){
			$errors['no_tlp']=pem('Hanya masukan no telepon dengan Angka');
		}
	}
	
	
	if(empty($errors)){
		$q=dbq('INSERT INTO user (uid,username,password,usergroup,nm_lengkap,alamat,no_tlp) VALUES ("'.$uid.'","'.$name.'","'.md5($pass).'","'.$group.'","'.$nm.'","'.$al.'","'.$no.'")');
		
		header('Location: login1.php');
	}
}

$title='Tambah Pengguna';
$contents='
<form action="" method="post" class="formlogin">
<input type="hidden" name="do" value="submit">
<div>UID</div>
<div><input type="text" name="uid" value="'.hsc($_POST['uid']).'" size="20">'.$errors['uid'].'</div>
<div>USERNAME</div>
<div><input type="text" name="username" value="'.hsc($_POST['username']).'" size="20">'.$errors['username'].'</div>
<div>Nama Lengkap</div>
<div><input type="text" name="nm_lengkap" value="'.hsc($_POST['nm_lengkap']).'" size="20">'.$errors['nm_lengkap'].'</div>
<div>PASSWORD</div>
<div><input type="password" name="password" size="20">'.$errors['password'].'</div>
<div>Alamat</div>
<div><textarea name="alamat">'.hsc($_POST['alamat']).'</textarea>'.$errors['alamat'].'</div>
<div>No.Telepon</div>
<div><input type="text" name="no_tlp" value="'.hsc($_POST['no_tlp']).'" size="20">'.$errors['no_tlp'].'</div>
<div><input type="submit" value="Simpan" class="button"></div>
</form>';

include 'inc/page.php';

echo $page;
?>
	