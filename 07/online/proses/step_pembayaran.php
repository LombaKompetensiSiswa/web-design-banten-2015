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
    <embed src="../bahan/banner.swf" width="1024" height="340"/>      </div>
	<div id="tag">Konfirmasikan Pembayaran Anda Melalui</div>
	<div id="konfirmasi-pem">
    	Transaksi ini dicatat dengan nomor "#Nomor Transaksi". Transaksi dianggap batal jika sampai dengan pukul 13: 45 WIB hari Sabtu, 09 Mei 2015 (1×24jam) belum lunas dibayar.

Segera lakukan pembayaran ke salah satu nomor rekening berikut

    </div>
    
  <div id="span-3">
    <div><img src="../bahan/LKS 2015 Provinsi Banten/Gambar/Bank/logo_mandiri.png" width="80" height="80"/></div>
  	<div id="judul">Bank Mandiri</div>
<div id="justify">
Bank Mandiri, Tangerang
a/n "Nama Perusahaan / Toko Anda" 
No. Rekening 000 111 222 333

    </div>
</div>
  <div id="span-3">
 	<div><img src="../bahan/LKS 2015 Provinsi Banten/Gambar/Bank/BCA-Bank-Logo-blue.png" width="80" height="80"/></div>
    <div id="judul">
    	Bank Central Asia (BCA)
    </div>
    <div id="justify">
   Bank Central Asia (BCA), Tangerang
a/n "Nama Perusahaan / Toko Anda" 
No. Rekening 000 111 222 

    </div>
  </div>
  <div id="span-3">
  	<div><img src="../bahan/LKS 2015 Provinsi Banten/Gambar/Bank/Logo_Bank_BNI.png" width="80" height="80"/></div>
    <div id="judul">
    	Bank Negara Indonesia (BNI)
    </div>
    <div id="justify">
   Bank Negara Indonesia (BNI), Tangerang
a/n "Nama Perusahaan / Toko Anda" 
No. Rekening 000 111 2222 3

    </div>
  </div>
  <div id="span-3">
  	<div><img src="../bahan/LKS 2015 Provinsi Banten/Gambar/Bank/Logo+Bank+BRI (1).gif" width="80" height="80"/></div>
    <div id="judul">
    	Bank Rakyat Indonesia (BRI)
    </div>
    <div id="justify">
Bank Rakyat Indonesia (BRI), Tangerang
a/n "Nama Perusahaan / Toko Anda" 
No. Rekening 000 111 222 333 444

    </div>
  </div>
