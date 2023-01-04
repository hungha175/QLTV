<?php
	require_once 'connect.php';
	if(!ISSET($_POST['user_no'])){	
		echo '
			<script type = "text/javascript">
				alert("Vui lòng chọn độc giả");
				window.location = "borrowing.php";
			</script>
		';
	}else{
		if(!ISSET($_POST['selector'])){
			echo '
				<script type = "text/javascript">
					alert("Vui lòng chọn sách");
					window.location = "borrowing.php";
				</script>
			';
		}else{
			foreach($_POST['selector'] as $key=>$value){
				$book_qty = $value;
				$user_no = $_POST['user_no'];
				$book_id = $_POST['book_id'][$key];
				$date = date("Y-m-d", strtotime("+7 HOURS"));
				$sql = "INSERT INTO `borrowing` VALUES('', '$book_id', '$user_no', '$book_qty', '$date', 'Đang mượn')";
				if($conn->query($sql) == true )
				{
					echo '
						<script type = "text/javascript">
							alert("Mượn thành công");
							window.location = "borrowing.php";
						</script>
					';
				}
				else
				{
					echo '
						<script type = "text/javascript">
							alert("Mượn không thành công");
							window.location = "borrowing.php";
						</script>
					';
				}
			}
		}	
	}	