<?php
require_once 'inc/init.php';

$sql=dbq('SELECT b.*, k.*
		FROM barang b
		LEFT JOIN kategori k on (k.kd_kategori=b.kd_kategori)
		WHERE (kd_brg like "%'.dbes($_GET['search']).'%" or nm_brg like "%'.dbes($_GET['search']).'%")
		ORDER BY tgl DESC');
while($dt=dbfa($sql)){
	
		if($_SESSION['usergroup'] == 1){
		$op='<td><a href="del_brg.php?kd_brg='.hsc($dt['kd_brg']).'">DELETE </a>
		<a href="edit_brg.php?kd_brg='.hsc($dt['kd_brg']).'"><img src="img/edit.ico" width="15"></a></td>';
	}
	
	$tgl=explode('-',$dt['tgl']);
	$t=$tgl[2].'-'.$tgl[1].'-'.$tgl[0];
	
	$data.='
	<tr>
		<td><a href="barang.php?kd_brg='.dbes($dt['kd_brg']).'"><img src="gambar/'.$dt['kd_brg'].'" width="100" heigth="100">'.hsc($dt['kd_brg']).'</a></td>
		'.$op.'
	</tr>
	<tr>
		<td>'.hsc($dt['nm_brg']).'</td>
	</tr>
	<tr>
		<td>Rp.'.hsc($dt['harga']).'</td>
	</tr>
	<tr>
		<td>'.hsc($dt['jumlah']).'</td>
	</tr>
	<tr>
		<td>Kategori '.hsc($dt['nm_kategori']).' Post '.$t.'</td>
	</tr>
	<tr>
		<td><a href="beli.php?kd_brg='.hsc($dt['kd_brg']).'"><img src="img/buy.png" width="80" class="buy"></a></td>
	</tr>
	';
	
	
}

	if($data){
		$dft='<table> '.$data.' </table>';
	}else{
		$dft='<div class="empty"> Data tidak ada </div>';
	}
		

	if($_SESSION['usergroup'] == 1){
		$add='
		<a href="add_brg.php"> TAMBAH DATA </a>';
	}



$tittle='USER';
$contents='
<form action="lb.php" method="get" class="search">
<input type="text" name="search" size="15" value="'.hsc($_GET['search']).'" placeholder="Cari User">
<input type="submit" value="Cari">
</form>
'.$add.'
'.$dft.'
';

include 'inc/page.php';

echo $page;

?>