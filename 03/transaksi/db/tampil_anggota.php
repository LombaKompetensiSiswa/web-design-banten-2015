<div class="judul"><p>Anggota</p></div><!-- anggota -->
<table class="table" border="1">
<tr>
<td align="center">No</td>
<td align="center">Nama</td>
<td align="center">Email</td>
<td align="center">Password</td>
<td align="center">Status</td>
<td align="center">Setting</td>
</tr>
<?php 
$data=$koneksi->tampil_anggota();
$no=1;
foreach($data as $array){
?>
<tr>
<td align="center"><?php echo $no;?></td>
<td align="center"><?php echo $array['nama'];?></td>
<td align="center"><?php echo $array['email'];?></td>
<td align="center"><?php echo $array['pass']=substr(md5($array['pass']),0,5)?></td>
<td align="center"><?php echo $array['ket'];?></td>
<td align="center">
<?php if($array['id_author']==$_SESSION['id_author']){ ?>
<a href="?p=edit_anggota&id=<?php echo $array['id_author'];?>">Edit</a> |
<a href="?p=hapus_anggota&id=<?php echo $array['id_author'];?>">Hapus</a>
<?php }else{echo"&nbsp;";}?>
</td>
</tr>
<?php $no++;} ?>
</table>