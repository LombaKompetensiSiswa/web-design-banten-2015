<?php
	if(isset($_POST['search'])){
		$keyword = $_POST['keyword'];
?>

	
<div class="box-right">

	<div class="box">
		<div class="box-heading-right">
			<h2 class="h-normal color-dark"> Search Product By " <?= $keyword ?> " </h2>
		</div>
		
		<div class="box-content">
<?php
	$q = mysqli_query($db,"SELECT * FROM product where title LIKE '%$keyword%' order by id_product desc");
		if(mysqli_num_rows($q) == 0){
			echo "<h3 class='h-normal color-dark'> Sorry, product not found </h3>";
		} else {
			while($f = mysqli_fetch_array($q)){
?>

			<div class="col-two">
				<div class="box-product">
					<div class="wrap-box">
						<div class="box-product-img">
							<a href="index.php?page=product&action=detail&id_product=<?= $f[id_product] ?>"><img src="upload/produk/<?= $f[image] ?>"></a>
						</div>
						<div class="box-info">
							<div class="box-col-two-small">
								<h3 class="h-bold"><a href="index.php?page=product&action=detail&id_product=<?= $f[id_product] ?>" class="color-dark"> <?= $f[title] ?> </a></h3>
								<p><a href="page/cart-add.php?id_product=<?= $f[id_product] ?>" class="add color-grey"> Add to Cart </a></p>
							</div>
							
							<div class="box-col-two-small">
								<h3 class="h-bold color-dark float-right"> RP. <?= number_format($f[price]),00 ?> </h3>
							</div>
						</div>
					</div>
				</div>
			</div>
<?php			}
			}
		}
?>
		</div>
	</div>
</div>