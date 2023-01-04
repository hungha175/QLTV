
<?php
	require_once 'connect.php';
		$book_id = $_REQUEST['book_id'];

		if(ISSET($_POST['edit_book'])){
			$book_title = $_POST['book_title'];
			$book_desc = $_POST['book_desc'];
			$book_category = $_POST['book_category'];
			$book_author = $_POST['book_author'];
			$date_publish = $_POST['date_publish'];
			$qty = $_POST['qty'];
			$book_image = $_FILES['book_image']['name'];
			$book_image_tmp = $_FILES['book_image']['tmp_name'];
			move_uploaded_file($book_image_tmp, 'img/'.$book_image);
			
			$sql ="UPDATE `book` SET 
			`book_title` = '$book_title', 
			`book_description` = '$book_desc', 
			`book_category` = '$book_category',
			`book_author` = '$book_author', 
			`date_publish` = '$date_publish', 
			`qty` = '$qty', 
			`book_image` = '$book_image' 
			WHERE `book_id` = $book_id";
			if($conn->query($sql) == true )
			{
					echo '
				<script type = "text/javascript">
					alert("Lưu thành công");
					window.location = "book.php";
				</script>
				';
			}
			else
			{
				echo '
				<script type = "text/javascript">
					alert("Lưu không thành công");
					window.location = "book.php";
				</script>
				';
			}
			
			
		}
