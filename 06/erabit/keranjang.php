<?php require_once('Connections/koneksi.php'); ?>
<?php require_once('Connections/koneksi.php'); ?>
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
if (!isset($_SESSION)) {
  session_start();
}
$MM_authorizedUsers = "";
$MM_donotCheckaccess = "true";

// *** Restrict Access To Page: Grant or deny access to this page
function isAuthorized($strUsers, $strGroups, $UserName, $UserGroup) { 
  // For security, start by assuming the visitor is NOT authorized. 
  $isValid = False; 

  // When a visitor has logged into this site, the Session variable MM_Username set equal to their username. 
  // Therefore, we know that a user is NOT logged in if that Session variable is blank. 
  if (!empty($UserName)) { 
    // Besides being logged in, you may restrict access to only certain users based on an ID established when they login. 
    // Parse the strings into arrays. 
    $arrUsers = Explode(",", $strUsers); 
    $arrGroups = Explode(",", $strGroups); 
    if (in_array($UserName, $arrUsers)) { 
      $isValid = true; 
    } 
    // Or, you may restrict access to only certain users based on their username. 
    if (in_array($UserGroup, $arrGroups)) { 
      $isValid = true; 
    } 
    if (($strUsers == "") && true) { 
      $isValid = true; 
    } 
  } 
  return $isValid; 
}

