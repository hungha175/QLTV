<?php
	require_once 'connect.php';
	$q_supp = $conn->query("SELECT * FROM `supplier` WHERE `supplier_id` = '$_REQUEST[supplier_id]'") or die(mysqli_error());
	$f_supp = $q_supp->fetch_array();
?>
<div class = "col-lg-3"></div>
<div class = "col-lg-6">
	<form method = "POST" action = "edit_supplier_query.php?supplier_id=<?php echo $f_supp['supplier_id']?>" enctype = "multipart/form-data">
		<div class = "form-group form-group__heading">Chỉnh sửa thông tin nhà cung cấp </div>
		<div class = "form-group">
			<label>Nhà cung cấp:</label>
			<input type = "text" value = "<?php echo $f_supp['supplier_name']?>" name = "supplier_name" required = "required" class = "form-control" />
		</div>
		<div class = "form-group">
			<label>Địa chỉ:</label>
			<input type = "text" name = "supplier_add" value = "<?php echo $f_supp['supplier_name']?>" class = "form-control" required = "required"/>
		</div>
		<div class = "form-group">
			<label>Số điện thoại:</label>
			<input type = "text" name = "supplier_phone" value = "<?php echo $f_supp['supplier_phone']?>" class = "form-control" required = "required" />
		</div>
		<div class = "form-group">
			<button name = "edit_supplier" class = "btn btn-success btn__style" style = "border-radius:50px;outline:none;">Lưu</button>
		</div>
	</form>		
</div>