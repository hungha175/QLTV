<?php
	require_once 'connect.php';
	$conn->query("DELETE FROM `user` WHERE `user_no` = '$_REQUEST[user_id]'") or die(mysqli_error());
	$conn->query("DELETE FROM `borrowing` WHERE `user_no` = '$_REQUEST[user_id]'") or die(mysqli_error());
	header('location: userpage.php');