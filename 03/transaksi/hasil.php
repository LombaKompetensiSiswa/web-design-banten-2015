<?php 
@$id=$_REQUEST['id'];
$query=mysql_query("select * from barang where nama_barang like'%$id%' ");
if($num=mysql_num_rows($query)){
while($array=mysql_fetch_array($query)){
?>
<div class="box">
<div class="gambar">
<img src="<?php echo $array['gambar'];?>">
<a href="?p=beli&id=<?php echo $array['id_barang'];?>"><button type="button">Beli Sekarang</button></a>
</div><!-- gambar -->
<p><?php echo $array['nama_barang'];?></p>
<div class="artikel">
<p>Harga :<?php echo $array['harga'];?></p>
<p> Spesifikasi Barang : <?php echo $array['spesifikasi'];?></p>
</div><!-- artikel -->
</div><!-- box -->
<?php }}else{echo"<center><font color='#336699'><h1>Hasil Pencarian Tidak Ditemukan</h1></font></center>";} ?>