$MM_restrictGoTo = "login.php";
if (!((isset($_SESSION['MM_Username'])) && (isAuthorized("",$MM_authorizedUsers, $_SESSION['MM_Username'], $_SESSION['MM_UserGroup'])))) {   
  $MM_qsChar = "?";
  $MM_referrer = $_SERVER['PHP_SELF'];
  if (strpos($MM_restrictGoTo, "?")) $MM_qsChar = "&";
  if (isset($_SERVER['QUERY_STRING']) && strlen($_SERVER['QUERY_STRING']) > 0) 
  $MM_referrer .= "?" . $_SERVER['QUERY_STRING'];
  $MM_restrictGoTo = $MM_restrictGoTo. $MM_qsChar . "accesscheck=" . urlencode($MM_referrer);
  header("Location: ". $MM_restrictGoTo); 
  exit;
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

mysql_select_db($database_koneksi, $koneksi);
$query_Recordset1 = "SELECT * FROM cart";
$Recordset1 = mysql_query($query_Recordset1, $koneksi) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

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

$maxRows_barang = 8;
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

$colname_cartsesi = "-1";
if (isset($_SESSION['MM_Username'])) {
  $colname_cartsesi = $_SESSION['MM_Username'];
}
mysql_select_db($database_koneksi, $koneksi);
$query_cartsesi = sprintf("SELECT * FROM cart WHERE pembeli = %s", GetSQLValueString($colname_cartsesi, "text"));
$cartsesi = mysql_query($query_cartsesi, $koneksi) or die(mysql_error());
$row_cartsesi = mysql_fetch_assoc($cartsesi);
$totalRows_cartsesi = mysql_num_rows($cartsesi);
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
<script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<meta name="viewport" content="width:device-width, initial-scale=1.0">
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
				success : function(){$('#apDiv1').fadeOut(200)}
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
			var cari = $('#cari').val();
			$.ajax({
				type:'get',
				url:'aksi_cari.php',
				data : "cari="+cari,
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


<link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css">
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
</div>
<div id="logo">
  <table width="85%" height="100%" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td width="27%" align="center"><img src="logo.png" height="50"></td>
      <td width="73%" align="right"><a href="/erabit">Beranda</a> | <a href="sitemap.php">Site Map</a> |
        <?php if ($totalRows_session > 0) { // Show if recordset not empty ?>
          <a id="kontak" onClick="MM_effectAppearFade('apDiv1', 200, 0, 100, true)">Contact Us</a> |
          <?php } // Show if recordset not empty ?>
        <?php if ($totalRows_session == 0) { // Show if recordset empty ?>
  <span class="auth">Hai Guest! <a href="login.php">Login</a> atau <a href="daftar.php">Mendaftar</a></span>
  <?php } // Show if recordset empty ?>
   <span class="auth">
   <?php if ($totalRows_session > 0) { // Show if recordset not empty ?>
     Hai <?php echo $row_session['namadepan']; ?> - <a href="<?php echo $logoutAction ?>">Logout</a>
  <?php } // Show if recordset not empty ?>
   </span></td>
    </tr>
  </table>
</div>
<div id="header">
  <div class="content">
    <ul id="MenuBar1" class="MenuBarHorizontal">
      <li><a class="MenuBarItemSubmenu">Kategori</a>
        <ul>
          <li><a href="list.php?kategori=pakaian">Pakaian</a></li>
          <li><a href="list.php?kategori=Camera & Video">Camera</a></li>
          <li><a href="list.php?kategori=Perlengkapan Bayi">Bayi</a></li>
          <li><a href="list.php?kategori=Peralatan Komputer">Komputer</a></li>
        </ul>
      </li>
      <li><a href="baru.php">Produk Baru</a></li>
      <li><a href="unggulan.php">Produk Unggulan</a></li>
      <li><a href="keranjang.php">Keranjang Belanja</a></li>
      <li><a href="tentang.php">Tentang Kami</a></li>
      <?php if ($row_session['level'] == 'admin') { // Show if recordset not empty ?>
      <li><a href="dasbor.php" target="_blank">Panel Admin</a></li>
      <?php } // Show if recordset not empty ?>
    </ul>
    <div id="cari">
      <form action="hasil.php" method="get" name="formcari" id="formcari">
        <label for="textfield"></label>
        <input type="text" placeholder="Ketikan Kata Kunci" name="cari" id="textfield">
        <input type="submit" name="button" id="button" value="Cari">
      </form>
      <div id="result"></div>
    </div>
  </div>
  <div class="content"> </div>
  <div class="content"> </div>
</div>
<div id="konten">
  <h1>KERANJANG BELANJA</h1>
  <table width="100%" border="0" cellspacing="0" cellpadding="5">
    <tr>
      <td width="47%">Nama Pembeli</td>
      <td width="2%">:</td>
      <td width="51%"><?php echo $row_session['namadepan']; ?> <?php echo $row_session['namabelakang']; ?></td>
    </tr>
    <tr>
      <td>Jenis Kelamin</td>
      <td>:</td>
      <td><?php echo $row_session['jeniskelamin']; ?></td>
    </tr>
    <tr>
      <td>Lahir</td>
      <td>:</td>
      <td><?php echo $row_session['tanggal']; ?> <?php echo $row_session['bulan']; ?> <?php echo $row_session['tahun']; ?></td>
    </tr>
    <tr>
      <td>Alamat</td>
      <td>:</td>
      <td><?php echo $row_session['alamat']; ?></td>
    </tr>
    <tr>
      <td colspan="3" align="center"><a href="hapus_user.php?id=<?php echo $row_pengguna['id']; ?>">
        <a href="edit.php"><input name="hapus" type="button" class="hijau" id="hapus2" value="Edit Profil Saya">
      </a></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <?php if ($totalRows_cartsesi > 0) { // Show if recordset not empty ?>
    <table width="100%" border="1" cellspacing="0" cellpadding="5">
      <tr>
        <td>Nama Barang</td>
        <td>Banyak</td>
        <td>Harga</td>
        <td>&nbsp;</td>
      </tr>
      <?php do { ?>
        <tr>
          <td><?php echo $row_cartsesi['namabarang']; ?></td>
          <td><?php echo $row_cartsesi['banyak']; ?></td>
          <td><?php echo $row_cartsesi['harga']; ?></td>
          <td><a href="hapus_cart.php?id=<?php echo $row_cartsesi['id']; ?>">Hapus</a></td>
        </tr>
        <?php } while ($row_cartsesi = mysql_fetch_assoc($cartsesi)); ?>
      <tr>
        <td colspan="4" align="center"><a href="hapus_user.php?id=<?php echo $row_pengguna['id']; ?>">
          <input onClick="return confirm('Informasi user akan hilang! Lanjutkan')" name="button2" type="button" class="hijau" id="hapus" value="Lanjutkan Pembayaran">
        </a></td>
      </tr>
    </table>
    <?php } // Show if recordset not empty ?>
  <?php if ($totalRows_cartsesi == 0) { // Show if recordset empty ?>
  <table width="100%" border="1" cellspacing="0" cellpadding="5">
    <tr>
      <td colspan="3" align="center">Anda tidak belanja apapun</td>
      </tr>
  </table>
  <?php } // Show if recordset empty ?>
<p>&nbsp;</p>
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
<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"SpryAssets/SpryMenuBarDownHover.gif", imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
</script>
</body>
</html>
<?php
mysql_free_result($Recordset1);

mysql_free_result($barang);

mysql_free_result($session);

mysql_free_result($cartsesi);
?>
