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
    	<a href="../"><img src="../bahan/dashboard.png" /></a>
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
  <div id="tag">Menus Produk</div>
	
	<?php
	include('../include/config.php');
	
	$id = $_POST['edit'];
	$query = mysql_query("select * from pesan where id_pesan='$id'");
	$show = mysql_fetch_array($query);
?>
<form method="post" action="act_edit_pesan.php">
	<table border="1" cellspacing="0" cellpadding="5" style="color:#333;">
      <tr>
      	<input type="hidden" value="<?php echo $show[0]; ?>" name="id_pesan"/>
        <td>Status</td>
        <td>:</td>
        <td>
        <div>
            <select name="status">
            	<option value="">Status</option>
                <option value="sudah cek">Sudah Cek</option>
                <option value="belum cek">Belum Cek</option>
            </select>	
        </div>
        </td>
      </tr>
            <tr>
        <td></td>
        <td></td>
        <td>
        <div><input type="submit" value="Edit Status"/></div>
        </td>
      </tr>

</table>
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