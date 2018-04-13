<?php require_once('Connections/koneksi.php');
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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form2")) {
  $insertSQL = sprintf("INSERT INTO pengguna (email, password, `level`, namadepan, namabelakang, jeniskelamin, tanggal, bulan, tahun, alamat) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['email'], "text"),
                       GetSQLValueString($_POST['password'], "text"),
                       GetSQLValueString($_POST['level'], "text"),
                       GetSQLValueString($_POST['namadepan'], "text"),
                       GetSQLValueString($_POST['namabelakang'], "text"),
                       GetSQLValueString($_POST['jeniskelamin'], "text"),
                       GetSQLValueString($_POST['tanggal'], "text"),
                       GetSQLValueString($_POST['bulan'], "text"),
                       GetSQLValueString($_POST['tahun'], "text"),
                       GetSQLValueString($_POST['alamat'], "text"));

  mysql_select_db($database_koneksi, $koneksi);
  $Result1 = mysql_query($insertSQL, $koneksi) or die(mysql_error());

  $insertGoTo = "login.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}
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
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<script src="SpryAssets/SpryValidationRadio.js" type="text/javascript"></script>
<script src="SpryAssets/SpryValidationSelect.js" type="text/javascript"></script>
<script src="SpryAssets/SpryValidationPassword.js" type="text/javascript"></script>
<script src="SpryAssets/SpryValidationConfirm.js" type="text/javascript"></script>
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
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
<link href="SpryAssets/SpryValidationRadio.css" rel="stylesheet" type="text/css">
<link href="SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css">
<link href="SpryAssets/SpryValidationPassword.css" rel="stylesheet" type="text/css">
<link href="SpryAssets/SpryValidationConfirm.css" rel="stylesheet" type="text/css">
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
  <form action="<?php echo $editFormAction; ?>" name="form2" method="POST">
    <table width="100%" border="0" cellspacing="0" cellpadding="5">
      <tr>
        <td colspan="2" align="center"><h2>MENDAFTAR PENGGUNA BARU</h2></td>
      </tr>
      <tr>
        <td width="41%" align="right">Nama Lengkap</td>
        <td width="59%"><span id="sprytextfield1">
          <label for="namadepan"></label>
          <input type="text" placeholder="Nama Depan" name="namadepan" id="namadepan">
        <span class="textfieldRequiredMsg">!</span></span><span id="sprytextfield2">
        <label for="namabelakang"></label>
        <input type="text" name="namabelakang" placeholder="Nama Belakang" id="namabelakang">
        <span class="textfieldRequiredMsg">!</span></span></td>
      </tr>
      <tr>
        <td align="right">Jenis Kelamin</td>
        <td><span id="spryradio1">
          <label>
            <input type="radio" name="jeniskelamin" value="Laki-laki" id="jeniskelamin_0">
            Laki-laki</label>
          <label>
            <input type="radio" name="jeniskelamin" value="Perempuan" id="jeniskelamin_1">
            Perempuan</label>
          <br>
        <span class="radioRequiredMsg">!</span></span></td>
      </tr>
      <tr>
        <td align="right">Lahir</td>
        <td><span id="spryselect1">
          <label for="select1"></label>
          <select name="tanggal" id="select1">
          <option>- Tgl -</option>
          <?php for($tgl=1; $tgl<=31; $tgl++) { ?>
          <option value="<?php echo $tgl;?>"><?php echo $tgl; ?></option><?php } ?>
          </select>
        <span class="selectRequiredMsg">!</span></span>  <span id="spryselect3">
        <select name="bulan" id="bulan">
          <option>-Bulan-</option>
          <option value="Januari">Januari</option>
          <option value="Februari">Februari</option>
          <option value="Maret">Maret</option>
          <option value="April">April</option>
          <option value="Mei">Mei</option>
          <option value="Juni">Juni</option>
          <option value="Juli">Juli</option>
          <option value="Agustus">Agustus</option>
          <option value="September">September</option>
          <option value="Oktober">Oktober</option>
          <option value="Nopember">Nopember</option>
          <option value="Desember">Desember</option>
        </select>
        <span class="selectRequiredMsg">!</span></span> <span id="spryselect2">
        <select name="tahun" id="tahun">
        <option>-Tahun-</option>
        <?php for($thn=2015; $thn>=1950; $thn--) { ?>
        <option value="<?php echo $thn; ?>"><?php echo $thn; ?></option>
        <?php } ?>
        </select>
        <span class="selectRequiredMsg">!</span></span></td>
      </tr>
      <tr>
        <td colspan="2" align="center"><strong>Informasi Login</strong></td>
      </tr>
      <tr>
        <td align="right">Alamat Email</td>
        <td><span id="sprytextfield3">
        <label for="email"></label>
        <input name="email" type="text" id="email" placeholder="Masukan Email yang Valid" size="40">
        <span class="textfieldRequiredMsg">A value is required</span><span class="textfieldInvalidFormatMsg">Format Tidak valid</span></span></td>
      </tr>
      <tr>
        <td align="right">Kata Sandi</td>
        <td><span id="sprypassword1">
        <label for="password"></label>
        <input name="password" placeholder="Minimal 6 karakter" type="password" id="password" size="40">
        <span class="passwordRequiredMsg">!</span><span class="passwordMinCharsMsg">Minimal 6 karakter</span><span class="passwordMaxCharsMsg">Exceeded maximum number of characters.</span></span></td>
      </tr>
      <tr>
        <td align="right">Ketik Ulang Kata Sandi</td>
        <td><span id="spryconfirm1">
          <label for="password2"></label>
          <input name="password2" placeholder="Password harus sama" type="password" id="password2" size="40">
        <span class="confirmRequiredMsg">A value is required.</span><span class="confirmInvalidMsg">Password tidak sama</span></span>
          <input name="level" type="hidden" id="level" value="user"></td>
      </tr>
      <tr>
        <td align="right" valign="top">Alamat</td>
        <td><label for="textarea"></label>
        <textarea name="alamat" id="textarea" cols="45" rows="5"></textarea></td>
      </tr>
      <tr>
        <td align="right">Level</td>
        <td><select name="select" id="select">
          <option value="admin">Admin</option>
          <option value="user">User</option>
        </select></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><input type="submit" name="button2" id="button2" value="MENDAFTAR SEKARANG">
       <a href="javascript:history.go(-1)"><button>KEMBALI</button></a></td>
      </tr>
    </table>
    <input type="hidden" name="MM_insert" value="form2">
  </form>
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
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var spryradio1 = new Spry.Widget.ValidationRadio("spryradio1");
var spryselect1 = new Spry.Widget.ValidationSelect("spryselect1");
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3", "email", {validateOn:["blur"]});
var sprypassword1 = new Spry.Widget.ValidationPassword("sprypassword1", {validateOn:["blur"], minChars:6, maxChars:32});
var spryconfirm1 = new Spry.Widget.ValidationConfirm("spryconfirm1", "password", {validateOn:["blur"]});
var spryselect2 = new Spry.Widget.ValidationSelect("spryselect2", {validateOn:["blur"]});
var spryselect3 = new Spry.Widget.ValidationSelect("spryselect3", {validateOn:["blur"]});
</script>
</body>
</html>