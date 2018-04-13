<?php
include("../koneksi.php");
$kategori=$_POST['kategori'];
mysql_query("insert into kategori values('','$kategori')");
?>
    <script type="text/javascript">
	alert("Kategori Telah Ditambahkan");
	document.location.href="../toko/index.php"
	</script>
