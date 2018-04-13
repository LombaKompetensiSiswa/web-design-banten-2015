<div class="daftar">
<div class="judul"><p>Keranjang Belanja</p></div><!-- anggota -->
<table class="table" border="1">
<tr>
<td align="center">No</td>
<td align="center">Nama</td>
<td align="center">Barang</td>
<td align="center">Harga</td>
<td align="center">Kategori</td>
<td align="center">Tanggal</td>
<td align="center">Setting</td>
</tr>
<?php 
$data=$koneksi->keranjang_belanja();
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
<td align="center"><a href="?p=hapus_pembelian&id=<?php echo $array['id_pembelian'];?>">Batal</a> |
<a href="cek.php?id=<?php echo $array['id_pembelian'];?>" target="_blank">Checkout</a>
</td>
</tr>
<?php $no++;} ?>
<tr>
<?php 
$query=mysql_query("select sum(harga) as total from barang,pembelian where barang.id_barang=pembelian.id_barang and pembelian.id_author=$_SESSION[id_author] and pembelian.id_status=0 ");
$array=mysql_fetch_array($query);
?>
<td colspan="10" align="center">Total Harga : Rp.<?php echo $array['total'];?></td>
</tr>
</table>
</div><!-- daftar -->