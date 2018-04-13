<div class="judul"><p>Konfirmasi Pembelian</p></div><!-- anggota -->
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
$data=$koneksi->konfirmasi_pembelian();
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
<td align="center"><a href="?p=terima_pembelian&id=<?php echo $array['id_pembelian'];?>">Konfirmasi</a></td>
</tr>
<?php $no++;} ?>
<tr>
<?php 
$query=mysql_query("select sum(harga) as total from barang,pembelian where barang.id_barang=pembelian.id_barang and pembelian.id_status=1 ");
$array=mysql_fetch_array($query);
?>
<td colspan="10" align="center">Total Harga : Rp.<?php echo $array['total'];?></td>
</table>