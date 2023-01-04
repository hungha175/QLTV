<?php
	require_once 'connect.php';
	if(ISSET($_POST['save_receive'])){
		$receive_name = $_POST['receive_name'];
		$receive_date = $_POST['receive_date'];
		$receive_qty = $_POST['receive_qty'];
		$receive_price = $_POST['receive_price'];
		

		$sql = "INSERT INTO `receive` VALUES('', '$receive_name', '$receive_date','$receive_qty','$receive_price')";
		if($conn->query($sql) == true) 
		{
			echo'
				<script type = "text/javascript">
					alert("Thêm thành công");
					window.location = "receive.php";
				</script>
			';
		}
		else
		{
			echo'
				<script type = "text/javascript">
					alert("Thêm không thành công");
					window.location = "receive.php";
				</script>
			';
		}
		
	}
?>