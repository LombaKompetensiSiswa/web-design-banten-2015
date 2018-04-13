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
?>
<?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['email'])) {
  $loginUsername=$_POST['email'];
  $password=$_POST['password'];
  $MM_fldUserAuthorization = "level";
  $MM_redirectLoginSuccess = "/erabit";
  $MM_redirectLoginFailed = "gagal.php";
  $MM_redirecttoReferrer = true;
  mysql_select_db($database_koneksi, $koneksi);
  	
  $LoginRS__query=sprintf("SELECT email, password, level FROM pengguna WHERE email=%s AND password=%s",
  GetSQLValueString($loginUsername, "text"), GetSQLValueString($password, "text")); 
   
  $LoginRS = mysql_query($LoginRS__query, $koneksi) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
    
    $loginStrGroup  = mysql_result($LoginRS,0,'level');
    
	if (PHP_VERSION >= 5.1) {session_regenerate_id(true);} else {session_regenerate_id();}
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;	      

    if (isset($_SESSION['PrevUrl']) && true) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
  }
}
?>
<?php require_once('Connections/koneksi.php');
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
<script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<script src="SpryAssets/SpryEffects.js" type="text/javascript"></script>
<link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css">
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
</div>
<div id="logo">
  <table width="85%" height="100%" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td width="27%" align="center"><img src="logo.png" height="50"></td>
      <td width="73%" align="right">&nbsp;</td>
    </tr>
  </table>
</div><div id="header">
  <div class="content">
    <ul id="MenuBar1" class="MenuBarHorizontal">
<li><a href="/erabit">Beranda</a></li>
      <li><a href="daftar.php">Mendaftar Baru</a></li>
    </ul>
    <div id="cari">
      <form method="POST" name="formcari" id="formcari">
        <label for="textfield"></label>
        <input type="text" placeholder="Ketikan Kata Kunci" name="textfield" id="textfield">
        <input type="submit" name="button" id="button" value="Cari">
      </form>
      <div id="result"></div>
    </div>
  </div>
</div>
<div id="banner"></div>
<div id="konten">
  <form name="form2" method="POST" action="<?php echo $loginFormAction; ?>">
    <table width="100%" border="0" cellspacing="0" cellpadding="5">
      <tr>
        <td colspan="2" align="center"><h2>GAGAL LOGIN</h2></td>
      </tr>
      <tr>
        <td colspan="2" align="center">Username atau password yang anda masukkan salah, atau anda belum memiliki akun? <a href="daftar.php">Daftar Sekarang</a></td>
      </tr>
      <tr>
        <td width="41%" align="right">ALamat Email</td>
        <td width="59%"><input name="email" type="text" size="40" placeholder="Ketikan Alamat Email"></td>
      </tr>
      <tr>
        <td align="right">Password</td>
        <td><input name="password" type="password" id="password" size="40" placeholder="Ketikan Alamat Email"></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><input type="submit" name="button2" id="button2" value="LOGIN"></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </table>
  </form>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <table width="100%" border="0" cellspacing="0" cellpadding="10">
    <tr>
      <td width="50%" align="right"><p><img src="LKS 2015 Provinsi Banten/Gambar/SocialMedia/1430843474_social_facebook_box_blue.png" width="128" height="128"></p>
      <p>LOGIN WITH FACEBOOK</p></td>
      <td width="50%" align="left"><p><img src="LKS 2015 Provinsi Banten/Gambar/SocialMedia/1430843483_social_twitter_box_blue.png" width="128" height="128"></p>
      <p>LOGIN WITH TWITTER</p></td>
    </tr>
  </table>
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