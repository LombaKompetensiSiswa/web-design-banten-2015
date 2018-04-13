<?php

require_once 'inc/init.php';

$sql=dbq('SELECT * FROM kategori WHERE (nm_kategori LIKE "%'.hsc($_GET['search']).'%") ');
while($dt=dbfa($sql)){
	
		if($_SESSION['usergroup'] == 1){
		$op='<td><a href="del_brg.php?kd_brg='.hsc($dt['kd_brg']).'">DELETE </a>
		<a href="edit_user.php?uid='.hsc($dt['uid']).'"><img src="img/edit.ico" width="15"></a></td>';
	}
	
	$tgl=explode('-',$dt['tgl']);
	$t=$tgl[2].'-'.$tgl[1].'-'.$tgl[0];
	
	$data.='
	<tr>
	<td>'.hsc($dt['nm_kategori']).'</td>
	'.$op.' 
	</tr>';
	
}

	if($data){
		$dft='<table class="formlogin" border="1""><tr class="tr">
		<td>Nama Kategori</td>
		<td>Option</td>
	</tr> '.$data.'</table>';
	}else{
		$dft='<div class="empty"> Data tidak ada </div>';
	}
		

	if($_SESSION['usergroup'] == 1){
		$add='
		<a href="add_brg.php"> TAMBAH DATA </a>';
	}


$search='<form action="kategori.php" method="get" class="search">
<input type="text" name="search" size="15" value="'.hsc($_GET['search']).'" placeholder="Cari Kategori">
<input type="submit" value="Cari">
</form>';
$tittle='USER';
$contents='
'.$add.'
'.$dft.'
';


include 'inc/page.php';

echo $page;

?>