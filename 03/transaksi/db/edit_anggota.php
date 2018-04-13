<?php 
$data=$koneksi->select_anggota();
foreach($data as $array);
?>
<div class="judul"><p>Edit Anggota</p></div><!-- judul -->
<form method="POST" enctype="multipart/form-data">
<table class="table">
<tr>
<td align="center">Nama</td>
<td><input type="text" name="nama" placeholder="Nama" value="<?php echo $array['nama'];?>"></td>
</tr>
<tr>
<td align="center">Email</td>
<td><input type="email" name="email" placeholder="Email" value="<?php echo $array['email'];?>"></td>
</tr>
<tr>
<td align="center">Password</td>
<td><input type="password" name="pass" placeholder="Password" value="<?php echo $array['pass'];?>"></td>
</tr>
<tr>
<td align="center">Foto</td>
<td><input type="file" name="foto"></td>
</tr>
<tr>
<td colspan="10" align="center"><button type="submit" name="edit">Edit</button></td>
</tr>
</table>
</form>
<?php 
if(isset($_POST['edit'])){
$koneksi->edit_anggota();
}
?>