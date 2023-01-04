<?php
	require_once 'connect.php';
	if(ISSET($_POST['edit_user'])){
		$user_id = $_REQUEST['user_id'];
		$user_no = $_POST['user_no'];
		$firstname = $_POST['firstname'];
		$middlename = $_POST['middlename'];
		$lastname = $_POST['lastname'];
		$course = $_POST['course'];
		$section = $_POST['section'];
		$user_image = $_FILES['user_image']['name'];
		$user_image_tmp = $_FILES['user_image']['tmp_name'];
		move_uploaded_file($user_image_tmp, 'img/'.$user_image);

		$sql = "UPDATE `user` SET `user_no` = '$user_no', `firstname` = '$firstname', `middlename` = '$middlename', `lastname` = '$lastname', `course` = '$course', `section` = '$section', `user_image` = '$user_image' WHERE `user_id` = '$user_id'";
		if($conn->query($sql) == true )
		{
			echo'
				<script type = "text/javascript">
					alert("Lưu thành công");
					window.location = "userpage.php";
				</script>
			';
		}
		else
		{
			echo'
			<script type = "text/javascript">
				alert("Lưu không thành công");
				window.location = "userpage.php";
			</script>
		';
		}		
	}	
?>