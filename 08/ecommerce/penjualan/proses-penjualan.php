<?php 
include("../koneksi.php");
$idbarang=$_POST['idbarang'];
$idtoko=$_POST['idtoko'];
$idmember=$_POST['idmember'];
$jumlah=$_POST['jumlah'];
$tgl=date('y-m-d');
mysql_query("insert into pembelian values('','$idbarang','$idtoko','$idmember','$jumlah','$tgl')")or die(mysql_error());
?>
    <script type="text/javascript">
	alert("Barang Telah Dibeli");
	document.location.href="troly.php"
	</script>
