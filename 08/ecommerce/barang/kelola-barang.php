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
<table width="772" border="0" align="center" cellpadding="0" cellspacing="0" id="body2">
  <tr>
    <td width="11" height="34" bgcolor="#FFFFFF">&nbsp;</td>
    <td width="233" align="center" bgcolor="#FFFFFF"><strong>Menu Admin</strong></td>
    <td width="6" bgcolor="#FFFFFF">&nbsp;</td>
    <td width="503" align="center" bgcolor="#FFFFFF"><strong>Daftar Barang</strong></td>
    <td width="19" bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
  <tr>
    <td height="101" bgcolor="#FFFFFF">&nbsp;</td>
    <td valign="top"><table width="200" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td><a href="../toko/edit-akun.php?id=<?php echo $data['idtoko'];?>" class="box">Edit Akun</a></td>
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
    <td valign="top"><?php
    $q2=mysql_query("select * from barang") or die (mysql_error());
	?><table width="492" height="54" border="1" cellpadding="0" cellspacing="0">
      <tr>
        <td width="22" align="center">ID</td>
        <td width="191" align="center">Nama Barang</td>
        <td width="75" align="center">Harga</td>
        <td width="75" align="center">stok</td>
        <td colspan="2" align="center">Aksi</td>
        </tr><?php
		while($data2=mysql_fetch_array($q2)){
			?>
      <tr>
        <td><?php echo $data2['idbarang'];?></td>
        <td><?php echo $data2['namabarang'];?></td>
        <td><?php echo $data2['harga'];?></td>
        <td><?php echo $data2['stok'];?></td>
        <td width="75" align="center"><a href="edit-barang.php?id=<?php echo $data2['idbarang'];?>">Edit</a></td>
        <td width="79" align="center"><a href="hapus-barang.php?id=<?php echo $data2['idbarang'];?>" onclick="return confirm ('Apakah Anda Yakin ?')">Hapus</a></td>
      </tr><?php
		}
		?>
    </table></td>
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