</div>
<div id="ads">Content for  id "ads" Goes Here</div>
<div id="produk">
  <div id="tag">Best Produk</div>
	
	<?php
		include('../include/config.php');
		$id_pro = $_POST['produk'];
		$no_hp = $_POST['no_hp'];
		$prov = $_POST['provinsi'];
		$kota = $_POST['kota'];
		$kec = $_POST['kecamatan'];
		$almt = $_POST['alamat'];
		
	?>
	<h1>Step Pembayaran</h1>
    <small>Transfer</small>
    <form action="act_pembayaran.php" method="post" enctype="multipart/form-data">
    <div><input type="hidden" name="produk" value="<?php echo $id_pro; ?>" /></div>
    <div><input type="hidden" name="no_hp" value="<?php echo $no_hp; ?>" /></div>
    <div><input type="hidden" name="provinsi" value="<?php echo $prov; ?>" /></div>
    <div><input type="hidden" name="kota" value="<?php echo $kota; ?>" /></div>
    <div><input type="hidden" name="kecamatan" value="<?php echo $kec; ?>" /></div>
    <div><input type="hidden" name="alamat" value="<?php echo $almt; ?>" /></div>
    
    <table border="0" cellspacing="0" cellpadding="5" style="color: #333;">
      <tr>
        <td>Username</td>
        <td>: </td>
        <td><div><input type="text" name="username" placeholder="Username Member" required="required" /></div></td>
      </tr>
      <tr>
        <td>Password</td>
        <td>: </td>
        <td><div><input type="password" name="password" placeholder="Password Member" required="required" /></div></td>
      </tr>
      <tr>
        <td colspan="2" align="right"></td>
        <td><small><a href="../menus/login.php">Belum Daftar Member</a></small></td>
      </tr>
      <tr>
        <td>Men-Transfer Ke Bank</td>
        <td>: </td>
        <td>
        <div>
        		<select name="bank">
                	<option value="Bank Mandiri">Bank Mandiri</option>
                    <option value="Bank Central Asia (BCA)">Bank Central Asia (BCA)</option>
                    <option value="Bank Negara Indonesia (BNI)">Bank Negara Indonesia (BNI)</option>
                    <option value="Bank Rakyat Indonesia (BRI)">Bank Rakyat Indonesia (BRI)</option>
                </select>
        </div>
        </td>
      </tr>
      <tr>
        <td>Atas Nama</td>
        <td>: </td>
        <td><div><input type="text" name="nama" placeholder="Nama Pelanggan" required="required" /></div></td>
      </tr>
      <tr>
        <td>No. Rekening</td>
        <td>: </td>
        <td><div><input type="text" name="no_rek" placeholder="No Rekening" required="required" /></div></td>
      </tr>
      <tr>
        <td>No Rekening</td>
        <td>: </td>
        <td><div>Rp. <input type="text" name="nominal" placeholder="Nominal" required="required" /> (150000) </div></td>
      </tr>
      <tr>
        <td>Tgl Transaksi</td>
        <td></td>
        <td>
            <div>
				<select name="tgl">
                	<option value="">Tanggal</option>
                	<option value="01">01</option><option value="02">02</option>
                    <option value="03">03</option><option value="04">04</option>
                    <option value="05">05</option><option value="06">06</option>
                    <option value="07">07</option><option value="08">08</option>
                    <option value="09">09</option>
                    <?php
						for($i=10;$i<=31;$i++){
							?>
                            	<option value="<?php echo $i; ?>"><?php echo $i;?></option>
                            <?php	
						}
					?>                    
                </select>
                <select name="bln">
                	<option value="">Bulan</option>
                	<option value="01">Januari</option><option value="02">Februari</option>
                    <option value="03">Maret</option><option value="04">April</option>
                    <option value="05">Mei</option><option value="06">Juni</option>
                    <option value="07">Juli</option><option value="08">Agustus</option>
                    <option value="09">September</option><option value="10">Agustus</option>
                    <option value="11">November</option><option value="12">Desember</option>
                </select>         
                <select name="thn">
                	<option value="">Tahun</option>
                   <?php
				   		$y = date('Y');
						$z = date('Y')+2;
						for($i=$y;$i<=$z;$i++){
							?>
                            	<option value="<?php echo $i; ?>"><?php echo $i;?></option>
                            <?php	
						}
					?>      
                </select>
            </div>
        </td>
      </tr>
      <tr>
        <td>Upload Struk</td>
        <td>: </td>
        <td><div><input type="file" name="struk"></div></td>
      </tr>
      <tr>
        <td>Waktu</td>
        <td>: </td>
        <td><div><input type="text" name="jam" style="width:20px;" />
        		- <input type="text" name="menit"  style="width:20px;" />
        </div></div></td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td><div><input type="submit" name="act_alamat" value="Selanjutnya"/></div></div></td>
      </tr>
    </table>
	</form>

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
  	<a href="http://facebook.com" target="_blank"><img src="../bahan/LKS 2015 Provinsi Banten/Gambar/SocialMedia/fb.png" width="100" height="100"/></a>
    <a href="http://twitter.com" target="_blank"><img src="../bahan/LKS 2015 Provinsi Banten/Gambar/SocialMedia/tw.png" width="100" height="100" /></a>
    <a href="http://youtube.com" target="_blank"><img src="../bahan/LKS 2015 Provinsi Banten/Gambar/SocialMedia/you.png"  width="100" height="100"/></a>
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