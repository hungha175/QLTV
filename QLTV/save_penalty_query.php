<?php
	require_once 'connect.php';
	if(ISSET($_POST['save_penalty'])){
		$penalty_name = $_POST['penalty_name'];
		$penalty_date = $_POST['penalty_date'];
		$penalty_fine = $_POST['penalty_fine'];
		$penalty_reason = $_POST['penalty_reason'];

		$sql = "INSERT INTO `penalty` VALUES('', '$penalty_name', '$penalty_date','$penalty_fine','$penalty_reason')";
		if($conn->query($sql) == true) 
		{
			echo'
				<script type = "text/javascript">
					alert("Thêm thành công");
					window.location = "penalty.php";
				</script>
			';
		}
		else
		{
			echo'
				<script type = "text/javascript">
					alert("Thêm không thành công");
					window.location = "penalty.php";
				</script>
			';
		}
		
	}
?>