<?php
	$q_s = mysqli_query($db,"SELECT * FROM category where id = '$id'");
	$f_s = mysqli_fetch_array($q_s);
?>
<div class="box">
	<div class="box-heading-right">
		<h2 class="h-normal color-dark"> Edit Category </h2>
	</div>
	
	<div class="box-content">
		<table class="table-form">
<?php
	if(isset($_POST['edit'])){
		$title = addslashes(strip_tags($_POST['title']));
		$description = addslashes(strip_tags($_POST['description']));
		
			$q = mysqli_query($db,"UPDATE category SET title = '$title', description = '$description' where id = '$id'");
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
				<td><input type="text" name="title" class="form form-input" value="<?= $f_s[title] ?>" required></td>
			</tr>
			<tr>
				<td> Description </td>
				<td> : </td>
				<td><textarea name="description" class="form form-input form-textarea" required><?= $f_s[description] ?></textarea></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td><input type="submit" name="edit" class="btn btn-submit" value="EDIT"></td>
			</tr>
		</table>
	</div>
</div> 
<!-- end form -->