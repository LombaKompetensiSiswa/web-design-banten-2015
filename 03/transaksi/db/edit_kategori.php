<?php 
$data=$koneksi->select_kategori();
foreach($data as $array);
?>
<div class="judul"><p>Edit Kategori</p></div><!-- judul -->
<form method="POST" enctype="multipart/form-data">
<table class="table">
<tr>
<td align="center">Kategori</td>
<td><input type="text" name="kategori" placeholder="Kategori" value="<?php echo $array['categori'];?>"></td>
</tr>
<tr>
<td align="center">Sampul</td>
<td><input type="file" name="sampul"></td>
</tr>
<tr>
<td colspan="10" align="center"><button type="submit" name="edit">Edit</button></td>
</tr>
</table>
</form>
<?php 
if(isset($_POST['edit'])){
$koneksi->edit_kategori();
}
?>