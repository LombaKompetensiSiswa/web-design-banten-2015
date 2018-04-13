<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="navbar-full">
  <div id="navbar">
  	<div id="pull-left-nav">
    	<img src="bahan/logo.png" />
    </div>
    <div id="pull-right-nav">
    <ul id="MenuBar1" class="MenuBarHorizontal">
      <li><a href="menus/kategori.php">Kategori</a>      </li>
      <li><a href="#">Terbaru</a></li>
      <li><a href="#">Terbaik</a>      </li>
      <li><a href="menus/login.php">Login</a></li>
    </ul>
    </div>
  </div>
</div>
<center>
<div id="content">
  <div id="banner">
    <embed src="bahan/banner.swf" width="1024" height="340"/>      </div>

  <div id="span-3">
  	<div><img src="bahan/LKS 2015 Provinsi Banten/Gambar/Icon/coquette-part-2-icons-set/ico/new.ico" width="80" height="80"/></div>
  	<div id="judul">Berdiri</div>
<div id="justify">
    	"Nama Toko Online Anda" berdiri sejak Mei 2015. Kami merupakan badan usaha yang bergerak dalam dunia bisnis untuk menyediakan toko online yang menyediakan barang-barang kebutuhan masyarakat secara umum. Dengan pengalaman yang cukup lama bergelut di dunia online kami siap melayani anda bermodalkan kejujuran sepenuh hati.
    </div>
  </div>
  <div id="span-3">
 	<div><img src="bahan/LKS 2015 Provinsi Banten/Gambar/Icon/coquette-part-2-icons-set/ico/link.ico" width="80" height="80"/></div>
    <div id="judul">
    	Usaha
    </div>
    <div id="justify">
    	Dalam usaha tersebut ( mencapai kepuasan pelanggan) dengan segala upaya kami selalu berusaha menjaga kepercayaan dan pelayanan maksimal secara konstan dan kontinuitas dengan pertimbangan segala bentuk keinginan dan kemauan pelanggan, usaha tersebut memang bukan suatu hal yang mudah, namun dengan acuan keinginan dan kemauan pelanggan yang ada maka kami fokus pada satu hal, yaitu membuat pelanggan kami terpuaskan sehingga pelanggan benar-benar dapat termanjakan dengan fasilitas yang coba kami hadirkan.
    </div>
  </div>
  <div id="span-3">
  	<div><img src="bahan/LKS 2015 Provinsi Banten/Gambar/Icon/coquette-part-2-icons-set/ico/edit.ico" width="80" height="80"/></div>
    <div id="judul">
    	Keyakinan
    </div>
    <div id="justify">
    	Akan tetapi, kami yakin dalam setiap usaha tersebut masih banyak hal-hal yang perlu pembenahan di sana sini, kami harap maklum dan saran juga kritik anda yang akan menjadi bahan bakar utama kami untuk lebih bisa instropeksi diri untuk menjadi lebih baik dan lebih baik lagi.
    </div>
  </div>
  <div id="span-3">
  	<div><img src="bahan/LKS 2015 Provinsi Banten/Gambar/Icon/coquette-part-2-icons-set/ico/support.ico" width="80" height="80"/></div>
    <div id="judul">
    	Terima Kasih
    </div>
    <div id="justify">
    	Terima Kasih atas kepercayaan anda, dan kami akan membawa kepercayaan tersebut sebagai mandat utama misi kami yaitu, "memberikan yang terbaik untuk anda"
    </div>
  </div>
</div>
<div id="ads"><img src="bahan/ads.png" /></div>
<div id="produk">
  <div id="tag">Best Produk</div>
	
	<?php
		include('include/config.php');
		$query = mysql_query("select * from produk where best_produk='ya' limit 4");
		
		while($show = mysql_fetch_array($query)){
		?>
      <div id="span-best">
  			<img src="<?php echo 'admin/'.$show[2];?>" width="100" height="100"/>
            <div><?php echo $show['nama_produk']; ?></div>
            <div><b><?php echo $show['harga'];?></b></div>
            <table>
            	<tr>
                	<td>
                    	<form action="proses/produk.php" method="post">
                            <input type="hidden" value="<?php echo $show['id_produk']; ?>" name="produk_desc"/>
                            <input type="submit" value="Lihat" />
                        
                        </form>
                    </td>
                    <td>
                    	<form action="proses/step_alamat.php" method="post">
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
<div id="footer">
  <div id="alamat">
  	<div  style="color:#111; font-weight:bold;margin-bottom: 5px;">Marketing Office:</div>
    <div>Jl. M.H. Tamrin KM. 27 Kebon Nanas , Tangerang 15143
    Banten</div>
    <div>&nbsp;</div>
    <div  style="color:#111; font-weight:bold;margin-bottom: 5px;">No Telepon:</div>
    <div>[021] - 12430948</div>
  </div>
  <div id="socmed">
  	<a href="http://facebook.com" target="_blank"><img src="bahan/LKS 2015 Provinsi Banten/Gambar/SocialMedia/fb.png" width="100" height="100"/></a>
    <a href="http://twitter.com" target="_blank"><img src="bahan/LKS 2015 Provinsi Banten/Gambar/SocialMedia/tw.png" width="100" height="100" /></a>
    <a href="http://youtube.com" target="_blank"><img src="bahan/LKS 2015 Provinsi Banten/Gambar/SocialMedia/you.png"  width="100" height="100"/></a>
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