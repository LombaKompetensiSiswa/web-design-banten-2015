<!-- box table list -->
<div class="box">
<div class="box-heading-right">
	<h2 class="h-normal color-dark float-left"> List Product </h2>
	<a href="index.php?page=product&action=add" class="color-white btn btn-green float-right btn-read"> Add Data </a>
</div>

<div class="box-content">
	<table class="table-list">
		<thead>
			<tr>
				<th> No </th>
				<th> Name Product </th>
				<th> Description </th>
				<th> Available </th>
				<th> Image </th>
				<th> Action </th>
			</tr>
		</thead>
		<tbody>
<?php
	$q = mysqli_query($db,"SELECT * FROM product order by id_product asc");
	if(mysqli_num_rows($q) > 0){
	$no = 0;
		while($f = mysqli_fetch_array($q)){
		$no++;
?>

			<tr>
				<td> <?=  $no ?> </td>
				<td> <?=  $f[title] ?> </td>
				<td> <?=  $f[description] ?> </td>
				<td> <?=  $f[stok] ?> </td>
				<td><img src="../upload/produk/<?=  $f[image] ?>" width="150"></td>
				<td> <a href="index.php?page=product&action=edit&id=<?= $f[id_product] ?>"> Edit </a>
						<a href="index.php?page=product&action=delete&id=<?= $f[id_product] ?>" onclick="return confirm('Are you sure want delte this data ? ')"> Delete </a>
				</td>
			</tr>
<?php
		}
	} else {
		echo "Data is empty";
	}
?>

		</tbody>
	</table>
</div>
</div>