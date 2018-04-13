<?php
require_once 'inc/init.php';

if($_SESSION['uid']) die ('Anda sudah melakukan Login');

$q=dbq('SELECT * FROM user WHERE uid="'.dbes($_POST['uid']).'"');
$user=mysql_fetch_array($q);

if($_POST['do'] == 'submit'){
	$errors=array();
	
if(md5($_POST['password']) != $user['password']) $errors['password']=pem('Password yang Anda masukan Salah!');
	$_SESSION['uid']=$user['uid'];
	$_SESSION['username']=$user['username'];
	$_SESSION['usergroup']=$user['usergroup'];
	
	if(empty($errors)){
	header('Location: index.php');
	}
}

$title='LOGIN';
$contents='
<form action="" method="post" class="formlogin">
<input type="hidden" name="do" value="submit">
<div>UID</div><div><input type="text" name="uid" size="20"></div>
<div>PASSWORD</div><div><input type="password" name="password" size="20">'.$errors['password'].'</div>
<input type="submit" value="LOGIN">
</form>';

include 'inc/page.php';

echo $page;
?>