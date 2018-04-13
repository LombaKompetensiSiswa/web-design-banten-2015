<div class="judul"><p>Lihat Kategori</p></div><!-- judul -->
<table class="table" border="1">
<tr>
<td align="center">No</td>
<td align="center">Kategori</td>
<td align="center">Sampul</td>
<td align="center">Setting</td>
</tr>
<?php 
$data=$koneksi->tampil_kategori();
$no=1;
foreach($data as $array){
?>
<tr>
<td align="center"><?php echo $no;?></td>
<td align="center"><?php echo $array['categori'];?></td>
<td align="center"><?php echo $array['sampul'];?></td>
<td align="center">
<a href="?p=edit_kategori&id=<?php echo $array['id_kategori'];?>">Edit</a> |
<a href="?p=hapus_kategori&id=<?php echo $array['id_kategori'];?>">Hapus</a>
</td>
</tr>
<?php $no++;}?>
<tr>
<td colspan="10" align="center"><a href="?p=input_kategori"><button type="button">Kembali</button></a></td>
</tr>
</table>