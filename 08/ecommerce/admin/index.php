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
	$q=mysql_query("select * from admin") or die(mysql_error());
	$data=mysql_fetch_array($q);

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
    	<td>Selamat Datang <?php echo $_SESSION['username'];?> Anda Login Sebagai Administrator
        </td>
        <td><a href="logout.php" class="link">Logout
        </a></td>
    </tr>
</table>
<table width="772" border="0" align="center" cellpadding="0" cellspacing="0" id="body2">
  <tr>
    <td width="11" height="34" bgcolor="#FFFFFF">&nbsp;</td>
    <td width="239" align="center" bgcolor="#FFFFFF"><strong>Menu Admin</strong></td>
    <td width="9" bgcolor="#FFFFFF">&nbsp;</td>
    <td width="494" bgcolor="#FFFFFF">&nbsp;</td>
    <td width="19" bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
  <tr>
    <td height="101" bgcolor="#FFFFFF">&nbsp;</td>
    <td valign="top"><table width="200" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td><a href="edit-akun.php?id=<?php echo $data['idadmin'];?>" class="box">Edit Akun</a></td>
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
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td>&nbsp;</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
  <tr>
    <td height="19" bgcolor="#FFFFFF">&nbsp;</td>
    <td>&nbsp;</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td>&nbsp;</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td height="40" colspan="2" valign="top" bgcolor="#FFFFFF">Copyright &copy; 2015 privacy policy</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
</table>
</body>
</html><?php
}
?>