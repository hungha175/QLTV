<!DOCTYPE html>
<?php
	require_once 'connect.php';
	if(!isset($_SESSION["login"])){
        header("location:loginform.php");
    }
?>	
<html>
<head>
<title>QLTV</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon"  href="img/logohkt.png">
<link rel = "stylesheet" type = "text/css" href = "css/main.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel = "stylesheet" type = "text/css" href = "fonts/fontawesome-free-5.15.4/css/all.min.css">
<link rel = "stylesheet" type = "text/css" href = "DataTables/datatables.min.css" />
<link rel = "stylesheet" type = "text/css" href = "chosen_v1.8.7/chosen.min.css" />	
<link rel = "stylesheet" type = "text/css" href = "bootstrap/bootstrap-3.3.7/bootstrap.min.css" />	
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src = "DataTables/datatables.min.js"></script>
<script src = "chosen_v1.8.7/chosen.jquery.min.js"></script>
<style>
html,body,h1,h2,h3,h4,h5 {font-size:17px;}
</style>
</head>
<body class="w3-light-grey">

<!-- Top container -->
<div class="w3-bar w3-top w3-black w3-large" style="z-index:4">
  <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i></button>
  <span class="w3-bar-item w3-right" style="color:black;">Logo</span>
</div>

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
  <div class="w3-container w3-row">
    <div class="w3-col s4">
      <img src="img/logohkt.png" class="w3-circle w3-margin-right" style="width:46px">
    </div>
    <div class="w3-col s8 w3-bar">
      <span>
        <?php
            if(isset($_SESSION["login"]))
            {
                echo " Welcome " .$_SESSION["login"][1];
            }
        ?>
      </span>
    </div>
  </div>
  <hr>
  <div class="w3-container">
    <h5></h5>
  </div>
  <div class="w3-bar-block">
    <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>
    <a href="index.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-home fa-fw"></i>  Trang chủ</a>
    <a href="bookpage.php" class="w3-bar-item w3-button w3-padding w3-blue"><i class="fa fa-book fa-fw"></i>  Sách</a>
    <a href="userpage.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-user fa-fw"></i>  Độc giả</a>
    <a href="bookborrow.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-arrow-right fa-fw"></i>  Mượn sách</a>
    <a href="bookreturn.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-arrow-left fa-fw"></i>  Trả sách</a>
    <a href="statisticpage.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bar-chart fa-fw"></i>  Thống kê</a>
    <a href="regulationpage.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bell fa-fw"></i>  Quy định</a>
    <!--<a href="penaltypage.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-file-text fa-fw"></i>  Phiếu phạt</a>-->
    <a href="logout.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-sign-out fa-fw"></i>  Đăng xuất</a>
  </div>
