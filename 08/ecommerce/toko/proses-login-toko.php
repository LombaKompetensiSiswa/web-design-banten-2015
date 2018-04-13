<?php session_start();
include("../koneksi.php");
$username=$_POST['username'];
$password=$_POST['password'];
$q=mysql_query("select * from toko where username='$username' and password='$password'") or die (mysql_error());
$data=mysql_fetch_array($q);
$cek=mysql_num_rows($q);
if($cek==1){
	?>
    <script type="text/javascript">
	alert("Login Berhasil Sebagai Tuan Toko");
	document.location.href="index.php"
	</script>
    <?php
	$_SESSION['toko']=$username;
	$_SESSION['username']=$data['username'];
}else{
		?>
    <script type="text/javascript">
	alert("Login Gagal");
	document.location.href="../index.php"
	</script>
    <?php
}
?>
