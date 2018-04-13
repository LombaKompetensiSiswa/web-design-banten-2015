<?php 
include("../koneksi.php");
$idmember=$_POST['idmember'];
$nama=$_POST['nama'];
$jk=$_POST['jk'];
$alamat=$_POST['alamat'];
$tlp=$_POST['tlp'];
$email=$_POST['email'];
$username=$_POST['username'];
$password=$_POST['password'];
mysql_query("update member set nama='$nama', jk='$jk', alamat='$alamat', tlp='$tlp', email='$email', username='$username', password='$password' where idmember='$idmember'") or die (mysql_error());
?>
    <script type="text/javascript">
	alert("Data Telah Di Ubah");
	document.location.href="index.php"
	</script>
