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
<?php
	include('../include/cond.php');
	include('../include/config.php');
	function logout() {
		session_destroy();
		echo "<meta http-equiv='refresh' content='0; url=../../online/'/>";
	}
?>
<ul id="MenuBar1" class="MenuBarHorizontal">
  
</ul>



<div id="navbar-full">
  <div id="navbar">
  	<div id="pull-left-nav">
    	<a href="index.php"><img src="../bahan/dashboard.png" /></a>
    </div>
    <div id="pull-right-nav">
    <ul id="MenuBar1" class="MenuBarHorizontal">
      <li><a href="history.php">History Pemesanan</a>  </li>
      <li><a href="konfirmasi.php">Konfirmasi</a></li>
      <?php
      if($_SESSION['level'] == "super admin"){
	  ?>
      	<li><a href="user_admin.php">Input User</a>  </li>
      <?php
	  }
	  ?>
      <li><a href="?p=logout" onclick="return confirm('anda yakin ingin keluar. pastikan anda menyelesaikan pembayaran')">Logout</a></li>
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
  <div id="tag"><?php echo "Selamat Datang Member ".$_SESSION['username']; ?></div>
	<?php
		include('../include/config.php');
		$user = $_SESSION['username'];
		
		$select = mysql_query("select * from user where username='$user'");
		$show = mysql_fetch_array($select);
		$id_user = $show[0];
		
	
	?>
    <table border="1" cellspacing="0" cellpadding="5" style="color:#333;">
  <tr align="center">
    <td>Nam Pengirim</td>
    <td>No Rekening</td>
    <td>Transfer</td>
    <td>Bank</td>
    <td>Status</td>
    <td>Kode</td>
    <td>Tanggal Pesan</td>
  </tr>
  <?php
  	$his = mysql_query("select * from pembayaran where id_user='$id_user'");
	$no = 1;
	while($show_his = mysql_fetch_array($his)){
  ?>
  <tr>
    <td><?php echo $show_his['nama_pengirim'];?></td>
    <td><?php echo $show_his['no_rek'];?></td>
    <td><?php echo $show_his['nominal'];?></td>
    <td><?php echo $show_his['bank'];?></td>
    <td><?php echo $show_his['status'];?></td>
    <td><?php
    		  $id_pesan = $show_his[2];
			  $tampil = mysql_query("select * from pesan where id_pesan='$id_pesan'");
			  $tam2 = mysql_fetch_array($tampil);
			  echo $tam2['ris'];
	?></td>
    <td><?php
    		  echo $tam2['tgl_pesan'];
	?></td>
  </tr>
  <?php
  	$no++;
	}
  ?>
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
<?php
	$p = isset($_GET['p']) ? $_GET['p'] : "";
	
	if($p == "histori"){
		
	}elseif($p == "logout"){
		logout();	
	}
?>
<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"SpryAssets/SpryMenuBarDownHover.gif", imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
</script>
</body>
</html>










