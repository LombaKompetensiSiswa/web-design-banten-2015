<!-- box new product section -->
<div class="box">
	<div class="box-heading">
		<h2 class="h-normal color-dark"> New <strong>Product</strong> </h2>
	</div>
	<div class="box-content">
<?php
	$q = mysqli_query($db,"SELECT * FROM product order by date desc LIMIT 3");
	if(mysqli_num_rows($q) > 0){
		while($f = mysqli_fetch_array($q)){
?>
		<!-- column box product -->
		<div class="col-three">
			<div class="box-product">
				<div class="wrap-box">
					<div class="box-product-img">
						<img src="upload/produk/<?= $f[image] ?>">
					</div>
					<div class="box-info">
						<div class="box-col-two-small">
							<h3 class="h-bold"><a href="index.php?page=product&action=detail&id_product=<?= $f[id] ?>" class="color-dark"><?= $f[title] ?> </a></h3>
							<p><a href="index.php?page=cart&action=add&id_product=<?= $f[id] ?>" class="add color-grey"> Add to Cart </a></p>
						</div>
						
						<div class="box-col-two-small">
							<h3 class="h-bold color-dark float-right"> RP. <?= number_format($f[price]) ?> </h3>
						</div>
						
					
					</div>
				</div>
			</div>
		</div>
		<!-- end column box product -->
	<?php
		}
	}
?>
	
	</div>
</div>
<!-- end new product section -->

<!-- start best product section-->
	<div class="box">
	<div class="box-heading">
		<h2 class="h-normal color-dark"> Best <strong>Product</strong> </h2>
	</div>
	<div class="box-content">
<?php
	$q = mysqli_query($db,"SELECT * FROM product order by date asc LIMIT 3");
	if(mysqli_num_rows($q) > 0){
		while($f = mysqli_fetch_array($q)){
?>
		<div class="col-three">
			<div class="box-product">
				<div class="wrap-box">
					<div class="box-product-img">
						<img src="upload/produk/<?= $f[image] ?>">
					</div>
					<div class="box-info">
						<div class="box-col-two-small">
							<h3 class="h-bold"><a href="index.php?page=product&action=detail&id_product=<?= $f[id] ?>" class="color-dark"><?= $f[title] ?> </a></h3>
							<p><a href="index.php?page=cart&action=add&id_product=<?= $f[id] ?>" class="add color-grey"> Add to Cart </a></p>
						</div>
						
						<div class="box-col-two-small">
							<h3 class="h-bold color-dark float-right"> RP. <?= number_format($f[price]) ?> </h3>
						</div>
						
					
					</div>
				</div>
			</div>
		</div>
<?php
		}
	}
?>
		

	</div>
</div>
<!-- end best product section -->

<div class="shop">
	<a href="index.php?page=product" class="btn btn-blue btn-read color-white"> Shop Now </a>
</div>