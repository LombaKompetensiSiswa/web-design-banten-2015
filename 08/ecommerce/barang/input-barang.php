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
	$toko=$_SESSION['toko'];
	$q=mysql_query("select idtoko from toko");
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
    	<td><font color="#FFFFFF">Selamat Datang <?php echo $_SESSION['username'];?> Anda Login Sebagai Tuan Toko</font></td>
        <td><a href="../member/logout.php" class="link">Logout
        </a></td>
    </tr>
</table>
<table width="772" height="448" border="0" align="center" cellpadding="0" cellspacing="0" id="body2">
  <tr>
    <td width="9" height="34" bgcolor="#FFFFFF">&nbsp;</td>
    <td width="229" align="center"><strong>Menu Admin</strong></td>
    <td width="11">&nbsp;</td>
    <td width="338">Daftar Barang</td>
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
        <td><a href="../toko/penjualan.php" class="box">Penjualan</a></td>
      </tr>
      <tr>
        <td><a href="../kategori/add-kategori.php" class="box">Tamabah Kategori</a></td>
      </tr>
      <tr>
        <td><a href="../toko/data-barang.php" class="box">Data Barang</a></td>
      </tr>
    </table></td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td align="center" valign="top"><form id="form1" name="form1" method="post" action="proses-input-barang.php" enctype="multipart/form-data">
      <table width="200" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><label for="namabarang"></label>
            <input name="namabarang" type="text" class="login" id="namabarang" placeholder="Nama Barang" /></td>
        </tr>
        <tr>
          <td><label for="gambar"></label>
            <input name="gambar" type="file" class="login" id="gambar" placeholder="Gambar"  /></td>
        </tr>
        <tr>
          <td><label for="harga"></label>
            <input name="harga" type="text" class="login" id="harga" placeholder="Harga Barang"  /></td>
        </tr>
        <tr>
          <td><label for="deskripsi"></label>
            <textarea name="deskripsi" id="deskripsi" cols="45" rows="5" placeholder="Deskripsi Barang" ></textarea></td>
        </tr>
        <tr>
          <td><label for="idtoko"></label>
            <input name="idtoko" type="text" class="login" id="idtoko" value="<?php echo $data['idtoko'];?>" placeholder="id toko" /></td>
        </tr><?php
		  $q3=mysql_query("select * from kategori ") or die (mysql_error());
			  ?>
        <tr>
          <td><label for="idkategori"></label>
            <select name="idkategori" class="login" id="idkategori">              <option value="0">Pilih Kategori</option>
		  <?php
            while($data3=mysql_fetch_array($q3)){

			  echo "<option value=".$data3['idkategori'].">".$data3['kategori']."</option>";
		  
          }
		  ?>
            </select></td>
        </tr>
        <tr>
          <td><label for="stok"></label>
            <input name="stok" type="text" class="login" id="stok"  placeholder="Stok Barang" /></td>
        </tr>
        <tr>
          <td><input type="submit" name="input" id="input" value="Input Barang" /></td>
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