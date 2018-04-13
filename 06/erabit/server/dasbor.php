<?php require_once('Connections/koneksi.php'); ?>
<?php
//initialize the session
if (!isset($_SESSION)) {
  session_start();
}

// ** Logout the current user. **
$logoutAction = $_SERVER['PHP_SELF']."?doLogout=true";
if ((isset($_SERVER['QUERY_STRING'])) && ($_SERVER['QUERY_STRING'] != "")){
  $logoutAction .="&". htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_GET['doLogout'])) &&($_GET['doLogout']=="true")){
  //to fully log out a visitor we need to clear the session varialbles
  $_SESSION['MM_Username'] = NULL;
  $_SESSION['MM_UserGroup'] = NULL;
  $_SESSION['PrevUrl'] = NULL;
  unset($_SESSION['MM_Username']);
  unset($_SESSION['MM_UserGroup']);
  unset($_SESSION['PrevUrl']);
	
  $logoutGoTo = "login.php";
}
?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$maxRows_barang = 10;
$pageNum_barang = 0;
if (isset($_GET['pageNum_barang'])) {
  $pageNum_barang = $_GET['pageNum_barang'];
}
$startRow_barang = $pageNum_barang * $maxRows_barang;

mysql_select_db($database_koneksi, $koneksi);
$query_barang = "SELECT * FROM produk";
$query_limit_barang = sprintf("%s LIMIT %d, %d", $query_barang, $startRow_barang, $maxRows_barang);
$barang = mysql_query($query_limit_barang, $koneksi) or die(mysql_error());
$row_barang = mysql_fetch_assoc($barang);

if (isset($_GET['totalRows_barang'])) {
  $totalRows_barang = $_GET['totalRows_barang'];
} else {
  $all_barang = mysql_query($query_barang);
  $totalRows_barang = mysql_num_rows($all_barang);
}
$totalPages_barang = ceil($totalRows_barang/$maxRows_barang)-1;

$colname_session = "-1";
if (isset($_SESSION['MM_Username'])) {
  $colname_session = $_SESSION['MM_Username'];
}
mysql_select_db($database_koneksi, $koneksi);
$query_session = sprintf("SELECT * FROM pengguna WHERE email = %s", GetSQLValueString($colname_session, "text"));
$session = mysql_query($query_session, $koneksi) or die(mysql_error());
$row_session = mysql_fetch_assoc($session);
$totalRows_session = mysql_num_rows($session);
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>e-Commerce Rangkasbitung</title>
<style type="text/css">
</style>
<link href="css/umum.css" rel="stylesheet" type="text/css"><script type="text/javascript" src="js/jquery-1.8.2.min.js"></script>
<link rel="shortcut icon" href="agun.ico" type="image/ico">
<script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
<link href="css/style.css" rel="stylesheet" type="text/css">
<script src="SpryAssets/SpryEffects.js" type="text/javascript"></script>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script type="text/javascript">
$(window).scroll(function(){
	if($(this).scrollTop() > 70) {
		$('#header').addClass('sticky')
		}	else {
			$('#header').removeClass('sticky')
		}
});
function MM_effectAppearFade(targetElement, duration, from, to, toggle)
{
	Spry.Effect.DoFade(targetElement, {duration: duration, from: from, to: to, toggle: toggle});
}
</script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#kirim').click(function(e){
			var isi = $('#pesan').val();
			$.ajax({
				type:'post',
				url:'aksi_kontak.php',
				data : "isi="+isi,
				success : function(){$('#apDiv1').hide(200)}
				})
				return false
			});
		});
</script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#kirim').click(function(e){
			var isi = $('#pesan').val();
			$.ajax({
				type:'post',
				url:'aksi_kontak.php',
				data : "isi="+isi,
				success : function(){$('#apDiv1').fadeOut(200)}
				})
				return false
			});
		});
</script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#cari').keyup(function(e){
			var isi = $('#cari').val();
			$.ajax({
				type:'get',
				url:'aksi_cari.php',
				data : "car="+cari,
				success : function(msg){$('#result').html()}
				})
				return false
			});
		});
</script>
<style type="text/css">
body,td,th {
	font-family: "Segoe UI", "Segoe UI Light", "Segoe UI Symbol";
}
#apDiv1 {
	position:fixed;
	left:50%;
	top:50%;
	width:380px;
	height:420px;
	z-index:1;
	background: black;
	margin-left: -200px;
	margin-top: -200px;
	padding: 10px;
	box-shadow:0 0 10px black;
	border-radius:5px;
	display:none;
}
</style>
</head>

