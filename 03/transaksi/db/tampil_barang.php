<div class="judul"><p>Lihat Barang</p></div><!-- judul -->
<table class="table" border="1">
<tr>
<td align="center">No</td>
<td align="center">Kategori</td>
<td align="center">Nama Barang</td>
<td align="center">Harga Barang</td>
<td align="center">Gambar</td>
<td align="center">Spesifikasi Barang</td>
<td align="center">Setting</td>
</tr>
<?php 
$data=$koneksi->tampil_barang();
$no=1;
foreach($data as $array){
?>
<tr>
<td align="center"><?php echo $no;?></td>
<td align="center"><?php echo $array['categori'];?></td>
<td align="center"><?php echo $array['nama_barang'];?></td>
<td align="center"><?php echo $array['harga'];?></td>
<td align="center"><?php echo $array['gambar']=substr($array['gambar'],0,10)?></td>
<td align="center"><?php echo $array['spesifikasi'];?></td>
<td align="center">
<a href="?p=edit_barang&id=<?php echo $array['id_barang'];?>">Edit</a> |
<a href="?p=hapus_barang&id=<?php echo $array['id_barang'];?>">Hapus</a>
</td>
</tr>
<?php $no++;} ?>
<tr>
<td colspan="10" align="center"><a href="?p=input_barang"><button type="button">Kembali</button></a></td>
</tr>
</table>