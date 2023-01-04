<?php
	require_once 'connect.php';
	$q_book = $conn->query("SELECT * FROM `book` WHERE `book_id` = '$_REQUEST[book_id]'") or die(mysqli_error());
	$f_book = $q_book->fetch_array();
?>
<div class = "col-lg-3"></div>
<div class = "col-lg-6">
	<form method = "POST" action = "edit_book_query.php?book_id=<?php echo $f_book['book_id']?>" enctype = "multipart/form-data">
		<div class = "form-group form-group__heading">Chỉnh sửa thông tin sách</div>
		<div class = "form-group">
			<label>Tên sách:</label>
			<input type = "text" value = "<?php echo $f_book['book_title']?>" name = "book_title" required = "required" class = "form-control" />
		</div>
		<div class = "form-group">
			<label>Thể loại:</label>
			<!--<input type = "text" name = "book_category" value = "<?php echo $f_book['book_category']?>" class = "form-control" required = "required"/>-->
			<select name = "book_category" class = "form-control" required = "required" >
				<option selected = "selected" value = "<?php echo $f_book['book_category']?>" style = "background-color: rgba(0,0,0,0.3); color:white;" ><?php echo $f_book['book_category']?></option>
			    <option value="Chính trị - Pháp luật">Chính trị - Pháp luật</option>
				<option value="Khoa học công nghệ - Kinh tế">Khoa học công nghệ - Kinh tế</option>
				<option value="Văn học nghệ thuật">Văn học nghệ thuật</option>
				<option value="Văn hóa xã hội - lịch sử">Văn hóa xã hội - Lịch sử</option>
				<option value="Giáo trình">Giáo trình</option>
				<option value="Truyện - Tiểu thuyết">Truyện - Tiểu thuyết</option>
				<option value="Tâm lý - Tâm linh - Tôn giáo">Tâm lý - Tâm linh - Tôn giáo</option>
				<option value="Thiếu nhi">Thiếu nhi</option>
			</select>
		</div>
		<div class = "form-group">
			<label>Tác giả:</label>
			<input type = "text" name = "book_author" value = "<?php echo $f_book['book_author']?>" class = "form-control" required = "required" />
		</div>
		<div class = "form-group">
			<label>Ngày xuất bản:</label>
			<input type = "date" name = "date_publish" value = "<?php echo $f_book['date_publish']?>" required = "required" class = "form-control" />
		</div>
		<div class = "form-group">
			<label>Số lượng:</label>
			<input type = "number" min = "0" value = "<?php echo $f_book['qty']?>" name = "qty" required = "required" class = "form-control" />
		</div>
		<div class = "form-group">
			<label>Vị trí:</label>
			<!--<input type = "text" value = "<?php echo $f_book['book_description']?>" name = "book_desc" class = "form-control" />-->
			<select type = "text" name = "book_desc" class = "form-control" required = "required">
				<option value="<?php echo $f_book['book_description']?>" selected = "selected" style = "background-color: rgba(0,0,0,0.3); color:white;" ><?php echo $f_book['book_description']?></option>
				<option value="A (Chính trị - Pháp luật)">A (Chính trị - Pháp luật)</option>
				<option value="B (Khoa học công nghệ - Kinh tế)">B (Khoa học công nghệ - Kinh tế)</option>
				<option value="C (Văn học nghệ thuật)">C (Văn học nghệ thuật)</option>
				<option value="D (Văn hóa xã hội - lịch sử)">D (Văn hóa xã hội - lịch sử)</option>
				<option value="E (Giáo trình)">E (Giáo trình)</option>
				<option value="F (Truyện - Tiểu thuyết)">F (Truyện - Tiểu thuyết)</option>
				<option value="G (Tâm lý - Tâm linh - Tôn giáo)">G (Tâm lý - Tâm linh - Tôn giáo)</option>
				<option value="H (Thiếu nhi)">H (Thiếu nhi)</option>
			</select>
		</div>
		<div class = "form-group">
			<label>Hình ảnh:</label>
			<input type = "file" value = "<?php echo $f_book['book_image']?>" name = "book_image"  />
		</div>
		<div class = "form-group">
			<button name = "edit_book" class = "btn btn-success btn__style" style = "border-radius:50px;outline:none;">Lưu</button>
		</div>
	</form>		
</div>