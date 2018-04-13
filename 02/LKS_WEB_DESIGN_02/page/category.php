<!-- start aside -->
<aside>
	<div class="box bg-grey">

			<h3 class="h-bold color-dark"> Category </h3>

		<div class="box-content">
			<nav class="category">
		<?php
			$q = mysqli_query($db,"SELECT * FROM category order by id asc");
			if(mysqli_num_rows($q) > 0){
				while($f = mysqli_fetch_array($q)){
		?>
				<li><a href="index.php?page=product&id_cat=<?= $f[id] ?>"> <?= $f[title] ?> </a></li>
		<?php
				}
			}
		?>
			</nav>
		</div>
	</div>
	
	<div class="box">&nbsp;</div>
	
	<div class="box">
		<div class="box-heading-right">
			<h2 class="h-normal color-dark"> Your Cart </h2>
		</div>
		
		<div class="box-content">
		<h2 class="h-normal color-dark"> <?php echo mysqli_num_rows(mysqli_query($db,"SELECT * FROM cart INNER JOIN product ON product.id_product = cart.code_product"))  ?> Item </h2><br>
			<a href="index.php?page=cart" class="color-white btn btn-blue btn-aside"> View Cart </a>
			<a href="#" class="color-white btn btn-green btn-aside"> Checkout </a>
		</div>
	</div>
	
	<div class="box box-social-media">
		<div class="box-heading-right">
			<h2 class="h-normal color-dark"> Social Media </h2>
		</div>
		
		<div class="box-content">
			<div class="box-social-media">
				<div class="social"><img src="assets/img/t.png"></div>
			</div>
			
			<div class="box-social-media">
				<div class="social"><img src="assets/img/f.png"></div>
			</div>
			
			<div class="box-social-media">
				<div class="social"><img src="assets/img/y.png"></div>
			</div>
		</div>
	</div>

</aside>
<!-- end aside -->