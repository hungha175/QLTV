<?php
	require_once 'connect.php';
	if(ISSET($_POST['save_user'])){
		$user_no = $_POST['user_no'];
		$firstname = $_POST['firstname'];
		$middlename = $_POST['middlename'];
		$lastname = $_POST['lastname'];
		$course = $_POST['course'];
		$section = $_POST['section'];
		$user_image = $_FILES['user_image']['name'];
		$user_image_tmp = $_FILES['user_image']['tmp_name'];
		move_uploaded_file($user_image_tmp, 'img/'.$user_image);
		
		$sql = "INSERT INTO `user` VALUES('', '$user_no', '$firstname', '$middlename', '$lastname', '$course', '$section','$user_image')";
		if($conn->query($sql) == true )
		{
			echo'
				<script type = "text/javascript">
					alert("Tạo thành công");
					window.location = "user.php";
				</script>
			';
		}
		else
		{
			echo'
				<script type = "text/javascript">
					alert("Tạo không thành công");
					window.location = "user.php";
				</script>
			';
		}	
	}
?>