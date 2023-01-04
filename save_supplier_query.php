<?php
	require_once 'connect.php';
	if(ISSET($_POST['save_supplier'])){
		$supplier_name = $_POST['supplier_name'];
		$supplier_add = $_POST['supplier_add'];
		$supplier_phone = $_POST['supplier_phone'];

		$sql = "INSERT INTO `supplier` VALUES('', '$supplier_name', '$supplier_add', '$supplier_phone')";
		if($conn->query($sql) == true)
		{
			echo'
				<script type = "text/javascript">
					alert("Thêm thành công");
					window.location = "supplier.php";
				</script>
			';
		}
		else
		{
			echo'
				<script type = "text/javascript">
					alert("Thêm không thành công");
					window.location = "supplier.php";
				</script>
			';
		}	
	}
?>