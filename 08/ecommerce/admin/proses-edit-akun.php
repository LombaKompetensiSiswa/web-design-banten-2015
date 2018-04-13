<?php
include("../koneksi.php");
$idadmin=$_POST['idadmin'];
$nama=$_POST['nama'];
$email=$_POST['email'];
$username=$_POST['username'];
$password=$_POST['password'];
mysql_query("update admin set nama='$nama', email='$email', username='$username', password='$password' where idadmin='$idadmin'");
?>
    <script type="text/javascript">
	alert("Data Telah Di Ubah");
	document.location.href="index.php"
	</script>
