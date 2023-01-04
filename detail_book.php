<?php
	require_once 'connect.php';
	$q_book = $conn->query("SELECT * FROM `book` WHERE `book_id` = '$_REQUEST[book_id]'") or die(mysqli_error());
	$f_book = $q_book->fetch_array();

    $q_borrow = $conn->query("SELECT SUM(qty) as total FROM `borrowing` WHERE `book_id` = '$f_book[book_id]' && `status` = 'Đang mượn'") or die(mysqli_error());
	$new_qty = $q_borrow->fetch_array();
	$total = $f_book['qty'] - $new_qty['total'];
?>
<div class = "col-lg-5">
    <div class = "col-lg-1"></div>
    <div class = "col-lg-10">
        <div class="img_user" >
            <img src="img/<?php echo $f_book['book_image']?>"style = "width = 100px;height:283px;">
        </div>
    </div>
</div>
<div class = "col-lg-6" style = "background-color:white;">
<form method = "POST" action = "edit_book_query.php?book_id=<?php echo $f_book['book_id']?>" enctype = "multipart/form-data">
		<div class = "form-group form-group__heading">Chi tiết sách</div>
		<div class = "form-group">
			<label>Tên sách:</label>
			<p><?php echo $f_book['book_title']?></p>
		</div>
		<div class = "form-group">
			<label>Thể loại:</label>
			<p><?php echo $f_book['book_category']?></p>
		</div>
		<div class = "form-group">
			<label>Tác giả:</label>
			<p><?php echo $f_book['book_author']?></p>
		</div>
		<div class = "form-group">
			<label>Ngày xuất bản:</label>
			<p><?php echo $f_book['date_publish']?></p>
		</div>
        <div class = "form-group">
            <label>Vị trí:</label>
            <p><?php echo $f_book['book_description']?></p>
        </div>
		<div class = "form-group">
			<label>Số lượng:</label>
			<p><?php echo $f_book['qty']?></p>
		</div>
        <div class = "form-group" style = "color:red;">
			<label >Còn lại:</label>
			<p><?php echo $total?></p>
		</div>
	</form>			
</div>