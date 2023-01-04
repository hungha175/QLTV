<?php
	require_once 'connect.php';
	$conn->query("DELETE FROM `supplier` WHERE `supplier_id` = '$_REQUEST[supplier_id]'") or die(mysqli_error());
	header("location: supplier.php");