</nav>


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">
    <div class = "col-lg-12" style = "padding-left:30px; padding-right:40px;">
							<div class = "alert alert-info alert__label" style ="border-radius:50px;">Sách</div>
								<a href = "book_print.php" class = "btn btn-primary" id = "print_book">
									<div>
										<img src ="img/printer.png" style = "width:30px;height:30px;">
									</div>
								</a>
								<button id = "add_book" type = "button" class = "btn btn-primary pull-right" style = "border-radius:50px;width:100px;outline:none;"><i class="fas fa-plus"></i></button>
								<button id = "show_book" type = "button" style = "display:none;border-radius:50px;width:100px;outline:none;" class = "btn btn-success"><i class="fas fa-backspace" ></i></button>
								<br />
								<br />
								
								<div id = "book_table">
									<table id = "table" class = "table table-bordered">
										<thead class = "alert-success">
											<tr>
												<th style = "width:40px;"></th>
												<th style = "width:56px;">ID sách</th>
												<th>Tên sách</th>												
												<th>Tác giả</th>
												<th>Ngày xuất bản</th>						
												<th style = "width:105px;">Sửa / Xóa</th>
											</tr>
										</thead>
										<tbody>
											<?php
												//$n = 'SA00001';
												$qbook = $conn->query("SELECT * FROM `book`") or die(mysqli_error());
												while($fbook = $qbook->fetch_array()){
													
											?>
											<tr>
												<td><a value = "<?php echo $fbook['book_id']?>"  class = "btn btn-info ibook_id " style="border-radius:50%;outline:none;"><span class = "fas fa-info-circle"></span></a></td>
												<td><?php echo $fbook['book_id'] ?></td>
												<td><?php echo $fbook['book_title']?></td>									
												<td><?php echo $fbook['book_author']?></td>	
												<td><?php echo $fbook['date_publish']?></td>																															
												<td><a value = "<?php echo $fbook['book_id']?>"  class = "btn btn-warning ebook_id btn-ed-del" style="border-radius:50px;outline:none;"><span class = "fas fa-pen-square"></span></a> <a onclick = "return Del('<?php echo $fbook['book_title'];?>');"class = "btn btn-danger delbook_id btn-ed-del" value = "<?php echo $fbook['book_id']?>" style="border-radius:50px;outline:none;"><span class = "fas fa-trash-alt"></span></a></td>
											</tr>
											<?php
												}
											?>
										</tbody>
									</table>
								</div>
								<div id = "edit_form"></div>
								<div id = "book_form" style = "display:none;">
									<div class = "col-lg-3"></div>
									<div class = "col-lg-6">
										<form method = "POST" action = "save_book_query.php" enctype = "multipart/form-data">
											<div class = "form-group form-group__heading">Thêm thông tin sách</div>
											<div class = "form-group">
												<label>Tên sách:</label>
												<input type = "text" name = "book_title" required = "required" class = "form-control" />
											</div>
											<div class = "form-group">
												<label>Thể loại:</label>
												<!--<input type = "text" name = "book_category" class = "form-control" required = "required"/>-->
												<select  name = "book_category" class = "form-control" required = "required">
													<option value="Chính trị - Pháp luật">Chính trị - Pháp luật</option>
													<option value="Khoa học công nghệ - Kinh tế">Khoa học công nghệ - Kinh tế</option>
													<option value="Văn học nghệ thuật">Văn học nghệ thuật</option>
													<option value="Văn hóa xã hội - lịch sử">Văn hóa xã hội - lịch sử</option>
													<option value="Giáo trình">Giáo trình</option>
													<option value="Truyện - Tiểu thuyết">Truyện - Tiểu thuyết</option>
													<option value="Tâm lý - Tâm linh - Tôn giáo">Tâm lý - Tâm linh - Tôn giáo</option>
													<option value="Thiếu nhi">Thiếu nhi</option>
												</select>
											</div>
											<div class = "form-group">
												<label>Tác giả:</label>
												<input type = "text" name = "book_author" class = "form-control" required = "required" />
											</div>
											<div class = "form-group">
												<label>Ngày xuất bản:</label>
												<input type = "date" name = "date_publish" required = "required" class = "form-control" />
											</div>
											<div class = "form-group">
												<label>Số lượng:</label>
												<input type = "number" min = "0" name = "qty" required = "required" class = "form-control" />
											</div>
											<div class = "form-group">
												<label>Vị trí:</label>
												<!--<input type = "text" name = "book_desc" class = "form-control" />-->
												<select  name = "book_desc" class = "form-control" required = "required">
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
												<input type = "file" name = "book_image" />
											</div>
											<div class = "form-group">
												<button name = "save_book" class = "btn btn-success btn__style" style ="border-radius:50px;outline:none;">Lưu</button>
											</div>
										</form>		
									</div>	
								</div>
							</div>					
	</div>
</div>

<script>
// Get the Sidebar
var mySidebar = document.getElementById("mySidebar");

// Get the DIV with overlay effect
var overlayBg = document.getElementById("myOverlay");

// Toggle between showing and hiding the sidebar, and add overlay effect
function w3_open() {
  if (mySidebar.style.display === 'block') {
    mySidebar.style.display = 'none';
    overlayBg.style.display = "none";
  } else {
    mySidebar.style.display = 'block';
    overlayBg.style.display = "block";
  }
}

