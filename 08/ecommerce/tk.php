<?php
include("koneksi.php");
@$cari=$_POST['cari'];
if(!empty($cari)){
		$q=mysql_query("select b.namabarang,b.harga,b.gambar,k.idkategori,t.idtoko,t.namatoko from barang b, kategori k, toko t where (t.idtoko=b.idtoko) and (k.idkategori=b.idkategori) and namabarang like '%$cari%'") or die(mysql_error());

}else{
	include("koneksi.php");
	$q=mysql_query("select b.namabarang,b.harga,b.gambar,k.idkategori,t.idtoko,t.namatoko from barang b, kategori k, toko t where (t.idtoko=b.idtoko) and (k.idkategori=b.idkategori)") or die(mysql_error());
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
<script src="Scripts/swfobject_modified.js" type="text/javascript"></script>
</head>

<body bgcolor="#F4F4F4">
 <table width="1000" border="0" align="center" cellpadding="0" cellspacing="0" id="body">
  <tr>
    <td width="7" bgcolor="#FFFFFF">&nbsp;</td>
    <td width="251" bgcolor="#FFFFFF">&nbsp;</td>
    <td width="327" bgcolor="#FFFFFF">&nbsp;</td>
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
    <td height="35" colspan="2" id="menu">|<span class="link"> <a href="index.php" class="link">Beranda </a></span>| <a href="kategori.php" class="link">Kategori</a> | <a href="pb.php" class="link">Produk Baru</a> | <a href="tk.php" class="link"> tantang Kami</a> |<a href="keranjang.php" class="link"> Keranjang Belanja</a></td>
    <td width="4" align="right" bgcolor="#3EADE0">&nbsp;</td>
    <td width="400" align="right" bgcolor="#3EADE0"><form id="form1" name="form1" method="post" action="index.php">
      <label for="cari"></label>
      <input type="text" name="cari" id="cari" placeholder="Cari Barang Anda Disini" class="lgcari" />
      <input name="cari2" type="submit" class="btncari" id="cari2" value="Cari" />
    </form></td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td height="35" align="center" bgcolor="#FFFFFF"><strong>Login Member</strong></td>
    <td height="35" colspan="3" align="center" bgcolor="#FFFFFF"><object id="FlashID" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="731" height="35">
      <param name="movie" value="flash/wel.swf" />
      <param name="quality" value="high" />
      <param name="wmode" value="opaque" />
      <param name="swfversion" value="8.0.35.0" />
      <!-- This param tag prompts users with Flash Player 6.0 r65 and higher to download the latest version of Flash Player. Delete it if you don’t want users to see the prompt. -->
      <param name="expressinstall" value="Scripts/expressInstall.swf" />
      <!-- Next object tag is for non-IE browsers. So hide it from IE using IECC. -->
      <!--[if !IE]>-->
      <object type="application/x-shockwave-flash" data="flash/wel.swf" width="731" height="35">
        <!--<![endif]-->
        <param name="quality" value="high" />
        <param name="wmode" value="opaque" />
        <param name="swfversion" value="8.0.35.0" />
        <param name="expressinstall" value="Scripts/expressInstall.swf" />
        <!-- The browser displays the following alternative content for users with Flash Player 6.0 and older. -->
        <div>
          <h4>Content on this page requires a newer version of Adobe Flash Player.</h4>
          <p><a href="http://www.adobe.com/go/getflashplayer"><img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player" /></a></p>
        </div>
        <!--[if !IE]>-->
      </object>
      <!--<![endif]-->
    </object></td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
  <tr>
    <td height="153" bgcolor="#FFFFFF">&nbsp;</td>
    <td valign="top"><table width="249" height="144" border="0" cellpadding="0" cellspacing="0" background="bahan/bg.jpg">
      <tr>
        <td valign="top"><form id="form2" name="form2" method="post" action="member/proses-login.php">
          <table width="251" height="121" border="0" cellpadding="0" cellspacing="0">
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
      </tr>
      <tr>
        <td valign="top" bgcolor="#FFFFFF"><img src="bahan/kategori.jpg" alt="" width="249" height="35" /></td>
      </tr>
      <tr><?php
	  while($data2=mysql_fetch_array($q2)){
		  ?>
        <td valign="top"><a href="kategori.php?idkategori=<?php echo $data2['idkategori'];?>" class="box"><?php echo $data2['kategori'];?></a></td>
      </tr><?php
	  }
	  ?>
      <tr>
      <tr>
        <td valign="top">&nbsp;</td>
      </tr>
    </table></td>
    <td colspan="3" rowspan="2" valign="top"><table width="731" height="153" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="10" bgcolor="#FFFFFF">&nbsp;</td>
        <td valign="top" bgcolor="#FFFFFF"><table width="719" height="527" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td width="201" valign="top"><img src="bahan/q.jpg" width="175" height="145" /></td>
            <td width="518"><p align="center"><strong>Tentang  Kami</strong><br />
              &quot;Nama Toko Online Anda&quot; berdiri  sejak Mei 2015. Kami merupakan badan usaha yang bergerak dalam dunia bisnis  untuk menyediakan toko online yang menyediakan barang-barang kebutuhan  masyarakat secara umum. Dengan pengalaman yang cukup lama bergelut di dunia  online kami siap melayani anda bermodalkan kejujuran sepenuh hati.</p>
              <p>Dalam usaha tersebut ( mencapai kepuasan  pelanggan) dengan segala upaya kami selalu berusaha menjaga kepercayaan dan  pelayanan maksimal secara konstan dan kontinuitas dengan pertimbangan segala  bentuk keinginan dan kemauan pelanggan, usaha tersebut memang bukan suatu hal  yang mudah, namun dengan acuan keinginan dan kemauan pelanggan yang ada maka  kami fokus pada satu hal, yaitu membuat pelanggan kami terpuaskan sehingga pelanggan  benar-benar dapat termanjakan dengan fasilitas yang coba kami hadirkan.</p>
              <p>Akan tetapi, kami yakin dalam setiap usaha  tersebut masih banyak hal-hal yang perlu pembenahan di sana sini, kami harap  maklum dan saran juga kritik anda yang akan menjadi bahan bakar utama kami  untuk lebih bisa instropeksi diri untuk menjadi lebih baik dan lebih baik lagi.</p>
              <p>Terima Kasih atas kepercayaan anda, dan  kami akan membawa kepercayaan tersebut sebagai mandat utama misi kami yaitu,  &ldquo;memberikan yang terbaik untuk anda&rdquo;</p>
              <p>Marketing Office:<br />
                Jl. M.H. Tamrin KM. 27 Kebon Nanas , Tangerang  15143 Banten</p></td>
          </tr>
          </table></td>
      </tr>
    </table></td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
  <tr>
    <td height="35" bgcolor="#FFFFFF">&nbsp;</td>
    <td valign="top"><img src="bahan/fr.png" alt="" width="251" height="35" /></td>
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
<script type="text/javascript">
swfobject.registerObject("FlashID");
</script>
</body>
</html>