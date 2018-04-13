<?php
if(!isset($_POST['save'])){
	include("../koneksi.php");
	$idbarang=$_POST['idbarang'];
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
	mysql_query("update barang set namabarang='$namabarang', gambar='$lokasi', harga='$harga', deskripsi='$deskripsi', idtoko='$idtoko', idkategori='$idkategori', stok='$stok' where idbarang='$idbarang'") or die(mysql_error());
}
?>
    <script type="text/javascript">
	alert("Barang Telah Di Ubah");
	document.location.href="kelola-barang.php"
	</script>
