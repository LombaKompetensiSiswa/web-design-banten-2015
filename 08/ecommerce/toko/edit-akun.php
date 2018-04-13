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
	$id=$_GET['id'];
	$q=mysql_query("select * from toko where idtoko='$id'");
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
<table width="772" border="0" align="center" cellpadding="0" cellspacing="0" id="body2">
  <tr>
    <td width="9" height="34" bgcolor="#FFFFFF">&nbsp;</td>
    <td width="229" align="center"><strong>Menu Admin</strong></td>
    <td width="11">&nbsp;</td>
    <td width="338">&nbsp;</td>
    <td width="13" bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
  <tr>
    <td height="101" bgcolor="#FFFFFF">&nbsp;</td>
    <td valign="top"><table width="200" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td><a href="../member/edit-member.php?id=<?php echo $data['idtoko'];?>" class="box">Edit Akun</a></td>
        </tr>
      <tr>
        <td><a href="input-barang.php" class="box">Input Barang</a></td>
      </tr>
      <tr>
        <td><a href="penjualan.php" class="box">Penjualan</a></td>
      </tr>
      <tr>
        <td><a href="data-barang.php" class="box">Data Barang</a></td>
      </tr>
    </table></td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td align="center" valign="top"><form id="form3" name="form3" method="post" action="proses-edit-akun.php".php">
          <table width="200" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td height="50"><label for="idtoko"></label>
              <input type="hidden" name="idtoko" id="idtoko" value="<?php echo $data['idtoko'];?>" /></td>
            </tr>
            <tr>
              <td height="50"><label for="namatoko"></label>
                <input type="text" name="namatoko" id="namatoko" class="login" placeholder="Nama Toko Anda" value="<?php echo $data['namatoko'];?>"  /></td>
            </tr>
            <tr>
              <td height="47"><label for="namapemilik"></label>
                <input type="text" name="namapemilik" id="namapemilik" class="login" placeholder="Nama lengkap Anda" value="<?php echo $data['namapemilik'];?>"  /></td>
            </tr>
            <tr>
              <td height="89"><label for="alamattoko"></label>
                <textarea name="alamattoko" id="alamattoko" cols="45" rows="5" placeholder="Alamat Toko Anda"><?php echo $data['alamattoko'];?> </textarea></td>
            </tr>
            <tr>
              <td height="90"><label for="alamatpemilik"></label>
                <textarea name="alamatpemilik" id="alamatpemilik" cols="45" rows="5" placeholder="Alamat Anda"><?php echo $data['alamatpemilik'];?></textarea></td>
            </tr>
            <tr>
              <td height="49"><label for="email"></label>
                <input name="email" type="text" class="login" id="email" placeholder="Email Anda" value="<?php echo $data['email'];?>"  /></td>
            </tr>
            <tr>
              <td height="50"><label for="idbarang">
                <input name="username" type="text" class="login" id="username" placeholder="Username" value="<?php echo $data['username'];?>"  />
              </label></td>
            </tr>
            <tr>
              <td height="48"><label for="username">
                <input name="password" type="text" class="login" id="password"  placeholder="Password" value="<?php echo $data['password'];?>" />
              </label></td>
            </tr>
            <tr>
              <td><label for="password"></label></td>
            </tr>
            <tr>
              <td><input type="submit" name="Daftar" id="Daftar" value="Update" /></td>
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