<body>
<div id="apDiv1">
  <h1>Contact Us</h1>
  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td align="center"><form name="form1" method="post" action="">
        <p>
          <label for="textfield2"></label>
          <textarea name="textarea" placeholder="Tuliskan Pesan Anda" id="pesan" cols="35" rows="4"></textarea>
        </p>
        <p>
          <input type="submit" name="button3" id="kirim" value="Kirim">
      </p>
      </form></td>
    </tr>
  </table>
  <p>Other :<br>
  eMail : erabit@commerce.com<br>
  Telp. : (0252)401786 Post Code : 42312</p>
  <a style="align:center;" class="aaa" id="tutup" onClick="MM_effectAppearFade('apDiv1', 200, 100, 0, false)">[ Tutup [x]</a>
</div><div id="header">
  <div class="content">
    <table width="100%" border="0" height="100%" cellspacing="0" cellpadding="0">
      <tr>
        <td align="center"><h3>DASBOR</h3></td>
      </tr>
    </table>
  </div>
</div>
<div id="banner">
<figure>
<img src="banner/1.jpg" width="100%">
<img src="banner/2.jpg" width="100%">
<img src="banner/3.jpg" width="100%">
<img src="banner/4.jpg" width="100%">
<img src="banner/1.jpg" width="100%">
</figure></div>
<div id="konten">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td width="25%" align="center" valign="middle"><div class="kotak" id="k1">
        <p>&nbsp;</p>
        <p><img src="ikon/dollar_currency_sign.png" width="48" height="48"></p>
        <h3>Harga Terbaik</h3>
      </div></td>
      <td width="25%" align="center" valign="middle"><div class="kotak" id="k2">
        <p>&nbsp;</p>
        <p><img src="ikon/calendar.png" width="48" height="48"></p>
        <h3>Tepat Waktu</h3>
      </div></td>
      <td width="25%" align="center" valign="middle"><div class="kotak" id="k3">
        <p>&nbsp;</p>
        <p><img src="ikon/new.png" width="48" height="48"></p>
        <h3>Produk Terbaru</h3>
      </div></td>
      <td width="25%" align="center" valign="middle"><div class="kotak" id="k4">
        <p>&nbsp;</p>
        <p><img src="ikon/cloud_comment.png" width="48" height="48"></p>
        <h3>Komunikasi Terbaik</h3>
      </div></td>
    </tr>
    <tr>
      <td align="center" valign="middle">&nbsp;</td>
      <td align="center" valign="middle">&nbsp;</td>
      <td align="center" valign="middle">&nbsp;</td>
      <td align="center" valign="middle">&nbsp;</td>
    </tr>
  </table>
<div id="rightbar">
    <h1>Terbaru</h1>
    <?php do { ?>
      <div class="produk">
        <table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td height="226" align="center" valign="middle" bgcolor="#FFFFFF"><img height="90%" src="aplod/<?php echo $row_barang['id']; ?>.jpg"></td>
          </tr>
          <tr>
            <td height="21" align="center" bgcolor="#0066FF"><strong class="aaa"><?php echo $row_barang['namabarang']; ?></strong></td>
          </tr>
          <tr>
            <td height="42" align="center" bgcolor="#FFFFFF"><?php echo $row_barang['spesifikasi']; ?><br></td>
          </tr>
          <tr>
            <td height="21" align="center" valign="middle" bgcolor="#CCCCCC"><input type="submit" name="button2" id="button2" value="DETAIL"></td>
          </tr>
        </table>
      </div>
      <?php } while ($row_barang = mysql_fetch_assoc($barang)); ?>
</div>
 <div id="about">
   <h1><img src="ikon/users.png" width="48" height="48" align="texttop"> Tentang Kami</h1>
   <p>Tentang Kami
"Nama Toko Online Anda" berdiri sejak Mei 2015. Kami merupakan badan usaha yang bergerak dalam dunia bisnis untuk menyediakan toko online yang menyediakan barang-barang kebutuhan masyarakat secara umum. Dengan pengalaman yang cukup lama bergelut di dunia online kami siap melayani anda bermodalkan kejujuran sepenuh hati.

Dalam usaha tersebut ( mencapai kepuasan pelanggan) dengan segala upaya kami selalu berusaha menjaga kepercayaan dan pelayanan maksimal secara konstan dan kontinuitas dengan pertimbangan segala bentuk keinginan dan kemauan pelanggan, usaha tersebut memang bukan suatu hal yang mudah, namun dengan acuan keinginan dan kemauan pelanggan yang ada maka kami fokus pada satu hal, yaitu membuat pelanggan kami terpuaskan sehingga pelanggan benar-benar dapat termanjakan dengan fasilitas yang coba kami hadirkan.

Akan tetapi, kami yakin dalam setiap usaha tersebut masih banyak hal-hal yang perlu pembenahan di sana sini, kami harap maklum dan saran juga kritik anda yang akan menjadi bahan bakar utama kami untuk lebih bisa instropeksi diri untuk menjadi lebih baik dan lebih baik lagi.

Terima Kasih atas kepercayaan anda, dan kami akan membawa kepercayaan tersebut sebagai mandat utama misi kami yaitu, "memberikan yang terbaik untuk anda"

Marketing Office:
Jl. M.H. Tamrin KM. 27 Kebon Nanas , Tangerang 15143
Banten
 </p></div>
</div>
 <div id="footer">
   <table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0">
     <tr>
       <td width="48%" align="right"><img src="LKS 2015 Provinsi Banten/Gambar/SocialMedia/1430843288_facebook-128.png" width="10%"><img src="LKS 2015 Provinsi Banten/Gambar/SocialMedia/1430843301_twitter_letter-128.png" width="10%"><img src="LKS 2015 Provinsi Banten/Gambar/SocialMedia/1430843323_youtube-128.png" width="10%"></td>
       <td width="4%" align="left">&nbsp;</td>
       <td width="48%" align="left"> Marketing Office:<br>
Jl. M.H. Tamrin KM. 27 Kebon Nanas , Tangerang  15143<br>
Banten</td>
     </tr>
   </table>
 </div>
<div id="kaki">
  <table width="85%" height="100%" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td align="center" valign="middle">&copy;2015 e_Commerce - Rangkasbitung<br></td>
    </tr>
  </table>
</div>
</body>
</html>
<?php
mysql_free_result($barang);

mysql_free_result($session);
?>
