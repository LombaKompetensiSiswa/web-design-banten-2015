<?php 
include("../koneksi.php");
$idtoko=$_POST['idtoko'];
$namatoko=$_POST['namatoko'];
$namapemilik=$_POST['namapemilik'];
$alamattoko=$_POST['alamattoko'];
$alamatpemilik=$_POST['alamatpemilik'];
$email=$_POST['email'];
$username=$_POST['username'];
$password=$_POST['password'];
mysql_query("update toko set namatoko='$namatoko', namapemilik='$namapemilik', alamattoko='$alamattoko', alamatpemilik='$alamatpemilik', email='$email', username='$username', password='$password' where idtoko='$idtoko'") or die (mysql_error());
?>
    <script type="text/javascript">
	alert("Data Telah Di Update");
	document.location.href="index.php"
	</script>
