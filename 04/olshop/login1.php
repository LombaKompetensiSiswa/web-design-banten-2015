<?php
require_once 'inc/init.php';

if($_SESSION['uid']) die ('Anda sudah melakukan Login');

$q=dbq('SELECT * FROM user WHERE uid="'.dbes($_POST['uid']).'"');
$user=mysql_fetch_array($q);


if(md5($_POST['password']) != $user['password']) die ('Password yang Anda masukan Salah!');
	$_SESSION['uid']=$user['uid'];
	$_SESSION['username']=$user['username'];
	$_SESSION['usergroup']=$user['usergroup'];
	
	header('Location: index.php');
?>