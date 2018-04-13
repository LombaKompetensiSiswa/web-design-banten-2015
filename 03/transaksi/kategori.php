<?php 
$data=$koneksi->tampil_kategori();
foreach($data as $array){
?>
<div class="box">
<div class="gambar">
<img src="<?php echo $array['sampul'];?>">
</div><!-- gambar --><br><br>
<p><a href="?p=categori&id=<?php echo $array['id_kategori'];?>"><?php echo $array['categori'];?></a></p>
</div><!-- box -->
<?php } ?>