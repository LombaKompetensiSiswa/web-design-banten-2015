<div class="judul"><p>Tambahkan Kategori</p></div><!-- judul -->
<form method="POST" enctype="multipart/form-data">
<table class="table">
<tr>
<td align="center">Kategori</td>
<td><input type="text" name="kategori" placeholder="Kategori"></td>
</tr>
<tr>
<td align="center">Sampul</td>
<td><input type="file" name="sampul"></td>
</tr>
<tr>
<td colspan="10" align="center"><button type="submit" name="input">Tambahkan</button></td>
</tr>
</table>
</form>
<?php 
if(isset($_POST['input'])){
$koneksi->input_kategori();
}
?>