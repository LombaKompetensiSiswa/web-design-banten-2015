<?php
require_once 'inc/init.php';

if(!$_SESSION['uid']) die ('Harap Login terlebih dahulu');

if($_POST['do'] == 'submit'){
	$uid=dbes($_POST['uid']);
	$name=dbes($_POST['username']);
	$pass=dbes($_POST['password']);
	$group=dbes($_POST['usergroup']);
	
	$errors=array();
	
	if(!(int)$_POST['uid']){
		$errors['uid'] = pem('Harap masukan uid dengan angka');
	}else{
		$sql=dbq('SELECT * FROM user WHERE uid="'.dbes($_POST['uid']).'"');
		$dt=dbfa($sql);
		if($dt) $error['uid']=pem('UID yang Anda masukan sudah ada di dalam sistem, Harap masukan UID yang lain');
	}
	
	if(!$_POST['username']){
		$errors['username'] = pem('Harap masukan Nama');
	}
	
	if(!$_POST['password']){
		$errors['password'] = pem('Harap masukan password');
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
	
	
	if(empty($errors)){
		$q=dbq('INSERT INTO user (uid,username,password,usergroup) VALUES ("'.$uid.'","'.$name.'","'.md5($pass).'","'.$group.'")');
		
		header('Location: user.php');
	}
}

$title='Tambah Pengguna';
$contents='
<table class="form formlogin margin-top">
<form action="" method="post" class="formlogin">
<input type="hidden" name="do" value="submit">
<tr>
	<td>UID</td>
	<td>:</td>
	<td><input type="text" name="uid" value="'.hsc($_POST['uid']).'" size="20">'.$errors['uid'].'</td>
</tr>
<tr>
	<td>USERNAME</td>
	<td>:</td>
	<td><input type="text" name="username" value="'.hsc($_POST['username']).'" size="20">'.$errors['username'].'</td>
</tr>
<tr>
	<td>PASSWORD</td>
	<td>:</td>
	<td><input type="password" name="password" size="20">'.$errors['password'].'</td>
</tr>
<tr>
	<td>USERGROUP</td>
	<td>:</td>
	<td><input type="text" name="usergroup" value="'.hsc($_POST['usergroup']).'" size="10">'.$errors['usergroup'].'</td>
</tr>
<tr>
	<td colspan="3"><input type="submit" value="Simpan"></td>
</tr>
</form>
</table>';

include 'inc/page.php';

echo $page;
?>
	