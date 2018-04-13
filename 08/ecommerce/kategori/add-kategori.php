<?php session_start();
if(!isset($_SESSION['toko'])){
	?>
    <script type="text/javascript">
	alert("Anda Dilarang Mengakses Halaman ini, Silahkan Login Terlebih Dahulu");
	document.location.href="../index.php"
	</script>
    <?php
}else{
	include("../koneksi.php");
	$q=mysql_query("select * from toko");
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
    	<td><font color="#FFFFFF">Selamat Datang <?php echo $_SESSION['username'];?> Anda Login Sebagai Member</font></td>
        <td><a href="../member/logout.php" class="link">Logout
        </a></td>
    </tr>
</table>
<table width="600" border="0" align="center" cellpadding="0" cellspacing="0" id="body2">
  <tr>
    <td width="9" height="34" bgcolor="#FFFFFF">&nbsp;</td>
    <td width="229" align="center"><strong>Menu Admin</strong></td>
    <td width="11">&nbsp;</td>
    <td width="338" align="center">Tambah Kategori</td>
    <td width="13" bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
  <tr>
    <td height="101" bgcolor="#FFFFFF">&nbsp;</td>
    <td valign="top"><table width="200" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td><a href="../toko/edit-akun.php"?id=<?php echo $data['idtoko'];?>" class="box">Edit Akun</a></td>
        </tr>
      <tr>
        <td><a href="../toko/input-barang.php" class="box">Input Barang</a></td>
      </tr>
      <tr>
        <td><a href="../toko/penjualan.php" class="box">Penjualan</a></td>
      </tr>
      <tr>
        <td><a href="add-kategori.php" class="box">Tamabah Kategori</a></td>
      </tr>
      <tr>
        <td><a href="../toko/data-barang.php" class="box">Data Barang</a></td>
      </tr>
    </table></td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td align="center" valign="top"><form id="form1" name="form1" method="post" action="proses-add-kategori.php">
      <table width="200" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><label for="kategori"></label>
            <input name="kategori" type="text" class="login" id="kategori" placeholder="Kategori"/></td>
        </tr>
        <tr>
          <td><input type="submit" name="input" id="input" value="Input Kategori" /></td>
        </tr>
      </table>
    </form></td>
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