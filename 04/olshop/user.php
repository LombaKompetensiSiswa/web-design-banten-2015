<?php
require_once 'inc/init.php';

if($_SESSION['usergroup'] != 1) die ('Anda tidak mempunya Hak');

$q=dbq('SELECT * FROM user WHERE ( username LIKE "%'.dbes($_GET['search']).'%")');
while($dt=dbfa($q)){
	
	if($_SESSION['usergroup'] == 1){
		$op='<td><a href="del_user.php?uid='.hsc($dt['uid']).'"><img src="img/delete_user.png" width="20> </a>
		<a href="edit_user.php?uid='.hsc($dt['uid']).'"><img src="img/edit.ico" width="20"></a></td>';
	}

	
	
	
	$data.='
	<tr>
		<td>UID</TD>
		<td>'.hsc($dt['uid']).'</td>
		'.$op.'
	</tr>
	<tr>
		<td>USERNAME</td>
		<td>'.hsc($dt['username']).'</td>
	</tr>
	<tr>
		<td>USERGROUP</td>
		<td>'.hsc($dt['usergroup']).'</td>
	</tr>';
	
}

	if($_SESSION['usergroup'] == 1){
		$add='
		<a href="add_user.php"> TAMBAH DATA </a>';
	}



$tittle='USER';
$contents='

<form action="user.php" method="get">
<input type="text" name="search" size="15" value="'.hsc($_GET['search']).'" placeholder="Cari User">
<input type="submit" value="Cari">
</form>
'.$add.'
<table>
'.$data.'
</table>';

include 'inc/page.php';

echo $page;

?>