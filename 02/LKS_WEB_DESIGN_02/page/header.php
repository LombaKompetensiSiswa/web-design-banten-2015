<!-- start header -->
<header id="header">
	<img src="assets/img/logo.png">
	<h2> Handsome Shop </h2>
	
	<nav id="menubar">
		<li><a href="index.php?page=home"> Home </a></li>
		<li><a href="index.php?page=product"> Product </a></li>
		<li><a href="index.php?page=about"> About US </a></li>
		<li><a href="index.php?page=cart" id="btn-cart"> Cart(<?php
			echo mysqli_num_rows(mysqli_query($db,"SELECT * FROM cart
			INNER JOIN product ON product.id_product = cart.code_product"));
		?>) </a></li>
		<li><a href="index.php?page=login" id="btn-cart-green"> Login </a></li>
		<li>
	</nav>
</header>
<!-- end header -->