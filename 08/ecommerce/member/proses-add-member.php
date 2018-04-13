<?php 
include("../koneksi.php");
$nama=$_POST['nama'];
$jk=$_POST['jk'];
$alamat=$_POST['alamat'];
$tlp=$_POST['tlp'];
$email=$_POST['email'];
$username=$_POST['username'];
$password=$_POST['password'];
mysql_query("insert into member values('','$nama','$jk','$alamat','$tlp','$email','$username','$password')") or die (mysql_error());
?>
    <script type="text/javascript">
	alert("Data Telah Ditambah, Silahkan Login ");
	document.location.href="../index.php"
	</script>
