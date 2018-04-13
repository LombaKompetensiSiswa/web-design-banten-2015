<?php
	$q = mysqli_query($db,"SELECT * FROM product where id_product = '$id_product'");
	$f = mysqli_fetch_array($q);
?>
<div class="box-right">
	<div class="box">
		<div class="box-heading-right">
			<h2 class="h-normal color-dark"> Product Detail </h2>
		</div>
			
		<div class="box-content">
			<div class="box-img-thumb">
				<img src="upload/produk/<?= $f[image] ?>">
				
			</div>
			
			<div class="box-desc">
				<div class="box-heading-product">
					<div class="box-col-two-small">
						<h3 class="h-bold color-dark"> <?= $f[title] ?> </h3>
						<p class="color-grey"> <?= $f[stok] ?> Available </p>
					</div>
					
					<div class="box-col-two-small">
						<h3 align="right" class="h-bold color-dark"> RP. <?= number_format($f[price]) ?> </h3>
					</div>
					
					<div class="box-detail">
						<p>  <?= $f[description] ?> </p>
						<br><br>
						
						<a href="index.php?page=cart&action=add&id_product=<?= $f[id_product] ?>" class="btn btn-blue btn-submit-cart"> Add To Cart </a>
					</div>

				</div>
				
					
			</div>
		</div>
	</div>
	
	<div class="box">&nbsp;</div>
	<div class="box">&nbsp;</div>
	<div class="box">&nbsp;</div>
	
	<div class="box">
		<div class="box-heading-right">
			<h2 class="h-normal color-dark"> Best Product </h2>
		</div>
		
		<div class="box-content">
			<div class="col-two">
				<div class="box-product">
					<div class="wrap-box">
						<div class="box-product-img">
							<img src="assets/img/nike-slim-polo.jpg">
						</div>
						<div class="box-info">
							<div class="box-col-two-small">
								<h3 class="h-bold"><a href="#" class="color-dark">Polo Shirt </a></h3>
								<p><a href="#" class="add color-grey"> Add to Cart </a></p>
							</div>
							
							<div class="box-col-two-small">
								<h3 class="h-bold color-dark"> RP. 120.000,00 </h3>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<div class="col-two">
				<div class="box-product">
					<div class="wrap-box">
						<div class="box-product-img">
							<img src="assets/img/nike-slim-polo.jpg">
						</div>
						<div class="box-info">
							<div class="box-col-two-small">
								<h3 class="h-bold"><a href="#" class="color-dark">Polo Shirt </a></h3>
								<p><a href="#" class="add color-grey"> Add to Cart </a></p>
							</div>
							
							<div class="box-col-two-small">
								<h3 class="h-bold color-dark"> RP. 120.000,00 </h3>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<div class="col-two">
				<div class="box-product">
					<div class="wrap-box">
						<div class="box-product-img">
							<img src="assets/img/nike-slim-polo.jpg">
						</div>
						<div class="box-info">
							<div class="box-col-two-small">
								<h3 class="h-bold"><a href="#" class="color-dark">Polo Shirt </a></h3>
								<p><a href="#" class="add color-grey"> Add to Cart </a></p>
							</div>
							
							<div class="box-col-two-small">
								<h3 class="h-bold color-dark"> RP. 120.000,00 </h3>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<div class="col-two">
				<div class="box-product">
					<div class="wrap-box">
						<div class="box-product-img">
							<img src="assets/img/nike-slim-polo.jpg">
						</div>
						<div class="box-info">
							<div class="box-col-two-small">
								<h3 class="h-bold"><a href="#" class="color-dark">Polo Shirt </a></h3>
								<p><a href="#" class="add color-grey"> Add to Cart </a></p>
							</div>
							
							<div class="box-col-two-small">
								<h3 class="h-bold color-dark"> RP. 120.000,00 </h3>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			
		</div>
	</div>
	
	
</div>