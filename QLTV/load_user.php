<?php
	require_once 'connect.php';
	$q_user = $conn->query("SELECT * FROM `user` WHERE `user_no` = '$_REQUEST[user_id]'") or die(mysqli_error());
	$f_user = $q_user->fetch_array();
?>
<div class = "col-lg-3"></div> 
<div class = "col-lg-6">
	<form method = "POST" action = "edit_user_query.php?user_id=<?php echo $f_user['user_id']?>" enctype = "multipart/form-data">	
		<div class = "form-group form-group__heading">Chỉnh sửa thông tin độc giả</div>
		<div class = "form-group">	
			<label>Mã độc giả:</label>
			<input type = "text" name = "user_no" maxlength = "10" value = "<?php echo $f_user['user_no']?>" required = "required" class = "form-control" />
		</div>	
		<div class = "form-group">	
			<label>Họ:</label>
			<input type = "text" name = "firstname" value = "<?php echo $f_user['firstname']?>" required = "required" class = "form-control" />
		</div>
		<div class = "form-group">	
			<label>Tên đệm:</label>
			<input type = "text" name = "middlename" value = "<?php echo $f_user['middlename']?>" placeholder = "(Optional)" class = "form-control" />
		</div>	
		<div class = "form-group">	
			<label>Tên:</label>
			<input type = "text" required = "required" value = "<?php echo $f_user['lastname']?>" name = "lastname" class = "form-control" />
		</div>
		<div class = "form-group">
			<label>Năm sinh:</label>
			<input type = "text" required = "required" value = "<?php echo $f_user['course']?>" name = "course" class = "form-control" />
		</div>	
		<div class = "form-group">	
			<label>Số điện thoại:</label>
			<input type = "text" maxlength = "12" name = "section" value = "<?php echo $f_user['section']?>" required = "required" class = "form-control" />
		</div>
		<div class = "form-group">	
			<label>Hình ảnh:</label>
			<input type = "file"  name = "user_image" value = "<?php echo $f_user['user_image']?>" required = "required"  />
		</div>
		<div class = "form-group">	
			<button class = "btn btn-success btn__style" name = "edit_user" style = "border-radius:50px;outline:none;"> Lưu</button>
		</div>
	</form>		
</div>