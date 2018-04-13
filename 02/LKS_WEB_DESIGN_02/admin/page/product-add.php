
<div class="box">
	<div class="box-heading-right">
		<h2 class="h-normal color-dark"> Add Product </h2>
	</div>
	
	<div class="box-content">
		<table class="table-form">
<?php
	if(isset($_POST['add'])){
		$title = addslashes(strip_tags($_POST['title']));
		$stok = addslashes(strip_tags($_POST['stok']));
		$price = addslashes(strip_tags($_POST['price']));
		$description = addslashes(strip_tags($_POST['description']));
		$category = addslashes(strip_tags($_POST['category']));
		
		// img process
		$img_name = $_FILES['image']['name'];
		$img_size = $_FILES['image']['size'];
		$img_type = $_FILES['image']['type'];
		$img_tmp = $_FILES['image']['tmp_name'];
		$img_ext = end(explode(".",$_FILES['image']['name'])); // get extention type
		
		$path = "../upload/produk/"; // location to upload 
		
		$allow_ext = array("jpg","jpeg","png","gif"); // allow extention to upload
		$allow_type = array("image/jpg","image/jpeg","image/png","image/gif"); // allow type to upload
		
		if($title != "" && $stok != "" && $description != "" && $price != ""){
			if(in_array($img_ext,$allow_ext) && in_array($img_type,$allow_type) && $img_size <= 5000000){
				move_uploaded_file("$img_tmp",$path.$img_name);
				$pic = $img_name;
			}
			$q = mysqli_query($db,"INSERT INTO product SET title = '$title', stok = '$stok', description = '$description', price = '$price', id_category = '$category', image = '$pic', date = NOW()");
			if($q){
				header('location:index.php?page=product&action=list');
			} else {
				echo "<script> alert('Sorry, there is something wrong'); </script>";
			}
			
		}
	}
?>
		<form action="" method="POST" enctype="multipart/form-data">
			<tr>
				<td> Title Product </td>
				<td> : </td>
				<td><input type="text" name="title" class="form form-input" required></td>
			</tr>
			<tr>
				<td> Available Stok </td>
				<td> : </td>
				<td><input type="number" name="stok" class="form form-input" required></td>
			</tr>
			<tr>
				<td> Price </td>
				<td> : </td>
				<td><input type="text" name="price" class="form form-input" required></td>
			</tr>
			<tr>
				<td> Description </td>
				<td> : </td>
				<td><textarea name="description" class="form form-input form-textarea" required></textarea></td>
			</tr>
			<tr>
				<td> Category </td>
				<td> : </td>
				<td><select name="category" class="form form-input" required>
						<option selected disabled> -- Select Category -- </option>
				<?php
					$q_cat = mysqli_query($db,"SELECT * FROM category order by id asc");
					while($f_cat = mysqli_fetch_array($q_cat)){
				?>
					<option value="<?= $f_cat[id] ?>"> <?= $f_cat[title] ?></option>
				<?php
					}
				?>
					</select>
				</td>
			</tr>
			<tr>
				<td> Image </td>
				<td> : </td>
				<td><input type="file" name="image" class="" required></td>
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