<?php
	require_once 'connect.php';
	if(ISSET($_POST['save_book'])){
		$book_title = $_POST['book_title'];
		$book_desc = $_POST['book_desc'];
		$book_category = $_POST['book_category'];
		$book_author = $_POST['book_author'];
		$date_publish = $_POST['date_publish'];
		$qty = $_POST['qty'];
		$book_image = $_FILES['book_image']['name'];
		$book_image_tmp = $_FILES['book_image']['tmp_name'];
		move_uploaded_file($book_image_tmp, 'img/'.$book_image);

		$sql = "INSERT INTO `book` VALUES('', '$book_title', '$book_desc','$book_category','$book_author', '$date_publish', '$qty','$book_image')";
		if($conn->query($sql) == true) 
		{
			echo'
				<script type = "text/javascript">
					alert("Thêm thành công");
					window.location = "book.php";
				</script>
			';
		}
		else
		{
			echo'
				<script type = "text/javascript">
					alert("Thêm không thành công");
					window.location = "book.php";
				</script>
			';
		}
		
	}
?>