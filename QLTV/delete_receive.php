<?php
	require_once 'connect.php';
	$conn->query("DELETE FROM `receive` WHERE `receive_id` = '$_REQUEST[receive_id]'") or die(mysqli_error());
	header("location: receive.php");