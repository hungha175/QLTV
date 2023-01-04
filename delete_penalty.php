<?php
	require_once 'connect.php';
	$conn->query("DELETE FROM `penalty` WHERE `penalty_id` = '$_REQUEST[penalty_id]'") or die(mysqli_error());
	header("location: penaltypage.php");