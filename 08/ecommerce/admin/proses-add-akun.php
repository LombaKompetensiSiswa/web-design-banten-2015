<?php
include("../koneksi.php");
$nama=$_POST['nama'];
$email=$_POST['email'];
$username=$_POST['username'];
$password=$_POST['password'];
mysql_query("insert into admin values('','$nama','$email','$username','$password'");
?>
    <script type="text/javascript">
	alert("Data Telah DiTambah");
	document.location.href="index.php"
	</script>
