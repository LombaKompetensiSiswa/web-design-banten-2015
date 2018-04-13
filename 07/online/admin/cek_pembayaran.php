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
	include('cond.php');
	
	function logout() {
		session_destroy();
		echo "<meta http-equiv='refresh' content='0; url=../admin/'/>";
	}
	
?>
<ul id="MenuBar1" class="MenuBarHorizontal">
  
</ul>



<div id="navbar-full">
  <div id="navbar">
  	<div id="pull-left-nav">
    	<a href="menus.php"><img src="../bahan/dashboard.png" /></a>
    </div>
    <div id="pull-right-nav">
    <ul id="MenuBar1" class="MenuBarHorizontal">
      <li><a href="input_produk.php">Input Produk</a>  </li>
      <li><a href="cek_pesan.php">Cek Pesan</a></li>
      <li><a href="cek_pembayaran.php">Cek Pembayaran</a>  </li>
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
  <div id="tag">Menus Cek Pembayaran</div>
	
	<table border="1px" cellspacing="0px" cellpadding="5px" style="color:#333;">
  <tr align="center">
  	<td>No</td>
    <td>Kode Ris</td>
    <td>Nama Pembeli</td>
    <td>Nama Pengirim</td>
    <td>No Rekening</td>
    <td>Nominal</td>
    <td>Bank</td>
    <td>Status</td>
    <td>Struk</td>
    <td>Edit Status</td>
    <td>Hapus</td>
  </tr>
  <?php
  	include('../include/config.php');
  	$query = mysql_query("select * from pembayaran");
	$no = 1;
	while($show = mysql_fetch_array($query)){
		
  ?>
  <tr>
  	<td><?php echo $no;?></td>
    <td><?php
			$id_pesan = $show[2];
    		$query2 = mysql_query("select * from pesan where id_pesan='$id_pesan'");
			$show2 = mysql_fetch_array($query2);
			echo $show2[7];
		?>
    </td>
    <td><?php 
			$id_user = $show[1];
    		$query2 = mysql_query("select * from user where id_user='$id_user'");
			$show2 = mysql_fetch_array($query2);
			echo $show2[3];	
		?>
    </td>
    <td><?php echo $show[3]; ?></td>
    <td><?php echo $show[4];?></td>
    <td><?php echo $show[5];?></td>
    <td><?php echo $show[6];?></td>
    <td><?php echo $show[7];?></td>
    <td><a href="../proses/<?php echo $show[8]; ?>" target="_blank"><img src="../proses/<?php echo $show[8]; ?>" width="50" height="50"/></a></td>
    <td align="center">
    <form method="post" action="edit_pesan.php">
        	<input type="hidden" value="<?php echo $show[0]; ?>" name="edit"/>
            <input type="submit" value="edit" name="" />
        </form>
    </td>
    <td>
    	<form method="post" action="hapus_pesan.php">
        	<input type="hidden" value="<?php echo $show[0]; ?>" name="hapus"/>
            <input type="submit" value="hapus" name="" />
        </form>
    </td>
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







<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

</body>
</html>