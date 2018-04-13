<?php
include("../koneksi.php");
$id=$_GET['id'];
mysql_query("delete from member where idmember='$id'");
?>
    <script type="text/javascript">
	alert("Akun Dihapus");
	document.location.href="index.php"
	</script>
