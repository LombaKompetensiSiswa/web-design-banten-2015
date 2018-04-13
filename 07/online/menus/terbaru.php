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
  <div id="tag">Produk Terbaik</div>
	
	<?php
		include('../include/config.php');
		$query = mysql_query("select * from produk order by tgl_input desc");
		
		while($show = mysql_fetch_array($query)){
		?>
      <div id="span-best">
  			<img src="<?php echo '../admin/'.$show[2];?>" width="100" height="100"/>
            <div><?php echo $show['nama_produk']; ?></div>
            <div><b><?php echo $show['harga'];?></b></div>
            <table>
            	<tr>
                	<td>
                    	<form action="../proses/produk.php" method="post">
                            <input type="hidden" value="<?php echo $show['id_produk']; ?>" name="produk_desc"/>
                            <input type="submit" value="Lihat" />
                        
                        </form>
                    </td>
                    <td>
                    	<form action="../proses/step_alamat.php" method="post">
                            <input type="hidden" value="<?php echo $show['id_produk']; ?>" name="produk"/>
                            <input type="submit" value="Beli" />
                        </form>
                    </td>
                </tr>
            </table>
    	</div>
        <?php
		}
	?>

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