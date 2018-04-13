<?php error_reporting(0); ?>
<?php session_start(); ?>
<?php 
if($_SESSION['id_author']==1){
include"db/admin.php";
}else if(!isset($_SESSION['id_author'])){
echo"<script>document.location='SA.php';</script>";
}else if($_SESSION['id_author']!==1){
include"user.php";
}
?>