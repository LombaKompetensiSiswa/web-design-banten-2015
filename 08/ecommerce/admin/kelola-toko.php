<?php session_start();
if(!isset($_SESSION['admin'])){
	?>
    <script type="text/javascript">
	alert("Anda Dilarang Mengakses Halaman ini, Silahkan Login Terlebih Dahulu");
	document.location.href="../index.php"
	</script>
    <?php
}else{
	include("../koneksi.php");
	$q=mysql_query("select * from toko") or die(mysql_error());
	?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>E-Commerce</title>
<link rel="stylesheet" type="text/css" href="../style.css" />
<style type="text/css">
a:link {
	text-decoration: none;
}
a:visited {
	text-decoration: none;
}
a:hover {
	text-decoration: none;
}
a:active {
	text-decoration: none;
}
</style>
</head>

<body bgcolor="#F4F4F4">
<table bgcolor="#3eade0" id="atas">
	<tr>
    	<td><font color="#FFFFFF">Selamat Datang <?php echo $_SESSION['username'];?> Anda Login Sebagai Administrator
        </font></td>
        <td><a href="logout.php" class="link">Logout
        </a></td>
    </tr>
</table>
<table width="868" height="254" border="0" align="center" cellpadding="0" cellspacing="0" id="body2">
  <tr>
    <td width="11" height="34" bgcolor="#FFFFFF">&nbsp;</td>
    <td width="200" align="center" bgcolor="#FFFFFF"><strong>Menu Admin</strong></td>
    <td colspan="2" align="center" bgcolor="#FFFFFF"><strong>Edit Akun</strong></td>
    <td width="13" bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
  <tr>
    <td height="101" bgcolor="#FFFFFF">&nbsp;</td>
    <td valign="top"><table width="200" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td><a href="edit-akun.php" class="box">Edit Akun</a></td>
        </tr>
      <tr>
        <td><a href="kelola-member.php" class="box">Kelola Member</a></td>
      </tr>
      <tr>
        <td><a href="kelola-toko.php" class="box">Kelola Toko</a></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
    </table></td>
    <td width="8" valign="top" bgcolor="#FFFFFF"></td>
    <td width="636" valign="top" bgcolor="#F4F4F4"><table width="635" height="44" border="1" cellpadding="0" cellspacing="0">
      <tr>
        <td width="28">ID</td>
        <td width="126">Nama Toko</td>
        <td width="109">Nama Pemilik</td>
        <td width="93">Email</td>
        <td width="104">Username</td>
        <td width="102">Password</td>
        <td colspan="2">Aksi</td>
        </tr><?php
		while($data=mysql_fetch_array($q)){
			?>
      <tr>
        <td><?php echo $data['idtoko'];?></td>
        <td><?php echo $data['namatoko'];?></td>
        <td><?php echo $data['namapemilik'];?></td>
        <td><?php echo $data['email'];?></td>
        <td><?php echo $data['username'];?></td>
        <td><?php echo $data['password'];?></td>
        <td width="14" align="center">&nbsp;</td>
        <td width="19" align="center">&nbsp;</td>
      </tr><?php
		}
		?>
    </table></td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
  <tr>
    <td height="19" bgcolor="#FFFFFF">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td bgcolor="#F4F4F4">&nbsp;</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td height="40" valign="top" bgcolor="#FFFFFF">Copyright &copy; 2015 </td>
    <td colspan="2" bgcolor="#FFFFFF">&nbsp;</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
</table>
</body>
</html><?php
}
?>