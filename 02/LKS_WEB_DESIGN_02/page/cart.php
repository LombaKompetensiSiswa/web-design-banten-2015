
<div class="box">&nbsp;</div>
<div class="box">&nbsp;</div>

<div class="box">
<?php

	if(isset($msg) && $msg == "success"){
		echo $msg;
	} else {
		echo $msg;
	}
	$q = mysqli_query($db,"SELECT * FROM cart
	INNER JOIN product ON product.id_product = cart.code_product
	order by id desc");
	if(mysqli_num_rows($q) == 0){
		echo "Cart is empty";
	} else {
?>
	
	<table class="table-cart">
		<thead>
			<tr>
				<th> Item </th>
				<th> Total </th>
				<th> Price </th>
				<th></th>
			</tr>
		</thead>
		<tbody>
<?php

	while($f = mysqli_fetch_array($q)){
	$price= $f[price];
	$sum = $price*$f[total];
	$price_format = number_format($sum);
	$id_product = $f[code_product];
	$total = $total + $sum;
	
?>
			<tr>
				<td> <?= $f[title] ?> </td>
				<td> <?= $f[total] ?> </td>
				<td> RP <?= $price_format. ",00" ?> </td>
				<td><a href="page/cart-delete.php?id_product=<?= $f[code_product] ?>" class="btn-x" title="Remove Item"> X </a></td>
			</tr>
<?php
		}
	}

?>
		</tbody>
	</table>

	<h1 class="h-normal color-dark float-left"> Sub Total = Rp. <?= number_format($total) .",00"?> </h1>
	<a href="page/checkout.php?msg=1&id_product=<?= $id_product ?>" class="btn btn-green btn-read color-white float-right"> Checkout </a>
</div>