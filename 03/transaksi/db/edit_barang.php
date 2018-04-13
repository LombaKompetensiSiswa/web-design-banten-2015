<?php 
$data=$koneksi->select_barang();
foreach($data as $rec);
?>
<div class="judul"><p>Edit Barang</p></div><!-- barang -->
<form method="POST" enctype="multipart/form-data">
<table class="table">
<tr>
<td align="center">kategori</td>
<td><select name="kategori">
<option value="<?php echo $rec['id_kategori'];?>"><?php echo $rec['categori'];?></option>
<?php 
$data=$koneksi->tampil_kategori();
foreach($data as $array){
?>
<option value="<?php echo $array['id_kategori'];?>"><?php echo $array['categori'];?></option>
<?php } ?>
</select></td>
</tr>
<tr>
<td align="center">Nama Barang</td>
<td><input type="text" name="nama" placeholder="Nama Barang" value="<?php echo $rec['nama_barang'];?>"></td>
</tr>
<td align="center">Harga Barang</td>
<td><input type="text" name="harga" placeholder="Harga Barang" value="<?php echo $rec['harga'];?>"></td>
</tr>
<td align="center">Gambar</td>
<td><input type="file" name="gambar"></td>
</tr>
<td align="center">Spesifikasi Barang</td>
<td><input type="text" name="spesifikasi" placeholder="Spesifikasi Barang" value="<?php echo $rec['spesifikasi'];?>"></td>
</tr>
<tr>
<td colspan="10" align="center"><button type="submit" name="edit">Edit</button></td>
</tr>
</table>
</form>
<?php 
if(isset($_POST['edit'])){
$koneksi->edit_barang();
}
?>