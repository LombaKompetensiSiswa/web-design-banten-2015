<?php 
$data=$koneksi->home();
foreach($data as $array){
?>
<div class="box">
<div class="gambar">
<img src="<?php echo $array['gambar'];?>">
<a href="?p=beli&id=<?php echo $array['id_barang'];?>"><button type="button">Beli Sekarang</button></a>
</div><!-- gambar -->
<p><?php echo $array['nama_barang'];?></p>
<div class="artikel">
<p>Harga : <?php echo $array['harga'];?></p>
<p> Spesifikasi Barang : <?php echo $array['spesifikasi'];?></p>
</div><!-- artikel -->
</div><!-- box -->
<?php } ?>