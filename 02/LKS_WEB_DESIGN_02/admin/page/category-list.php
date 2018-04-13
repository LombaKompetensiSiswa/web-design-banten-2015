<!-- box table list -->
<div class="box">
<div class="box-heading-right">
	<h2 class="h-normal color-dark float-left"> List Category </h2>
	<a href="index.php?page=category&action=add" class="color-white btn btn-green float-right btn-read"> Add Data </a>
</div>

<div class="box-content">
	<table class="table-list">
		<thead>
			<tr>
				<th> No </th>
				<th> Name Category </th>
				<th> Description </th>
				<th> Action </th>
			</tr>
		</thead>
		<tbody>
<?php
	$q = mysqli_query($db,"SELECT * FROM category order by id asc");
	if(mysqli_num_rows($q) > 0){
	$no = 0;
		while($f = mysqli_fetch_array($q)){
		$no++;
?>

			<tr>
				<td> <?=  $no ?> </td>
				<td> <?=  $f[title] ?> </td>
				<td> <?=  $f[description] ?> </td>
				<td> <a href="index.php?page=category&action=edit&id=<?= $f[id] ?>"> Edit </a>
						<a href="index.php?page=category&action=delete&id=<?= $f[id] ?>" onclick="return confirm('Are you sure want delte this data ? ')"> Delete </a>
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