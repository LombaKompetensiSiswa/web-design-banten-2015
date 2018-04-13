<?php 
include("../koneksi.php");
$namatoko=$_POST['namatoko'];
$namapemilik=$_POST['namapemilik'];
$alamattoko=$_POST['alamattoko'];
$alamatpemilik=$_POST['alamatpemilik'];
$email=$_POST['email'];
$username=$_POST['username'];
$password=$_POST['password'];
mysql_query("insert into toko values('','$namatoko','$namapemilik','$alamattoko','$alamatpemilik','$email','$username','$password')") or die (mysql_error());
?>
    <script type="text/javascript">
	alert("Data Telah Ditambah, Silahkan Login ");
	document.location.href="login-toko.php"
	</script>
