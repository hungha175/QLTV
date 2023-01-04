
<?php
	require_once 'connect.php';
		$book_id = $_REQUEST['penalty_id'];

		if(ISSET($_POST['edit_penalty'])){
			$penalty_name = $_POST['penalty_name'];
			$penalty_date = $_POST['penalty_date'];
			$penalty_fine = $_POST['penalty_fine'];
			
			$sql ="UPDATE `penalty` SET 
			`penalty_name` = '$penalty_name', 
			`penalty_date` = '$penalty_date', 
			`penalty_fine` = '$penalty_fine',
			`penalty_reason` = '$penalty_reason'
			WHERE `penalty_id` = $penalty_id";
			if($conn->query($sql) == true )
			{
					echo '
				<script type = "text/javascript">
					alert("Lưu thành công");
					window.location = "penalty.php";
				</script>
				';
			}
			else
			{
				echo '
				<script type = "text/javascript">
					alert("Lưu không thành công");
					window.location = "penalty.php";
				</script>
				';
			}
			
			
		}
