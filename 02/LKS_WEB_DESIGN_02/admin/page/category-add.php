
<div class="box">
	<div class="box-heading-right">
		<h2 class="h-normal color-dark"> Add Category </h2>
	</div>
	
	<div class="box-content">
		<table class="table-form">
<?php
	if(isset($_POST['add'])){
		$title = addslashes(strip_tags($_POST['title']));
		$description = addslashes(strip_tags($_POST['description']));
		
		
			$q = mysqli_query($db,"INSERT INTO category SET title = '$title', description = '$description'");
			if($q){
				header('location:index.php?page=category&action=list');
			} else {
				echo "<script> alert('Sorry, there is something wrong'); </script>";
			}
			
		}

?>
		<form action="" method="POST" enctype="multipart/form-data">
			<tr>
				<td> Title Category </td>
				<td> : </td>
				<td><input type="text" name="title" class="form form-input" required></td>
			</tr>
			<tr>
				<td> Description </td>
				<td> : </td>
				<td><textarea name="description" class="form form-input form-textarea" required></textarea></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td><input type="submit" name="add" class="btn btn-submit" value="ADD"></td>
			</tr>
		</table>
	</div>
</div> 
<!-- end form -->