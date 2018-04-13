<div class="judul"><p>Tambahkan Barang</p></div><!-- barang -->
<form method="POST" enctype="multipart/form-data">
<table class="table">
<tr>
<td align="center">kategori</td>
<td><select name="kategori">
<option value="0">- Pilih salah satu -</option>
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
<td><input type="text" name="nama" placeholder="Nama Barang"></td>
</tr>
<tr>
<td align="center">Harga Barang</td>
<td><input type="text" name="harga" placeholder="Harga Barang"></td>
</tr>
<tr>
<td align="center">Gambar</td>
<td><input type="file" name="gambar"></td>
</tr>
<tr>
<td align="center">Spesifikasi Barang</td>
<td><input type="text" name="spesifikasi" placeholder="Spesifikasi Barang"></td>
</tr>
<tr>
<td colspan="10" align="center"><button type="submit" name="input">Tambahkan</button></td>
</tr>
</table>
</form>
<?php 
if(isset($_POST['input'])){
$koneksi->input_barang();
}
?>