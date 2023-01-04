<?php
	require_once 'connect.php';
	$q_user = $conn->query("SELECT * FROM `user` WHERE `user_no` = '$_REQUEST[user_id]'") or die(mysqli_error());
	$f_user = $q_user->fetch_array();
?>
<div class = "col-lg-5">
    <div class = "col-lg-1"></div>
    <div class = "col-lg-10">
        <div class="img_user" >
            <img src="img/<?php echo $f_user['user_image']?>" style = "width = 100px;height:290px;">
        </div>
    </div>
</div>
<div class = "col-lg-6" style = "background-color:white;">
	<form method = "POST" action = "edit_user_query.php?user_id=<?php echo $f_student['user_id']?>" enctype = "multipart/form-data">	
		<div class = "form-group form-group__heading">Chi tiết độc giả</div>
		<div class = "form-group">	
			<label>Mã độc giả:</label>
			<p><?php echo $f_user['user_no']?></p>
		</div>	
		<div class = "form-group">	
			<label>Họ và tên:</label>
			<p><?php echo $f_user['firstname']?> <?php echo $f_user['middlename']?> <?php echo $f_user['lastname']?></p>
		</div>
		<div class = "form-group">
			<label>Năm sinh:</label>
			<p><?php echo $f_user['course']?></p>
		</div>	
		<div class = "form-group">	
			<label>Số điện thoại:</label>
			<p><?php echo $f_user['section']?></p>
		</div>		
	</form>		
</div>