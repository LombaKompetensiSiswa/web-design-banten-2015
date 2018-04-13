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
      <li><a href="../menus/kategori.php">Kategori</a>      </li>
      <li><a href="../menus/terbaru.php">Terbaru</a></li>
      <li><a href="../menus/terbaik.php">Terbaik</a>      </li>
      <li><a href="../menus/login.php">Login</a></li>
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
  <div id="tag">Best Produk</div>
	<?php
		include('../include/config.php');
		
		$id = $_POST['produk_desc'];
		
		$query = mysql_query("select * from produk where id_produk='$id'");
		$show = mysql_fetch_array($query);
	?>
	<table border="1" cellspacing="0" cellpadding="5" style="color:#333;">
  <tr>
    <td>Nama Produk</td>
    <td>:</td>
    <td><?php echo $show[1]; ?></td>
  </tr>
  <tr>
    <td>Foto Produk</td>
    <td>:</td>
    <td><?php echo $show[2]; ?></td>
  </tr>
  <tr>
    <td>Label</td>
    <td>:</td>
    <td><?php $id_lbl = $show[3];
			$label = mysql_query("select * from label where id_label='$id_lbl'");
			$show_lbl = mysql_fetch_array($label);
			
			echo $show_lbl[1];
	?></td>
  </tr>
  <tr>
    <td>Stok</td>
    <td>:</td>
    <td><?php echo $show[4]; ?></td>
  </tr>
  <tr>
    <td>Harga</td>
    <td>&nbsp;</td>
    <td><?php echo $show[5]; ?></td>
  </tr>
  <tr>
    <td>Tahun</td>
    <td>&nbsp;</td>
    <td><?php echo $show[6]; ?></td>
  </tr>
  <tr>
    <td>Best Produk</td>
    <td>:</td>
    <td><?php echo $show[7]; ?></td>
  </tr>
  <tr>
    <td>Deskripsi</td>
    <td>:</td>
    <td align="justify"><?php echo $show[8]; ?></td>
  </tr>
</table>


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