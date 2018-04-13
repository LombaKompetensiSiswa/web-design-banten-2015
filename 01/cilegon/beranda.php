<?php require_once('Connections/db.php'); ?>
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

if (isset($_POST['user'])) {
  $loginUsername=$_POST['user'];
  $password=$_POST['pas'];
  $MM_fldUserAuthorization = "user";
  $MM_redirectLoginSuccess = "kategori.php";
  $MM_redirectLoginFailed = "salah.php";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_db, $db);
  
  $LoginRS__query=sprintf("SELECT username, password FROM login WHERE username=%s AND password=%s",
    GetSQLValueString($loginUsername, "text"), GetSQLValueString($password, "text")); 
   
  $LoginRS = mysql_query($LoginRS__query, $db) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
     $loginStrGroup = "";
    
	if (PHP_VERSION >= 5.1) {session_regenerate_id(true);} else {session_regenerate_id();}
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;	      

    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
  }
}
?>
<?
require_once('Connections/db.php');
?>
<html>
<head>
<title>Ecommerce</title>
<link href="image/eCommerce-logo4.png" rel="icon" type="img/png" />
<link href="css/view.css" rel="stylesheet" type="text/css" />
</head>

<body>
	<div id="area">
    			<div id="bener">
        				<img src="image/E-commerce-MIT-THAKKAR.png" height="100px">
        		</div>
    			<div id="nav">
                        <ul>
                        <li><a href="beranda.php">Beranda</a></li>
                        <li><a href="sitemap.php">Sitemap</a></li>
                        <li><a href="contac.php">Contac us</a></li>
                        </ul>
                        
                        <form action="result.php" method="post">
                        <input type="text" id="#" name="#" placeholder="cari">
                        <input type="submit" value="cari"></form>
        		</div>
				<div id="conten">
                	<div id="kiri">
        				<table width="200px">
                        	<tr>
                            <td><a href="kategori.php">Kategori</a></td>
                            </tr>
                            <tr>
                            <td><a href="produkbaru.php">Produk baru</a></td>
                            </tr>
                            <tr>
                            <td><a href="produkunggulan.php">Produk unggulan</a></td>
                            </tr>
                            <tr>
                            <td><a href="keranjangbelanja.php">Keranjang belanja</a></td>
                            </tr>
                            <tr>
                            <td><a href="tentangkami.php">Tentang Kami</a></td>
                            </tr>
                            
                        </table>
                        <br><table>
                        <tr><th colspan="2" align="center"><font size="2">Temukan kami di</font></td></tr>
                        <tr>
                        <td><img src="image/1430843288_facebook-128.png" width="50" height="50"></td>
                        <td><img src="image/1430843301_twitter_letter-128.png" width="50" height="50"></td>
                        <td><img src="image/1430843323_youtube-128.png" width="50" height="50"></td>
                        </tr>
                        </table>
                        <br>
                        <form action="<?php echo $loginFormAction; ?>" method="POST" name="login">
                        <table width="200">
                        <tr>
                        <td>Join member</t>
                        </tr>
                        <tr>
                        <td><input type="text" placeholder="Username" name="user"></td>
                        </tr>
                        <tr>
                        <td><input type="password" placeholder="password" name="pas"></td>
                        </tr>
                        <tr>
                        <td>
                        <input type="submit" value="masuk"></td>
                        </tr>
                        </table>
                        </form>
                        
                        <table width="200">
                        	<tr>
                            <td><a href="register.php"><font size="2">New member</font></a></td>
                            </tr>
                            <tr>
                            <td><a href="#"><font size="2">Lupa pasword</font></a></td>
                            </tr>
                         </table>
                    </div>
                    
                    <div id="kanan">
                    <br>
                    <div align="center"><h2>New produk</h2>
                    </div>
                    <div align="center">
                        	<table cellpadding="7px" cellspacing="7px">
    	<tr>
        <td> <a href="kamera.php"><img src="image/canon.jpg" width="100px" height="100px"> </a></td>
        <td></td>
        <td><a href="kaos.php"><img src="image/keep-doing-good.jpg" width="100px" height="100px"></a></td>
        <td></td>
        <td><a href="laptop.php"><img src="image/asus_laptop.jpg" height="100px" width="100px"></a></td>
        <td></td>
        <td><a href="kereta bayi.php"><img src="image/kereta-dorong-bayi.jpg" height="100px" width="100px"></a></td>
        </tr>
        <tr>
     
        <td><a href="kamera.php">Kamera <br>
          <font size="1" color="#0033FF">RP  6.975.000</font></a></td>
        <td></td>
        <td><a href="kaos.php">kaos<br><font size="1" color="#0033FF">RP 150.000</font></a></td>
        <td></td>
        <td><a href="laptop.php">Laptop<br>
          <font size="1" color="#0033FF">RP 3.999.000</font></a></td>
        <td></td>
        <td>Kreta bayi<br><font size="1" color="#0033FF">RP 849.000 </font></td>

        </tr>

    </table>
    <hr size="3">
    <marquee direction="left"><img src="image/b.jpg" width="600" height="100"></marquee><br>
    <marquee direction="right"><img src="image/c.jpg" height="100" width="600"></marquee><br>
    <marquee direction="left"><img src="image/kategori_banner.jpg" width="600" height="100"></marquee>
                        </div>
                    </div>
                </div>
    </div>
    <div id="foter">
    Copyright &copy 2015 SMKN 1 Cilegon || jl. maju terus-cilegon
    </div>
	
</body>
</html>