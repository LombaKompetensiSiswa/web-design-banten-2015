<?php
require_once 'inc/init.php';

if(!$_SESSION['uid']) die ('Harap Login terlebih dahulu');

$sql=dbq('SELECT * FROM transaksi WHERE uid="'.dbes($_GET['uid']).'"');
$dt=dbfa($sql);
if(!$dt) die ('Data tidak ada');

dbq('DELETE FROM transaksi WHERE uid="'.dbes($_GET['uid']).'"');

header('Location: index.php');

?>