// Close the sidebar with the close button
function w3_close() {
  mySidebar.style.display = "none";
  overlayBg.style.display = "none";
}
</script>

<script>
		function Del(name)
		{
			var result = confirm("Bạn có chắc muốn xóa " +name+ " ?");
			if(result == false)
			{
				event.preventDefault();
				window.location = "book.php";
				
			}
		}
        function Ed(name)
		{
			var result = confirm("Bạn có chắc muốn sửa thông tin của " +name+ " ?");
			if(result == false)
			{
				event.preventDefault();
				window.location = "book.php";
				
			}
		}
</script>
	<!-- tạo form datatable -->
<script type = "text/javascript">
			$(document).ready(function() {
			$('#table').DataTable( {
				"language":{
					"decimal":        "",
					"emptyTable":     "Không có dữ liệu",
					"info":           " _START_ đến _END_ của _TOTAL_ mục",
					"infoEmpty":      " 0 đến 0 của 0 mục",
					"infoFiltered":   "(lọc từ _MAX_ mục)",
					"infoPostFix":    "",
					"thousands":      ",",
					"lengthMenu":     "Hiển thị _MENU_ mục",
					"loadingRecords": "Đang tải...",
					"processing":     "Processing...",
					"search":         "Tìm kiếm:",
					"zeroRecords":    "Không tìm thấy kết quả",
					"paginate": {
						"first":      "Đầu",
						"last":       "Cuối",
						"next":       "Sau",
						"previous":   "Trước"
					},
					"aria": {
						"sortAscending":  ": activate to sort column ascending",
						"sortDescending": ": activate to sort column descending"
					}
				}
			} );
		} );
</script>
	<!-- tạo hiệu ứng khi nhấn nút thêm thông tin -->
<script type = "text/javascript">
		$(document).ready(function(){
			$('#add_book').click(function(){
				$(this).hide();
				$('#print_book').hide();
				$('#show_book').show();
				$('#book_table').slideUp();
				$('#book_form').slideDown();
				$('#show_book').click(function(){
					$(this).hide();
					$('#print_book').show();
					$('#add_book').show();
					$('#book_table').slideDown();
					$('#book_form').slideUp();
				});
			});
		});
</script>
	<!-- tạo hiệu ứng khi nhấn nút xóa và edit -->
<script type = "text/javascript">
		$(document).ready(function(){
			$result = $('<center><label>Đang xóa</label></center>');
			$('.delbook_id').click(function(){
				$book_id = $(this).attr('value');
				$(this).parents('td').empty().append($result);
				$('.delbook_id').attr('disabled', 'disabled');
				$('.ebook_id').attr('disabled', 'disabled');
				setTimeout(function(){
					window.location = 'delete_book.php?book_id=' + $book_id;
				}, 1000);
			});
			$('.ebook_id').click(function(){
				$book_id = $(this).attr('value');
				$('#show_book').show();
				$('#print_book').hide();
				$('#add_book').hide();
				$('#show_book').click(function(){
					$(this).hide();
					$('#edit_form').empty();
					$('#book_table').show();
					$('#book_admin').show();
					$('#print_book').show();
					$('#add_book').show();
				});
				$('#book_table').fadeOut();			
				$('#edit_form').load('load_book.php?book_id=' + $book_id);
			});

			$('.ibook_id').click(function(){
				$book_id = $(this).attr('value');
				$('#print_book').hide();
				$('#show_book').show();
				$('#add_book').hide();
				$('#show_book').click(function(){
					$(this).hide();
					$('#edit_form').empty();
					$('#book_table').show();
					$('#book_admin').show();
					$('#print_book').show();
					$('#add_book').show();
				});
				$('#book_table').fadeOut();			
				$('#edit_form').load('detail_book.php?book_id=' + $book_id);
			});
		});
</script>
</body>
</html>
