<div class="daftar">
<div class="judul"><p>Register</p></div><!-- judul -->
<form method="POST" enctype="multipart/form-data">
<table class="table">
<tr>
<td align="center">Nama</td>
<td><input type="text" name="nama" placeholder="Nama"></td>
</tr>
<tr>
<td align="center">Email</td>
<td><input type="email" name="email" placeholder="Email"></td>
</tr>
<tr>
<td align="center">Password</td>
<td><input type="password" name="pass" placeholder="Password"></td>
</tr>
<tr>
<td align="center">Foto</td>
<td><input type="file" name="foto"></td>
</tr>
<tr>
<td colspan="10" align="center"><button type="submit" name="input">Register</button></td>
</tr>
</table>
</form>
</div><!-- daftar -->
<?php 
if(isset($_POST['input'])){
$koneksi->input_author();
}
?>