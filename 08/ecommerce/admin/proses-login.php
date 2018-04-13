<?php session_start();
include("../koneksi.php");
$username=$_POST['username'];
$password=$_POST['password'];
$q=mysql_query("select * from admin where username='$username' and password='$password'") or die (mysql_error());
$data=mysql_fetch_array($q);
$cek=mysql_num_rows($q);
if($cek==1){
	?>
    <script type="text/javascript">
	alert("Login Berhasil Sebagai Administrator");
	document.location.href="index.php"
	</script>
    <?php
	$_SESSION['admin']=$username;
	$_SESSION['username']=$data['username'];
	$_SESSION['id']=$data['id'];
}else{
		?>
    <script type="text/javascript">
	alert("Login Gagal");
	document.location.href="wp-admin.php"
	</script>
    <?php
}
?>
