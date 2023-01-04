<?php
	header("Content-type: text/html; charset=utf-8");
	$conn = new mysqli('localhost', 'root', '', 'db_ls') or die(mysqli_error());
	mysqli_set_charset($conn, 'UTF8');
	if(!$conn){
		die("kết nối thất bại");
	}
	session_start();
	
?>