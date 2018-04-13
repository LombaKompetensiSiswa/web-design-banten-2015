<?php
require_once 'inc/init.php';

if(!$_SESSION['uid']) die ('Harap Login terlebih dahulu');

$sql=dbq('SELECT * FROM barang WHERE kd_brg="'.dbes($_GET['kd_brg']).'"');
$dt=dbfa($sql);
if(!$dt) die ('Data tidak ada');

dbq('DELETE FROM barang WHERE kd_brg="'.dbes($_GET['kd_brg']).'"');
@unlink('gambar/'.$_GET['kd_brg'].'');

header('Location: index.php');

?>