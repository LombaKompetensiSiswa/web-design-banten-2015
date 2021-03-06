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
$MM_authorizedUsers = "admin";
$MM_donotCheckaccess = "false";

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
    if (($strUsers == "") && false) { 
      $isValid = true; 
    } 
  } 
  return $isValid; 
}

$MM_restrictGoTo = "404.php";
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

$colname_session = "-1";
if (isset($_SESSION['MM_Username'])) {
  $colname_session = $_SESSION['MM_Username'];
}
mysql_select_db($database_koneksi, $koneksi);
$query_session = sprintf("SELECT * FROM pengguna WHERE email = %s", GetSQLValueString($colname_session, "text"));
$session = mysql_query($query_session, $koneksi) or die(mysql_error());
$row_session = mysql_fetch_assoc($session);
$totalRows_session = mysql_num_rows($session);

mysql_select_db($database_koneksi, $koneksi);
$query_pengguna = "SELECT * FROM pengguna";
$pengguna = mysql_query($query_pengguna, $koneksi) or die(mysql_error());
$row_pengguna = mysql_fetch_assoc($pengguna);
$totalRows_pengguna = mysql_num_rows($pengguna);

$maxRows_produk = 15;
$pageNum_produk = 0;
if (isset($_GET['pageNum_produk'])) {
  $pageNum_produk = $_GET['pageNum_produk'];
}
$startRow_produk = $pageNum_produk * $maxRows_produk;

mysql_select_db($database_koneksi, $koneksi);
$query_produk = "SELECT * FROM produk";
$query_limit_produk = sprintf("%s LIMIT %d, %d", $query_produk, $startRow_produk, $maxRows_produk);
$produk = mysql_query($query_limit_produk, $koneksi) or die(mysql_error());
$row_produk = mysql_fetch_assoc($produk);

if (isset($_GET['totalRows_produk'])) {
  $totalRows_produk = $_GET['totalRows_produk'];
} else {
  $all_produk = mysql_query($query_produk);
  $totalRows_produk = mysql_num_rows($all_produk);
}
$totalPages_produk = ceil($totalRows_produk/$maxRows_produk)-1;

mysql_select_db($database_koneksi, $koneksi);
$query_Recordset1 = "SELECT * FROM kontak";
$Recordset1 = mysql_query($query_Recordset1, $koneksi) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
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
				success : function(){$('#dasbor').load('data.php')}
				})
				return false
			});
		});
</script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#hapus').click(function(e){
			var hapus = <?php echo $row_produk['id']; ?>;
			$.ajax({
				type:'POST',
				url:'hapus_produk.php',
				data : "id="+hapus,
				success : function(msg){$('#result').html()}
				})
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

<link href="SpryAssets/SpryMenuBarVertical.css" rel="stylesheet" type="text/css">
</head>

<body>
<div id="headd">
  <table width="100%" border="0" height="100%" cellspacing="0" cellpadding="0">
    <tr>
      <td align="center"><h1>DASHBOARD</h1></td>
    </tr>
  </table>
</div>
<div id="menud">
  <ul id="MenuBar1" class="MenuBarVertical">
    <li><a href="dasbor.php">DATA</a></li>
    <li><a href="dpengguna.php">Pengguna</a></li>
    <li><a href="dproduk.php">Produk</a></li>
    <li><a href="dkontak.php">Kontak</a></li>
    <li><a href="tambah.php">Tambah Data</a></li>
    <li><a href="/erabit" target="_blank">LIHAT WEBSITE</a></li>
  </ul>
</div>
<div id="dasbor">
  <table width="100%" border="1" cellspacing="0" cellpadding="5">
    <tr>
      <td colspan="4" align="center" bgcolor="#339999"><strong>DATA PRODUK</strong></td>
    </tr>
    <tr>
      <td align="center" bgcolor="#339999"><strong>ID</strong></td>
      <td align="center" bgcolor="#339999"><strong>Nama Pengirim</strong></td>
      <td align="center" bgcolor="#339999"><strong>Isi Pesan</strong><strong></strong></td>
      <td align="center" bgcolor="#339999"><strong>Pilihan</strong></td>
    </tr>
    <tr>
      <td width="9%" align="center" bgcolor="#FFFFFF"><?php echo $row_Recordset1['id']; ?></td>
      <td width="17%" align="center" bgcolor="#FFFFFF"><?php echo $row_Recordset1['pengirim']; ?></td>
      <td align="center" bgcolor="#FFFFFF"><?php echo $row_Recordset1['isi']; ?></td>
      <td width="25%" align="center" bgcolor="#FFFFFF">&nbsp;</td>
    </tr>
    <?php do { ?>
      <?php } while ($row_produk = mysql_fetch_assoc($produk)); ?>
  </table>
</div>
<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
</script>
</body>
</html>
<?php
mysql_free_result($session);

mysql_free_result($pengguna);

mysql_free_result($produk);

mysql_free_result($Recordset1);
?>
