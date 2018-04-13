<?php
require_once 'inc/init.php';

if(!$_GET['kd_brg']) die ('Tidak ada kode barang');

$sql=dbq('SELECT * FROM barang WHERE kd_brg="'.dbes($_GET['kd_brg']).'"');
$dt=dbfa($sql);
	
		if($_SESSION['usergroup'] == 1){
		$op='<td><a href="del_brg.php?kd_brg='.hsc($dt['kd_brg']).'">DELETE </a>
		<a href="edit_brg.php?kd_brg='.hsc($dt['kd_brg']).'"><img src="img/edit.ico" width="15"></a></td>';
	}
	
	
	$tgl=explode('-',$dt['tgl']);
	$t=$tgl[2].'-'.$tgl[1].'-'.$tgl[0];
	
	$data.='
	<tr>
		<td>Kode Barang</TD>
		<td><img src="gambar/'.$dt['kd_brg'].'" width="100" heigth="100">'.hsc($dt['kd_brg']).'</td>
		'.$op.'
	</tr>
	<tr>
		<td>NAMA BARANG</td>
		<td>'.hsc($dt['nm_brg']).'</td>
	</tr>
	<tr>
		<td>Harga</td>
		<td>Rp.'.hsc($dt['harga']).'</td>
	</tr>
	<tr>
		<td>Jumlah Barang</td>
		<td>'.hsc($dt['jumlah']).'</td>
	</tr>
	<tr>
		<td>deskripsi</td>
		<td>'.nl2br(hsc($dt['deskripsi'])).'</td>
	</tr>
	<tr>
		<td>Kategori</td>
		<td>'.hsc($dt['nm_kategori']).' '.$t.'</td>
	</tr>
	<tr>
		<td><a href="beli.php?kd_brg='.hsc($dt['kd_brg']).'"> BELI </a></td>
	</tr>
	';
	
	

	if($_SESSION['usergroup'] == 1){
		$add='
		<a href="add_brg.php"> TAMBAH DATA </a>';
	}



$tittle='USER';
$contents='
'.$add.'
<table>
'.$data.'
</table>';

include 'inc/page.php';

echo $page;

?>