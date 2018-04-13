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
	$id=$_GET['id'];
	$q=mysql_query("select * from admin where idadmin='$id'") or die(mysql_error());
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
    	<td><font color="#FFFFFF">Selamat Datang <?php echo $_SESSION['username'];?> Anda Login Sebagai Administrator
        </font></td>
        <td><a href="logout.php" class="link">Logout
        </a></td>
    </tr>
</table>
<table width="772" border="0" align="center" cellpadding="0" cellspacing="0" id="body2">
  <tr>
    <td width="12" height="34" bgcolor="#FFFFFF">&nbsp;</td>
    <td width="228" align="center" bgcolor="#FFFFFF"><strong>Menu Admin</strong></td>
    <td colspan="2" align="center" bgcolor="#FFFFFF"><strong>Edit Akun</strong></td>
    <td width="15" bgcolor="#FFFFFF">&nbsp;</td>
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
    <td width="10" valign="top" bgcolor="#FFFFFF"></td>
    <td width="507" align="center" bgcolor="#F4F4F4"><form id="form1" name="form1" method="post" action="proses-add-akun.php">
      <table width="200" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td height="47"><label for="idadmin"></label>
            <input name="idadmin" type="hidden" class="login" id="idadmin" placeholder="idadmin" /></td>
          </tr>
        <tr>
          <td height="48"><label for="nama"></label>
            <input name="nama" type="text" class="login" id="nama" placeholder="Nama Lengkap" /></td>
        </tr>
        <tr>
          <td height="48"><label for="email"></label>
            <input name="email" type="text" class="login" id="email" placeholder="Email" /></td>
        </tr>
        <tr>
          <td height="46"><label for="username"></label>
            <input name="username" type="text" class="login" id="username" placeholder="Username"/></td>
        </tr>
        <tr>
          <td height="48"><label for="password"></label>
            <input name="password" type="text" class="login" id="password" placeholder="password"  /></td>
        </tr>
        <tr>
          <td><input type="submit" name="update" id="update" value="Input" /></td>
        </tr>
      </table>
    </form></td>
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