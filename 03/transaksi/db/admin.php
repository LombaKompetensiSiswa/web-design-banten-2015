<?php 
include"system/koneksi.php";
$koneksi=new koneksi();
$koneksi->konek();
$data=$koneksi->select_anggota();
foreach($data as $array);
?>
<title>Admin</title>
<link rel="stylesheet" href="style.css">
<div class="atas"><p>Hello <?php echo $array['nama'];?></p></div><!-- atas -->
<div class="kiri">
<ul class="ul2">
<a href="?p=beranda"><p>Beranda</p></a>
<a href="?p=input_kategori"><p>Tambahkan Kategori</p></a>
<a href="?p=tampil_kategori"><p>Lihat Kategori</p></a>
<a href="?p=input_barang"><p>Tambahkan Barang</p></a>
<a href="?p=tampil_barang"><p>Lihat Barang</p></a>
<a href="?p=tampil_transaksi"><p>Lihat Data Transaksi</p></a>
<a href="?p=tampil_anggota"><p>Anggota</p></a>
</ul><br>
<ul class="ul2">
<?php 
$query=mysql_query("select count(id_author) as jumlah from author where konfirmasi='No' ");
$rec=mysql_fetch_array($query);
?>
<a href="?p=konfirmasi_anggota"><p>Konfirmasi Anggota <?php if($rec['jumlah']==0){}else{ ?>(<?php echo $rec['jumlah'];?>)<?php } ?></p></a>
<?php 
$query=mysql_query("select count(id_pembelian) as total from pembelian,barang where barang.id_barang=pembelian.id_barang and pembelian.id_status=1 ");
$rex=mysql_fetch_array($query);
?>
<a href="?p=konfirmasi_pembelian"><p>Konfirmasi Pembelian <?php if($rex['total']==0){}else{ ?>(<?php echo $rex['total'];?>)<?php } ?></p></a>
<a href="?p=keluar"><p>Log Out</p></a>
</ul>
</div><!-- kiri -->
<div class="kanan">
<?php include"system/page.php";
if(!$_GET){
echo"<script>document.location='?p=beranda';</script>";
}
?>
</div><!-- kanan -->
<div class="footer">
<p>Copyright &copy; 2015</p>
</div><!-- footer -->