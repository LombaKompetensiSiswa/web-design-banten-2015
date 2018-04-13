<form method="POST" enctype="multipart/form-data">
<div class="button"><input type="submit" name="button" value="Search"></div><!-- button -->
<div class="cari"><input type="text" name="cari" placeholder="Search . . ."></div>
</form>
<?php 
if(isset($_POST['button'])){
@$cari=$_POST['cari'];
if($cari==""){
echo"<script>alert('Masukan Pencarian');</script>";
}else{
echo"<script>document.location='?p=hasil&id=$cari';</script>";
}
}
?>