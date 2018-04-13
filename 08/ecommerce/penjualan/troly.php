<?php session_start();
if(!isset($_SESSION['member'])){
	?>
    <script type="text/javascript">
	alert("Anda Dilarang Mengakses Halaman ini, Silahkan Login Terlebih Dahulu");
	document.location.href="../index.php"
	</script>
    <?php
}else{
	include("../koneksi.php");
	$idmember=$_SESSION['idmember'];
	$q=mysql_query("select * from member") or die(mysql_error());
	$data=mysql_fetch_array($q);
	$q2=mysql_query("select b.idbarang,b.idkategori,b.namabarang,b.harga,k.idkategori,p.jumlah,p.idpembelian,(p.jumlah*b.harga) as total from pembelian p, barang b, kategori k, where (k.idkategori=b.idkategori) and (p.idmember='$idmember')") or die(mysql_error());

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
    <td width="210" align="center" bgcolor="#FFFFFF"><strong>Menu Admin</strong></td>
    <td width="6" bgcolor="#FFFFFF">&nbsp;</td>
    <td width="526" align="center" bgcolor="#FFFFFF"><strong>Daftar Belanja Anda</strong></td>
    <td width="19" bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
  <tr>
    <td height="101" bgcolor="#FFFFFF">&nbsp;</td>
    <td valign="top" background="../bahan/bg.jpg"><table width="200" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td><a href="../member/edit-member.php?id=<?php echo $data['idmember'];?>" class="box">Edit Akun</a></td>
        </tr>
      <tr>
        <td><a href="../member/troly.php" class="box">Troly</a></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
    </table></td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td valign="top"><img src="../bahan/add_to_shopping_cart.jpg" width="103" height="98" />
      <table width="528" height="55" border="1" cellpadding="0" cellspacing="0">
      <tr>
        <td width="49" align="center">NO</td>
        <td width="160" align="center">Nama Barang</td>
        <td width="115" align="center">Jumlah Barang</td>
        <td width="112" align="center">Harga satuan</td>
        <td width="57" align="center">Jumlah</td>
        <td width="57" align="center">Aksi</td>
        </tr>
      <?php
		$no=1;
		$total=0;
		while($data2=mysql_fetch_array($q2)){
			?>
      <tr>
        <td><?php echo $no;?></td>
        <td><?php echo $data2['namabarang'];?></td>
        <td><?php echo $data2['jumlah'];?></td>
        <td><?php echo $data2['harga'];?></td>
        <td><?php echo $data2['total'];?></td>
        <td>Batal/Hapus</td>
        </tr>
      <?php
		
        $no++;
		$total=$total+$data['total'];
		}
        ?>
      <tr>
        <td colspan="3">TOTAL</td>
        <td colspan="3"><?php echo $total;?></td>
        </tr>
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