
<div class="box">
	<div class="box-heading-right">
		<h2 class="h-normal color-dark"> Add Slideshow </h2>
	</div>
	
	<div class="box-content">
		<table class="table-form">
<?php
	if(isset($_POST['add'])){
		$link = addslashes(strip_tags($_POST['link']));
		
		// img process
		$img_name = $_FILES['image']['name'];
		$img_size = $_FILES['image']['size'];
		$img_type = $_FILES['image']['type'];
		$img_tmp = $_FILES['image']['tmp_name'];
		$img_ext = end(explode(".",$_FILES['image']['name'])); // get extention type
		
		$path = "../upload/banner/"; // location to upload 
		
		$allow_ext = array("jpg","jpeg","png","gif"); // allow extention to upload
		$allow_type = array("image/jpg","image/jpeg","image/png","image/gif"); // allow type to upload
		
		if($title != "" && $stok != "" && $description != "" && $price != ""){
			if(in_array($img_ext,$allow_ext) && in_array($img_type,$allow_type) && $img_size <= 5000000){
				move_uploaded_file("$img_tmp",$path.$img_name);
				$pic = $img_name;
			}
			$q = mysqli_query($db,"INSERT INTO banner SET link = '$title', image = '$pic'");
			if($q){
				header('location:index.php?page=banner&action=list');
			} else {
				echo "<script> alert('Sorry, there is something wrong'); </script>";
			}
			
		}
	}
?>
		<form action="" method="POST" enctype="multipart/form-data">
			<tr>
				<td> Link</td>
				<td> : </td>
				<td><input type="text" name="link" class="form form-input" required></td>
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