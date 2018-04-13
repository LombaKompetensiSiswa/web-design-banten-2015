<?php
require_once 'inc/init.php';

if(!$_SESSION['uid']) die ('Harap Login terlebih dahulu');

$sql=dbq('SELECT * FROM user WHERE uid="'.dbes($_GET['uid']).'"');
$dt=dbfa($sql);

if(!$_POST['do'] == 'update'){
	$_POST['uid'] = $dt['uid'];
	$_POST['username'] = $dt['username'];
	$_POST['usergroup'] = $dt['usergroup'];
}
if($_POST['do'] == 'update'){
	$uid=dbes($_POST['uid']);
	$name=dbes($_POST['username']);
	$pass=dbes($_POST['password']);
	$group=dbes($_POST['usergroup']);
	
	$errors=array();
	
	if($_POST['uid'] != $dt['uid']){
		if(!$_POST['uid']){
		$errors['uid'] = pem('Harap masukan uid');
	}else{
		$sqql=dbq('SELECT * FROM user WHERE uid="'.dbes($_POST['uid']).'"');
		$dta=dbfa($sqql);
		if($dta) $error['uid']=pem('UID yang Anda masukan sudah ada di dalam sistem, Harap masukan UID yang lain');
		}
	}
	
	if(!$_POST['username']){
		$errors['username'] = pem('Harap masukan Nama');
	}
	
	if(!$_POST['usergroup']){
		$errors['usergroup'] = pem('Harap masukan usergroup');
	}else{
		if(!(int)$_POST['usergroup']){
			$errors['usergroup']=pem('Usergroup tidak valid, harap masukan Angka');
		}else{
			if($_POST['usergroup'] != 1){
				$errors['usergroup']=pem('Kode usergroup untuk Admin 1');
			}
		}
	}
	
	if($_POST['password']){
		$pass=md5($_POST['password']);
	}else{
		$pass=$dt['password'];
	}
	
	if(empty($errors)){
		$q=dbq('UPDATE user SET uid="'.$uid.'", username="'.$name.'", password="'.$pass.'", usergroup="'.$group.'" WHERE uid="'.dbes($_GET['uid']).'"');
		
		header('Location: user.php');
	}
}

$title='Edit Pengguna';
$contents='
<form action="" method="post">
<input type="hidden" name="do" value="update">
UID<input type="text" name="uid" value="'.hsc($_POST['uid']).'" size="20">'.$errors['uid'].'
USERNAME<input type="text" name="username" value="'.hsc($_POST['username']).'" size="20">'.$errors['username'].'
PASSWORD<input type="password" name="password" size="20">
USERGROUP<input type="text" name="usergroup" value="'.hsc($_POST['usergroup']).'" size="10">'.$errors['usergroup'].'
<input type="submit" value="Simpan">
</form>';

include 'inc/page.php';

echo $page;
?>