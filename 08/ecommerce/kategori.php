<?php
include("koneksi.php");
@$cari=$_POST['cari'];
if(!empty($cari)){
        $q=mysql_query("select b.gambar,b.idbarang,b.harga,b.namabarang,k.idkategori,k.kategori from kategori k, barang b where (k.idbarang=b.idbarang)and(k.idkategori='$idkategori')") or die(mysql_error());   
}else{
	include("koneksi.php");
	@$idkategori=$_GET['idkategori'];
    $q=mysql_query("select b.gambar,b.idbarang,b.harga,b.namabarang,k.idkategori,k.kategori from kategori k, barang b where (k.idkategori=b.idkategori)and(k.idkategori='$idkategori')") or die(mysql_error());
	$q2=mysql_query("Select * from Kategori");

        }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>E-Commerce</title>
<link rel="stylesheet" type="text/css" href="style.css" />
<style type="text/css">
a:link {
	text-decoration: none;
	color: #333;
}
a:visited {
	text-decoration: none;
	color: #333;
}
a:hover {
	text-decoration: underline;
	color: #000;
}
a:active {
	text-decoration: none;
	color: #000;
}
</style>
</head>

<body bgcolor="#F4F4F4">
 <table width="1000" border="0" align="center" cellpadding="0" cellspacing="0" id="body">
  <tr>
    <td width="7" bgcolor="#FFFFFF">&nbsp;</td>
    <td width="251" bgcolor="#FFFFFF">&nbsp;</td>
    <td width="303" bgcolor="#FFFFFF">&nbsp;</td>
    <td colspan="2" align="right" bgcolor="#FFFFFF" ><?php date_default_timezone_set("Asia/jakarta");
	('d-m-y');
		?></td>
    <td width="11" bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
  <tr>
    <td height="110" bgcolor="#FFFFFF">&nbsp;</td>
    <td height="110" colspan="2" valign="top" bgcolor="#FFFFFF"><img src="bahan/logo.jpg" width="454" height="110" /></td>
    <td height="110" colspan="2" bgcolor="#FFFFFF"><a href="member/add-member.php">Register Member</a> | <a href="toko/add-toko.php">Register Toko</a> | <a href="toko/login-toko.php">Login Ke Toko Anda</a> |</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td height="35" colspan="2" id="menu">|<span class="link"> <a href="index.php" class="link">Beranda </a></span>| <a href="kategori.php" class="link">Kategori</a> | <a href="pb.php" class="link">Produk Baru</a> |<a href="pu.php" class="link"> Produk Unggulan</a> |<a href="tk.php" class="link"> tantang Kami</a> |</td>
    <td width="28" align="right" bgcolor="#3EADE0">&nbsp;</td>
    <td width="400" align="right" bgcolor="#3EADE0"><form id="form1" name="form1" method="post" action="">
      <label for="cari"></label>
      <input type="text" name="cari" id="cari" placeholder="Cari Barang Anda Disini" class="lgcari" />
      <input name="cari2" type="submit" class="btncari" id="cari2" value="Cari" />
    </form></td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td height="35" align="center" bgcolor="#FFFFFF"><strong>Login Member</strong></td>
    <td height="35" colspan="3" align="center" bgcolor="#FFFFFF"><strong>Produk Kami Berdasarkan Kategori</strong></td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
  <tr>
    <td height="153" bgcolor="#FFFFFF">&nbsp;</td>
    <td valign="top"><form id="form2" name="form2" method="post" action="member/proses-login.php">
      <table width="251" height="121" border="0" cellpadding="0" cellspacing="0" background="bahan/bg.jpg">
        <tr>
          <td height="49" align="center"><label for="username"></label>
            <input name="username" type="text" class="login" id="username" placeholder="User Name" /></td>
        </tr>
        <tr>
          <td height="48" align="center"><label for="password"></label>
            <input name="password" type="password" class="login" id="password" placeholder="Pssword" /></td>
        </tr>
        <tr>
          <td align="center"><input type="submit" name="login" id="login" value="Login" /></td>
          </tr>
      </table>
    </form></td>
    <td colspan="3" valign="top"><table width="731" height="153" border="0" cellpadding="0" cellspacing="0">
      <tr><?php
	  while($data2=mysql_fetch_array($q2)){
		  ?>
        <td colspan="2" bgcolor="#FFFFFF"><a href="kategori.php?idkategori=<?php echo $data2['idkategori'];?>">&rarr; <?php echo $data2['kategori'];?></a></td>
        </tr><?php
	  }
	  ?>
      <tr>
        <td width="10" bgcolor="#FFFFFF">&nbsp;</td>
        <td valign="top">
          <table width="400" border="0" cellspacing="8" cellpadding="8">
            <tr>
              <?php
		  $i=1;
		  while($data=mysql_fetch_array($q)){
			  ?>
              <td><a href="penjualan/detail-penjualan.php?id=<?php echo $data['idbarang']."& idtoko=".$data['idtoko'];?>"><img src="<?php echo $data['gambar'];?>" alt="gbr" width="200px" height="200px" /></a><br />
                <?php echo $data['namabarang'];?>||<?php echo $data['harga'];?></td>
              <?php
		  if($i % 3==0){
			  echo "</tr><tr>";
		  }
		  $i++;
		  }
		  ?>
            </tr>
          </table></td>
        </tr>
    </table></td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td height="60" colspan="4" valign="top" bgcolor="#239E83"><font color="#FFFFFF">|Copyright &copy; 2015 privacy policy</font></td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td colspan="4" align="center" bgcolor="#FFFFFF">&nbsp;</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
</table>
</body>
</html>