<?php require_once('Connections/koneksi.php'); ?>
<?php require_once('Connections/koneksi.php'); ?>
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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form2")) {
  $updateSQL = sprintf("UPDATE pengguna SET namadepan=%s, namabelakang=%s, jeniskelamin=%s, tanggal=%s, bulan=%s, tahun=%s, alamat=%s WHERE email=%s",
                       GetSQLValueString($_POST['textfield'], "text"),
                       GetSQLValueString($_POST['textfield2'], "text"),
                       GetSQLValueString($_POST['jeniskelamin'], "text"),
                       GetSQLValueString($_POST['tanggal'], "text"),
                       GetSQLValueString($_POST['bulan'], "text"),
                       GetSQLValueString($_POST['tahun'], "text"),
                       GetSQLValueString($_POST['alamat'], "text"),
                       GetSQLValueString($_POST['hiddenField'], "text"));

  mysql_select_db($database_koneksi, $koneksi);
  $Result1 = mysql_query($updateSQL, $koneksi) or die(mysql_error());

  $updateGoTo = "keranjang.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form3")) {
  $updateSQL = sprintf("UPDATE pengguna SET namadepan=%s, namabelakang=%s, jeniskelamin=%s, tanggal=%s, bulan=%s, tahun=%s, alamat=%s WHERE id=%s",
                       GetSQLValueString($_POST['namadepan'], "text"),
                       GetSQLValueString($_POST['namabelakang'], "text"),
                       GetSQLValueString($_POST['jeniskelamin'], "text"),
                       GetSQLValueString($_POST['tanggal'], "text"),
                       GetSQLValueString($_POST['bulan'], "text"),
                       GetSQLValueString($_POST['tahun'], "text"),
                       GetSQLValueString($_POST['alamat'], "text"),
                       GetSQLValueString($_POST['id'], "int"));

  mysql_select_db($database_koneksi, $koneksi);
  $Result1 = mysql_query($updateSQL, $koneksi) or die(mysql_error());

  $updateGoTo = "keranjang.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
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
		$('#email').blur(function(e){
			var isi = $('#email').val();
			$.ajax({
				type:'get',
				url:'aksi_uname.php',
				data : "isi="+isi,
				success : function(msg){$('#hasilnya').html(msg)}
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
				success : function(){$('#apDiv1').hide(200)}
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
				success : function(msg){$('#hasilnya').html(msg)}
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
      <td width="27%" align="center"><img src="logo.png" alt="" height="50"></td>
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
<div id="banner"></div>
<div id="konten">
  <form action="<?php echo $editFormAction; ?>" name="form2" method="POST">
    <table width="100%" border="0" cellspacing="0" cellpadding="5">
    <tr>      </tr>
    </table>
    <input type="hidden" name="MM_update" value="form2">
  </form>
  <form method="post" name="form3" action="<?php echo $editFormAction; ?>">
    <table align="center">
      <tr valign="baseline">
        <td nowrap align="right">Namadepan:</td>
        <td><input type="text" name="namadepan" value="<?php echo htmlentities($row_session['namadepan'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
      </tr>
      <tr valign="baseline">
        <td nowrap align="right">Namabelakang:</td>
        <td><input type="text" name="namabelakang" value="<?php echo htmlentities($row_session['namabelakang'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
      </tr>
      <tr valign="baseline">
        <td nowrap align="right">Jeniskelamin:</td>
        <td valign="baseline"><table>
          <tr>
            <td><input type="radio" name="jeniskelamin" value="Laki-laki" <?php if (!(strcmp(htmlentities($row_session['jeniskelamin'], ENT_COMPAT, 'utf-8'),"Laki-laki"))) {echo "checked=\"checked\"";} ?>>
              Laki-laki</td>
          </tr>
          <tr>
            <td><input type="radio" name="jeniskelamin" value="Perempuan" <?php if (!(strcmp(htmlentities($row_session['jeniskelamin'], ENT_COMPAT, 'utf-8'),"Perempuan"))) {echo "checked=\"checked\"";} ?>>
              Perempuan</td>
          </tr>
        </table></td>
      </tr>
      <tr valign="baseline">
        <td nowrap align="right">Tanggal:</td>
        <td><input type="text" name="tanggal" value="<?php echo htmlentities($row_session['tanggal'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
      </tr>
      <tr valign="baseline">
        <td nowrap align="right">Bulan:</td>
        <td><input type="text" name="bulan" value="<?php echo htmlentities($row_session['bulan'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
      </tr>
      <tr valign="baseline">
        <td nowrap align="right">Tahun:</td>
        <td><input type="text" name="tahun" value="<?php echo htmlentities($row_session['tahun'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
      </tr>
      <tr valign="baseline">
        <td nowrap align="right">Alamat:</td>
        <td><input type="text" name="alamat" value="<?php echo htmlentities($row_session['alamat'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
      </tr>
      <tr valign="baseline">
        <td nowrap align="right">&nbsp;</td>
        <td><input type="submit" value="Update record"></td>
      </tr>
    </table>
    <input type="hidden" name="MM_update" value="form3">
    <input type="hidden" name="id" value="<?php echo $row_session['id']; ?>">
  </form>
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
mysql_free_result($session);

mysql_free_result($session);
?>
