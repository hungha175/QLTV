
<?php
	require_once 'connect.php';
	if(ISSET($_POST['edit_supplier'])){
		$supplier_name = $_POST['supplier_name'];
		$supplier_add = $_POST['supplier_add'];
		$supplier_phone = $_POST['supplier_phone'];
		$conn->query("UPDATE `supplier` SET `supplier_name` = '$supplier_name', `supplier_add` = '$supplier_add', `supplier_phone` = '$supplier_phone' WHERE `supplier_id` = '$_REQUEST[supplier_id]'") or die(mysqli_error());
		echo '
		<script type = "text/javascript">
			alert("Lưu thành công");
			window.location = "supplier.php";
		</script>
		';	
	}