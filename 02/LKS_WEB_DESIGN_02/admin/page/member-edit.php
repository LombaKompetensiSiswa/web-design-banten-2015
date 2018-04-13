<?php
	$q_s = mysqli_query($db,"SELECT * FROM users where id = '$id'");
	$f_s = mysqli_fetch_array($q_s);
?>
<div class="box">
	<div class="box-heading-right">
		<h2 class="h-normal color-dark"> Edit Member </h2>
	</div>
	
	<div class="box-content">
		<table class="table-form">
<?php
	if(isset($_POST['edit'])){
		$username = addslashes(strip_tags($_POST['username']));
		$password_real = addslashes(strip_tags($_POST['password']));
		$pass_ect = md5($password_real);
		$fullname = addslashes(strip_tags($_POST['fullname']));
		$level = addslashes(strip_tags($_POST['level']));
		
		
		
		
			$q = mysqli_query($db,"UPDATE users SET username = '$username',password = '$pass_ect' , password_real = '$password_real', fullname = '$fullname', level = '$level' where id = '$id'");
			if($q){
				header('location:index.php?page=member&action=list');
			} else {
				echo "<script> alert('Sorry, there is something wrong'); </script>";
			}
			
		}
?>
		<form action="" method="POST" enctype="multipart/form-data">
			<tr>
				<td> Username </td>
				<td> : </td>
				<td><input type="text" name="username" class="form form-input" value="<?= $f_s[username] ?>" required></td>
			</tr>
			<tr>
				<td> Password </td>
				<td> : </td>
				<td><input type="text" name="password" class="form form-input" value="<?= $f_s[password_real] ?>" required></td>
			</tr>
			<tr>
				<td> Full Name </td>
				<td> : </td>
				<td><input type="text" name="fullname" class="form form-input" value="<?= $f_s[fullname] ?>" required></td>
			</tr>
			<tr>
				<td> Level </td>
				<td> : </td>
				<td><select name="level" class="form form-input" required>
						<option selected disabled> Choose Level </option>
						<option value="admin"> Administrator </option>
						<option value="member"> Member </option>
					</select>
				
				</td>
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