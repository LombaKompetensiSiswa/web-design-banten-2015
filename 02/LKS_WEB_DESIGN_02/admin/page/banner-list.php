<!-- box table list -->
<div class="box">
<div class="box-heading-right">
	<h2 class="h-normal color-dark float-left"> Banner Slideshow </h2>
	<a href="index.php?page=banner&action=add" class="color-white btn btn-green float-right btn-read"> Add Slideshow </a>
</div>

<div class="box-content">
	<table class="table-list">
		<thead>
			<tr>
				<th> No </th>
				<th> Link </th>
				<th> Image </th>
				<th> Action </th>
			</tr>
		</thead>
		<tbody>
<?php
	$q = mysqli_query($db,"SELECT * FROM banner order by id asc");
	if(mysqli_num_rows($q) > 0){
	$no = 0;
		while($f = mysqli_fetch_array($q)){
		$no++;
?>

			<tr>
				<td> <?=  $no ?> </td>
				<td> <?=  $f[link] ?> </td>
				<td> <img src="upload/banner/<?=$f[image]?>" width="300"> </td>
				<td> <a href="index.php?page=banner&action=edit&id=<?= $f[id] ?>"> Edit </a>
						<a href="index.php?page=banner&action=delete&id=<?= $f[id] ?>" onclick="return confirm('Are you sure want delte this data ? ')"> Delete </a>
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