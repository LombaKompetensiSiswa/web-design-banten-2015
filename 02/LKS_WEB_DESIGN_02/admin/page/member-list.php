<!-- box table list -->
<div class="box">
<div class="box-heading-right">
	<h2 class="h-normal color-dark float-left"> List Member </h2>
	<a href="index.php?page=member&action=add" class="color-white btn btn-green float-right btn-read"> Add Member </a>
</div>

<div class="box-content">
	<table class="table-list">
		<thead>
			<tr>
				<th> No </th>
				<th> Username </th>
				<th> Fullname </th>
				<th> Level </th>
				<th> Action </th>
			</tr>
		</thead>
		<tbody>
<?php
	$q = mysqli_query($db,"SELECT * FROM users order by id asc");
	if(mysqli_num_rows($q) > 0){
	$no = 0;
		while($f = mysqli_fetch_array($q)){
		$no++;
?>

			<tr>
				<td> <?=  $no ?> </td>
				<td> <?=  $f[username] ?> </td>
				<td> <?=  $f[fullname] ?> </td>
				<td> <?= $f[level] ?> </td>
				<td> <a href="index.php?page=member&action=edit&id=<?= $f[id] ?>"> Edit </a>
				<?php 
					if(isset($_SESSION[username]) && $_SESSION[username] == $f[username]){
						echo "";
					} else {
				?>			
					<a href="index.php?page=category&action=delete&id=<?= $f[id] ?>" onclick="return confirm('Are you sure want delte this data ? ')"> Delete </a>
				<?php } ?>
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