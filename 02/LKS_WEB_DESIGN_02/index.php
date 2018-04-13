<?php
	require_once "config.php";
	error_reporting(0);
	$page = addslashes(strip_tags($_GET['page']));
	$action = addslashes(strip_tags($_GET['action']));
	$id_product = addslashes(strip_tags($_GET['id_product']));
	$msg = addslashes(strip_tags($_GET['msg']));
?>
<!DOCTYPE html>
<html>
<head>
	<title> Handsome Shop </title>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="assets/css/jquery.bxslider.css">
</head>
<body>
	<main>
		<?php include "page/header.php" ?>
		
		<?php
			include "page/slideshow.php";
			
		?>
		
		<!-- start content -->
		<section id="content">
			<!-- box search section -->
			<div class="box-search">
				<form action="index.php?page=product&action=search" method="POST">
					<input type="text" name="keyword" class="input-search" placeholder="Search Store..." required>
					<input type="submit" name="search" class="btn btn-blue btn-go" value="GO">
				</form>
			</div>
			<!-- end box search section -->
			
		<?php
			if($page == "" || $page == "home"){
				include "page/home.php";
			} else if($page == "cart"){
				include "page/cart.php";
			} else if($page == "login"){
				header("location:admin/");
			} else if($action == "" ){
				include "page/category.php";
				include "page/$page.php";
			} else 
			include "page/category.php";
			include "page/$page-$action.php";
		?>
		</section>
		<!-- end content -->
		
		<!-- footer -->
		<footer>
		`	<h3> Copyright &copy Handsome Shop. All Right Reserved </h3>
		</footer>
		<!-- end footer -->
	</main>
	<script src="assets/js/jquery-1.8.2.min.js"></script>
	<script src="assets/js/jquery.bxslider.js"></script>
	<script>
		$(document).ready(function(){
			$('.bxslider').bxSlider();
		});
	</script>
</body>
</html>