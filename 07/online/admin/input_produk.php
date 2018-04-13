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
  <div id="tag">Menus Produk</div>
	
<div><h2>Input Produk Baru</h2></div>

<form method="post" action="act_produk.php" enctype="multipart/form-data"> 

<table border="1" cellspacing="0" cellpadding="5" style="color:#333;">
  <tr>
    <td>Nama Barang</td>
    <td>:</td>
    <td><div><input type="text" name="nama_brg" placeholder="nama barang" required="required"/></div></td>
  </tr>
  <tr>
    <td>Label</td>
    <td>:</td>
    <td>
    	<div>
    	<select name="label" required="required">
        	<option value="">Pilih Label</option>
        	<option value="1">camera & video</option>
            <option value="2">Pakaian</option>
            <option value="3">Peralatan Komputer</option>
            <option value="4">Perlengkapan Bayi</option>
        </select>
    </div>
    </td>
  </tr>
  <tr>
    <td>Foto Barang</td>
    <td>:</td>
    <td> <div><input type="file" name="foto_brg" required="required" /></div></td>
  </tr>
  <tr>
    <td>Harga</td>
    <td>:</td>
    <td> <div><input type="text" name="price" placeholder="harga" required="required" /></div></td>
  </tr>
  <tr>
    <td>Stok</td>
    <td>:</td>
    <td><div><input type="text" name="stok" placeholder="stok" required="required"  /></div></td>
  </tr>
  <tr>
    <td>Best Produk</td>
    <td>:</td>
    <td><div>
    	<select name="best" required="required">
        	<option value="">Best Produk</option>
        	<option value="ya">Ya</option>
            <option value="tidak">Tidak</option>
        </select>
    </div></td>
  </tr>
  <tr>
    <td>Deskripsi Produk</td>
    <td>:</td>
    <td><div>
    	<textarea cols="32" rows="10" name="desk"></textarea>
    </div></td>
  </tr>
  <tr>
  	<td></td>
    <td></td>
    <td><input type="submit" value="Input Produk Baru" name="input_produk"/></td>
  </tr>
</table>
</form>


<div><h2>Edit Produk</h2></div>
<table border="1px" cellspacing="0px" cellpadding="5px" style="color:#333;">
  <tr align="center">
  	<td>no</td>
    <td>nama produk</td>
    <td>foto produk</td>
    <td>label</td>
    <td>stok</td>
    <td>harga</td>
    <td>Edit</td>
    <td>Hapus</td>
  </tr>
  <?php
  	include('../include/config.php');
  	$query = mysql_query("select * from produk");
	$no = 1;
	while($show = mysql_fetch_array($query)){
		
  ?>
  <tr>
  	<td><?php echo $no;?></td>
    <td><?php echo $show[1];?></td>
    <td><img src="<?php echo $show[2]; ?>" width="50" height="50"/></td>
    <td><?php
			$id_label = $show[3];
    		$query2 = mysql_query("select * from label where id_label='$id_label'");
			$show2 = mysql_fetch_array($query2);
			echo $show2[1];
		?></td>
    <td><?php echo $show[4];?></td>
    <td><?php echo $show[5];?></td>
    <td>
    	<form method="post" action="edit_produk.php">
        	<input type="hidden" value="<?php echo $show[0]; ?>" name="edit"/>
            <input type="submit" value="edit" name="" />
        </form>
    </td>
    <td>
    	<form method="post" action="hapus_produk.php">
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