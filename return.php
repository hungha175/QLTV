<?php
	require_once 'connect.php';
	$date = date("Y-m-d", strtotime("+7 HOURS"));
	$conn->query("UPDATE `borrowing` SET `status` = 'Đã trả', `date` = '$date' WHERE `borrow_id` = '$_POST[borrow_id]'") or die(mysqli_error());
	header('location: bookreturn.php');
?>