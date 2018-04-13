<?php
require_once 'inc/init.php';

if($_SESSION['usergroup'] == 1){
	$user='<a href="user.php">User</a>';
}



if($_SESSION['uid']){
	$login='<div class="login"><a href="logout.php">LOGOUT</a></div>';
}else{
	$login='<div class="login"><a href="login.php">LOGIN</a></div>';
}

if($_SESSION['uid']){
	$tr='<a href="transaksi.php?uid='.hsc($_SESSION['uid']).'">Transaksi</a>';
}

if($_SESSION['uid']){
	$akun='<a href="acount.php?uid='.hsc($_SESSION['uid']).'"> Akun </a>';
}

$header='<div class="header"><img src="img/logo.png" width="150"><div class="daftar"><a href="register_pelanggan.php">DAFTAR</div></a> '.$login.'</div>';

$menu='<div class="menu">
<a href="index.php"> Beranda </a> |
<a href="#"> Contact Us</a> |
<a href="#"> Sitemap</a>  | 
'.$akun.'
</div>
';

$submenu='<div class="sub">
	<a href="kategori.php">Kategori</a> | 
	<a href="lb.php">Produk Baru</a> | 
	<a href="produkunggulan.php">Produk Unggulan</a> | 
	<a href="#">Keranjang Belanja</a> | 
	<a href="#">Tentang Kami</a>
	</div>';

$footer='
<div class="footer"><div class="text">&copy; OLShop '.date('Y').'</div><div class="find"><center>FIND US!</denter><br>
<a href="#"><img src="img/efb.png" class="findus"></a>
 <a href="#"><img src="img/1430843301_twitter_letter-128.png" class="findus"></a>
  <a href="#"><img src="img/yt.png" class="findus"></a></div></div>';

$page='
<html>
<head><title>'.$title.'</title>
<link rel="stylesheet" type="text/css" href="css/style.css"></head>
<body>
'.$header.'
'.$menu.'
<div class="wrapper">
	<div class="contents">
		'.$submenu.'
		<img src="img/kategori_banner.jpg" class="index">
		</div>
	<div class="iklan">
		<img src="img/BCA-Bank-Logo-blue.png" class="iklanbanner"><br />
		<img src="img/Logo_Bank_BNI.png"  class="iklanbanner"><br />
		<img src="img/logo_mandiri.png"  class="iklanbanner"><br />
	</div>


</div>
'.$footer.'
</div>
</body>
</html>';

echo $page;
?>