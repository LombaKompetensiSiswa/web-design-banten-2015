<?php 
include("../koneksi.php");
$id=$_GET['id'];
mysql_query("delete from barang where idbarang='$id'")or die(mysql_error());
?>
    <script type="text/javascript">
	alert("Data Telah Dihapus");
	document.location.href="kelola-barang.php"
	</script>
