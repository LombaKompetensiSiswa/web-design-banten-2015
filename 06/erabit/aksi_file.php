<?php require_once('Connections/koneksi.php'); ?>
<?php
$id = $_POST['idd'];
if(isset($_POST['upload'])){move_uploaded_file($_FILES['foto']['tmp_name'],"aplod/".$id)}
?>
