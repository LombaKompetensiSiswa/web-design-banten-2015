<?php 
include"system/koneksi.php";
$koneksi=new koneksi();
$koneksi->konek();
?>
<title>Selamat Datang</title>
<link rel="stylesheet" href="style.css">
<div class="wrapper">
<div class="header">
<div class="logo"><img src="img/logo/logo.png"></div><!-- logo -->
<?php include"cari.php";?>
<div class="menu">
<ul class="ul1">
<?php if($_GET['p']=="home"){ ?>
<li class="aktif"><a href="?p=home">Home</a></li>
<?php }else{ ?>
<li><a href="?p=home">Home</a></li>
<?php } ?>
<?php if($_GET['p']=="kategori"){ ?>
<li class="aktif"><a href="?p=kategori">Kategori</a></li>
<?php }else{ ?>
<li><a href="?p=kategori">Kategori</a></li>
<?php } ?>
<?php if($_GET['p']=="produk_baru"){ ?>
<li class="aktif"><a href="?p=produk_baru">Produk Baru</a></li>
<?php }else{ ?>
<li><a href="?p=produk_baru">Produk Baru</a></li>
<?php } ?>
<?php if($_GET['p']=="produk_ungulan"){ ?>
<li class="aktif"><a href="?p=produk_ungulan">Produk Ungulan</a></li>
<?php }else{ ?>
<li><a href="?p=produk_ungulan">Produk Ungulan</a></li>
<?php } ?>
<?php if($_GET['p']=="keranjang_belanja"){ ?>
<li class="aktif"><a href="?p=keranjang_belanja">Keranjang Belanja</a></li>
<?php }else{ ?>
<li><a href="?p=keranjang_belanja">Keranjang Belanja</a></li>
<?php } ?>
<?php if($_GET['p']=="histori_belanja"){ ?>
<li class="aktif"><a href="?p=histori_belanja">History Belanja</a></li>
<?php }else{ ?>
<li><a href="?p=histori_belanja">History Belanja</a></li>
<?php } ?>
<?php if($_GET['p']=="author"){ ?>
<li class="aktif"><a href="?p=tampil_author">Anggota</a></li>
<?php }else{ ?>
<li><a href="?p=tampil_author">Anggota</a></li>
<?php } ?>
<?php if($_GET['p']=="tentang_kami"){ ?>
<li class="aktif"><a href="?p=tentang_kami">Tentang Kami</a></li>
<?php }else{ ?>
<li><a href="?p=tentang_kami">Tentang Kami</a></li>
<?php } ?>
</ul>
</div><!-- menu -->
</div><!-- header -->
<div class="konten">
<?php include"system/page.php"; 
if(!$_GET){
echo"<script>document.location='?p=home';</script>";
}
?>
</div><!-- konten -->
<div class="sidebar">
<?php include"widget.php";?>
</div><!-- sidebar -->
<div class="footer">
<p>Copyright &copy; 2015</p>
</div><!-- footer -->
</div><!-- wrapper -->