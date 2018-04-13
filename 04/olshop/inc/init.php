<?php

session_start();
error_reporting (E_ALL ^ E_DEPRECATED ^ E_NOTICE ^ E_STRICT);

$con=mysql_connect('localhost','root','') or die ('Tidak dapat terhubung');
$sdb=mysql_select_db('onlineshop',$con);
if(!$sdb) die ('Database tidak ditemukan');

require_once 'inc/functions.php';

?>