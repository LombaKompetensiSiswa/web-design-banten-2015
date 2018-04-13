<?php
require_once 'inc/init.php';

if(!$_SESSION['uid']) die ('Anda Belum melakukan login');

$q=dbq('SELECT * FROM user WHERE uid="'.dbes($_GET['uid']).'"');
$dt=dbfa($q);
	
	if($_SESSION['uid'] == $dt['uid']){
		$op='
		<td><a href="edit_user.php?uid='.hsc($dt['uid']).'"><img src="img/edit.ico" width="20"></a></td>';
	}
	
	
$data='
	<tr>
		<td>UID</TD>
		<td>:</td>
		<td>'.hsc($dt['uid']).'</td>
		'.$op.'
	</tr>
	<tr>
		<td>USERNAME</td>
		<td>:</td>
		<td>'.hsc($dt['username']).'</td>
	</tr>
	<tr>
		<td>NAMA LENGKAP</td>
		<td>:</td>
		<td>'.hsc($dt['nm_lengkap']).'</td>
	</tr>
	<tr>
		<td>ALAMAT</td>
		<td>:</td>
		<td>'.hsc($dt['alamat']).'</td>
	</tr>
	<tr>
		<td>No Telepon</td>
		<td>:</td>
		<td>'.hsc($dt['no_tlp']).'</td>
	</tr>';
	
if($_SESSION['usergroup'] == 1){
	$add='<div class="admin"><a href="add_user.php"> Tambah Admin</a></div>
	<a href="pembelian.php">Daftar Pembeli</a>';
}
$menuakun='
	<a href="transaksi.php?uid='.hsc($_SESSION['uid']).'"> Transaksi</a>';

$tittle='USER';
$contents='
'.$add.'
<div class="caption"> Akun Saya </div>
'.$menuakun.'
<table>
'.$data.'
</table>';

include 'inc/page.php';

echo $page;

?>