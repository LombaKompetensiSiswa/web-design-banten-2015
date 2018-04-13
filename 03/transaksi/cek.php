<?php 
include"system/koneksi.php";
$koneksi=new koneksi();
$koneksi->konek();
?>
<title>Terima Kasih</title>
<link rel="stylesheet" href="style.css">
<div class="daftar">
<div class="judul"><p>Check Out</p></div><!-- anggota -->
<table class="table" border="1">
<tr>
<td align="center">No</td>
<td align="center">Nama</td>
<td align="center">Barang</td>
<td align="center">Harga</td>
<td align="center">Kategori</td>
<td align="center">Tanggal</td>
</tr>
<?php 
$data=$koneksi->cek();
$no=1;
foreach($data as $array){
?>
<tr>
<td align="center"><?php echo $no;?></td>
<td align="center"><?php echo $array['nama'];?></td>
<td align="center"><?php echo $array['nama_barang'];?></td>
<td align="center">Rp.<?php echo $array['harga'];?></td>
<td align="center"><?php echo $array['categori'];?></td>
<td align="center"><?php echo $array['tanggal'];?></td>
</tr>
<?php $no++;} ?>
<tr>
<?php 
$id=$_REQUEST['id'];
$query=mysql_query("select sum(harga) as total from barang,pembelian where barang.id_barang=pembelian.id_barang and pembelian.id_pembelian=$id ");
$array=mysql_fetch_array($query);
?>
<td colspan="10" align="center">Total Harga : Rp.<?php echo $array['total'];?></td>
</tr>
<tr><td colspan="10" align="center">
<form method="POST"><button type="submit" name="beli">Beli Sekarang</button>
<button type="submit" name="print">Print</button></form>
</td></tr>
</table>
</div><!-- daftar -->
<?php 
if(isset($_POST['print'])){
echo"<script>self.print();</script>";
}
if(isset($_POST['beli'])){
echo"<script>alert('Tunggu Konfirmasi dari Admin');document.location='index.php';</script>";
}
?>