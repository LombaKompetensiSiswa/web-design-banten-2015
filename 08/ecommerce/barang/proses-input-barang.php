<?php
if(!isset($_POST['save'])){
	include("../koneksi.php");
	$namabarang=$_POST['namabarang'];
	$gambar=$_FILES['gambar']['name'];
	$harga=$_POST['harga'];
	$deskripsi=$_POST['deskripsi'];
	$idtoko=$_POST['idtoko'];
	$idkategori=$_POST['idkategori'];
	$stok=$_POST['stok'];
	$namafile=$namabarang.".jpg";
	$lokasi="gambar/".$namafile;
	move_uploaded_file($_FILES['gambar']['tmp_name'], "../gambar/".$namafile);
	mysql_query("insert into barang values('','$namabarang','$lokasi','$harga','$deskripsi','$idtoko','$idkategori','$stok')") or die(mysql_error());
}
?>
    <script type="text/javascript">
	alert("Barang Telah Di Input");
	document.location.href="kelola-barang.php"
	</script>
