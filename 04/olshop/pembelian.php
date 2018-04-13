<?php
require_once 'inc/init.php';

if(!$_SESSION['uid']) die ('Anda tidak mempunya Hak');


$q=dbq('SELECT t.*,b.*
		FROM transaksi t
		LEFT JOIN barang b ON (b.kd_brg=t.kd_brg)');
while($dt=dbfa($q)){
	
	if($_SESSION['uid'] == $dt['uid']){
		$op='<td><a href="del_tr.php?uid='.hsc($_GET['uid']).'"> DELETE </a></td>';
	}
	
	$data.='
	<tr>
	<td>'.hsc($dt['uid']).'</td>
	<td>'.hsc($dt['nm_pembeli']).'</td>
	<td>'.hsc($dt['nm_brg']).'</td>
	<td>'.hsc($dt['jml']).'</td>
	<td>'.hsc($dt['jumlah_harga']).'</td>
	<td>'.hsc($dt['ttgl']).'
	'.$op.'
	</tr>';

}
	
if($data){
	$dta='<tr>
		<td>UID</TD>
		<td>Nama Lengkap</td>
		<td>Nama Barang</td>
		<td>Jumlah</td>
		<td>Pengeluaran</td>
		<td>Tanggal</td>
	</tr>'.$data.'';
}else{
	$dta='<div class="errordata"> DATA TIDAK ADA!</a>';
}



$tittle='Transaksi';
$contents='

'.$add.'
<table class="formt" border="1">
'.$dta.'
</table>';

include 'inc/page.php';

echo $page;
?>