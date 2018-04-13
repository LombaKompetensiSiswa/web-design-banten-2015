<div class="widget">
<div class="judul"><p>Jam</p></div><!-- judul -->
<h2><?php echo date("H:i:s");?></h2>
</div><!-- widget -->

<div class="widget">
<div class="judul"><p>Kalender</p></div><!-- judul -->
<h2><?php echo date("j-F-Y");?></h2>
</div><!-- widget -->

<?php 
$counterfile="system/counter.txt";
if(!file_exists($counterfile)){
fopen($counterfile);
}
$file=fopen($counterfile,"r");
$counter=fread($file,10);
fclose($file);
$counter++;
$file=fopen($counterfile,"w");
fwrite($file,$counter);
fclose($file);
?>
<div class="widget">
<div class="judul"><p>Pengunjung</p></div><!-- judul -->
<h2><?php echo $counter;?></h2>
</div><!-- widget -->

<?php 
$data=$koneksi->select_anggota();
foreach($data as $array);
?>
<div class="widget">
<div class="judul"><p>Login</p></div><!-- judul -->
<center>
<?php if(isset($_SESSION['id_author'])){ ?>
<div class="image"><img src="<?php echo $array['foto'];?>"></div>
<div class="submit"><br>
<form method="POST">
<button type="submit" name="keluar">Log Out</button>
</form><br>
<?php 
if(isset($_POST['keluar'])){
$koneksi->keluar();
}
?>
</div><!-- submit -->
<?php }else{ ?>
<form method="POST" enctype="multipart/form-data">
<div class="input">
<input type="email" name="email" placeholder="Email">
<input type="password" name="pass" placeholder="Password">
</div><!-- input -->
<div class="submit">
<input type="submit" name="login" value="Login">
</form>
<p><a href="?p=daftar">Register Now</a></p>
</div><!-- submit -->
<?php } ?>
</center>
</div><!-- widget -->
<?php
if(isset($_POST['login'])){
$koneksi->login();
}
?>

<div class="widget">
<div class="judul"><p>Media Social</p></div><!-- judul -->
<div class="icon"><a href="http://www.faceboook.com/" target="_blank"><img src="img/logo/facebook.png"></a></div><!-- icon -->
<div class="icon"><a href="http://www.twitter.com/" target="_blank"><img src="img/logo/twitter.png"></a></div><!-- icon -->
<div class="icon"><a href="http://www.youtube.com/" target="_blank"><img src="img/logo/youtube.png"></a></div><!-- icon -->
</div><!-- widget -->