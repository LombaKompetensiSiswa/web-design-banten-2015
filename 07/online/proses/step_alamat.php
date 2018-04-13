<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="../style.css" rel="stylesheet" type="text/css" />
<script src="../SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<link href="../SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="navbar-full">
  <div id="navbar">
  	<div id="pull-left-nav">
    	<a href="../"><img src="../bahan/logo.png" /></a>
    </div>
    <div id="pull-right-nav">
    <ul id="MenuBar1" class="MenuBarHorizontal">
      <li><a href="kategori.php">Kategori</a>      </li>
      <li><a href="terbaru.php">Terbaru</a></li>
      <li><a href="terbaik.php">Terbaik</a>      </li>
      <li><a href="login.php">Login</a></li>
    </ul>
    </div>
  </div>
</div>
<center>
<div id="">
  <div id="banner">
  	<embed src="../bahan/banner.swf" width="1024" height="340"/>
  </div>

  
</div>
<div id="produk">
	<div id="produk">
  <div id="tag">Alamat Pengiriman</div>
	
	<?php
	include('../include/config.php');
	
	$id_pro = $_POST['produk'];
?>
<form action="step_pembayaran.php" method="post">
	<div><input type="hidden" name="produk" value="<?php echo $id_pro; ?>" /></div>
	<div><input type="text" name="no_hp" placeholder="+628 5763749834" required="required" /></div>
    <div><input type="text" name="provinsi" placeholder="provinsi" required="required" /></div>
    <div><input type="text" name="kota" placeholder="kota" required="required" /></div>
    <div><input type="text" name="kecamatan" placeholder="kecamatan" required="required" /></div>
    <div><input type="text" name="alamat" placeholder="alamat" required="required" /></div>
    <div><input type="submit" name="act_alamat" value="Selanjutnya"/></div>    
</form>

</div>
</div>
<div id="footer-full">
  <div id="footer-in">
    <div id="pull-left">Copyright &copy; 2015 Online.com. All Right Reserved</div>
    <div id="pull-right">Powered By Rano Muhamad</div>
  </div>
</div>
</center>
<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"SpryAssets/SpryMenuBarDownHover.gif", imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
</script>
</body>
</html>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>


</body>
</html>