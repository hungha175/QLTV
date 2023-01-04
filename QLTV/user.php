<!DOCTYPE html>
<?php
	require_once 'connect.php';
	if(!isset($_SESSION["login"])){
        header("location:loginform.php");
    }
?>	
<html lang = "eng">
	<head>
		<title>HKTLS</title>
		<meta charset = "utf-8" />
		<meta name = "viewport" content = "width=device-width, initial-scale=1" />
		<link rel="shortcut icon"  href="img/logohkt.png">
		<link rel = "stylesheet" type = "text/css" href = "css/main.css">
		<link rel = "stylesheet" type = "text/css" href = "fonts/fontawesome-free-5.15.4/css/all.min.css">
		<link rel = "stylesheet" type = "text/css" href = "DataTables/datatables.min.css" />
		<link rel = "stylesheet" type = "text/css" href = "chosen_v1.8.7/chosen.min.css" />		
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src = "DataTables/datatables.min.js"></script>
		<script src = "chosen_v1.8.7/chosen.jquery.min.js"></script>
	</head>
	
	<body class="body">
			<header class="header">
				<div class="grid">
					<div class="header-content">
						<a href="home.php" class="header-logo__link">
							<div class="header-logo">
								<div class="header-logo__img">
									<img src="img/logohkt.png" style="width:100%;" >
								</div>
							</div>
						</a>
						<nav>
							<a style ="font-size: 20px; line-height:3.5; " class="menu-header">
                                <?php
                                    if(isset($_SESSION["login"]))
                                    {
                                        echo " Xin chào " .$_SESSION["login"][1];
                                    }
                                ?>
                            </a>
			            </nav>
					</div>
				</div>
			</header>

			<div class = "container-fluid1">
				<!--<div class ="clock" >
                    <iframe src="https://free.timeanddate.com/clock/i8260iv9/n218/tlvn42/fn6/fs39/tct/pct/ftb/pl2/pr2/pt2/pb2/tt0/tw1/tm3/td2/th1/tb4" frameborder="0" width="286" height="96" allowtransparency="true"></iframe>
                </div>-->
				<div class="grid1">
					<div class="grid__row">
						<div class = "col-lg-2 style2 " style = "">
							<ul id = "menu" class = "nav menu">
								<li class = "nav__item"><a class = "nav__link" href = "homepage.php"><img src ="img/home.png" style = "width:16%;"> Trang chủ</a></li>
								<li class = "nav__item"><a class = "nav__link1" href = "book.php"><img src ="img/book.png" style = "width:16%;"> Sách</a></li>
								<li class = "nav__item"><a class = "nav__link1" href = "user.php"><img src ="img/reading.png" style = "width:16%;"> Độc giả</a></li>
								<li class = "nav__item"><a class = "nav__link1" href = "borrowing.php"><img src ="img/borrow.png" style = "width:16%;"> Mượn sách </a></li>
								<li class = "nav__item"><a class = "nav__link1" href = "returning.php"><img src ="img/return.png" style = "width:16%;"> Trả sách</a></li>
								<li class = "nav__item"><a class = "nav__link1" href = "statistic.php"><img src ="img/analytics.png" style = "width:16%;"> Thống kê</a></li>
								<li class = "nav__item"><a class = "nav__link1" href = "regulation.php"><img src ="img/compliant.png" style = "width:16%;"> Quy định</a></li>
								<li class = "nav__item"><a class = "nav__link1" href = "penalty.php"><img src ="img/penalty.png" style = "width:16%;">Phiếu phạt</a></li>
								<li class = "nav__item"><a class = "nav__link1" href = "logout.php"><img src ="img/logout.png" style = "width:16%;">Đăng xuất</a></li>
							</ul>
						</div>
						
						<div class = "col-lg-10 style1" style = "padding-left:30px; padding-right:40px;">
						<div class = "alert alert-info alert__label" style ="border-radius:50px;">Độc giả</div>
								<button id = "add_user" type = "button" class = "btn btn-primary pull-right"style = "border-radius:50px;width:100px;outline:none;"><span class = "fas fa-plus"></span></button>
								<button id = "show_user" type = "button" style = "display:none;border-radius:50px;width:100px;outline:none;" class = "btn btn-success"><span class = "fas fa-backspace" style = "font-size:12px;"></span></button>
								<br />
								<br />
								<div id = "user_table">
									<table id = "table" class = "table table-bordered">
										<thead class = "alert-success">
											<tr>
												<th style = "width:40px;"></th>
												<th style = "width:150px;">ID </th>
												<th style = "width:350px;">Họ và tên</th>
												<!--<th style = "width:110px;">Tên đệm</th>
												<th style = "width:110px;">Tên</th>-->
												<!--<th style = "width:80px;">Năm sinh</th>
												<th style = "width:120px;">Số điện thoại</th>-->
												<th style = "width:80px;">Sửa / Xóa</th>
												
											</tr>
										</thead>
										<tbody>
											<?php
												$quser = $conn->query("SELECT * FROM `user`") or die(mysqli_error());
												while($fuser = $quser->fetch_array()){
											?>
											<tr>
												<td><button  class = "btn btn-info iuser_id " value = "<?php echo $fuser['user_no']?>" style=" border-radius:50%;outline:none;"><span class = "fas fa-info-circle"></span></button></td>
												<td><?php echo $fuser['user_no']?></td>
												<td><?php echo $fuser['firstname']?> <?php echo $fuser['middlename']?> <?php echo $fuser['lastname']?></td>
												<!--<td><?php echo $fuser['middlename']?></td>
												<td><?php echo $fuser['lastname']?></td>-->
												<!--<td><?php echo $fuser['course']?></td>
												<td><?php echo $fuser['section']?></td>-->
												<td><button onclick ="return Ed('<?php echo $fuser['lastname'];?>');" class = "btn btn-warning euser_id btn-ed-del" value = "<?php echo $fuser['user_no']?>" style=" border-radius:50px;outline:none;"><span class = "fas fa-pen-square"></span></button>  <button  onclick = "return Del('<?php echo $fuser['lastname'];?>')" value = "<?php echo $fuser['user_no']?>" class = "btn btn-danger deluser_id btn-ed-del" style=" border-radius:50px;outline:none;"><span class = "fas fa-trash-alt"></span></button></td>
												
											</tr>
											<?php
												}
											?>
										</tbody>
									</table>
								</div>
								
								<div id = "edit_form"></div>
								<div id = "user_form" style = "display:none;">
									<div class = "col-lg-3"></div>
									<div class = "col-lg-6">
										<form method = "POST" action = "save_user_query.php" enctype = "multipart/form-data">	
											<div class = "form-group form-group__heading">Tạo thông tin độc giả</div>
											<div class = "form-group">	
												<label>Mã độc giả:</label>
												<input type = "text" maxlength = "10" name = "user_no" required = "required" class = "form-control" />
											</div>	
											<div class = "form-group">	
												<label>Họ:</label>
												<input type = "text" name = "firstname" required = "required" class = "form-control" />
											</div>
											<div class = "form-group">	
												<label>Tên đệm:</label>
												<input type = "text" name = "middlename"  class = "form-control" />
											</div>	
											<div class = "form-group">	
												<label>Tên:</label>
												<input type = "text" required = "required" name = "lastname" class = "form-control" />
											</div>
											<div class = "form-group">
												<label>Năm sinh:</label>
												<input type = "text" maxlength = "4" required = "required" name = "course" class = "form-control" />
											</div>	
											<div class = "form-group">	
												<label>Số điện thoại:</label>
												<input type = "text" maxlength = "12" name = "section" required = "required" class = "form-control" />
											</div>
											<div class = "form-group">	
												<label>Hình ảnh:</label>
												<input type = "file"  name = "user_image" required = "required"  />
											</div>
											<div class = "form-group">	
												<button class = "btn btn-success btn__style" name = "save_user" style = "border-radius:50px;outline:none;">Lưu</button>
											</div>
										</form>		
									</div>	
								</div>
						</div>
					</div>
				</div>
			</div>
			<div class = "footer">
				<span class="footer-info">Made by MahHug - 2021</span>
			</div>
	</body>
	
	<!-- thông báo khi nhấn nút edit và nút xóa -->
	<script>
		function Del(name)
		{
			var result = confirm("Bạn có chắc muốn xóa thông tin của " +name+ " ?");
			if(result == false)
			{
				event.preventDefault();
				window.location = "user.php";
				
			}
		}
		function Ed(name)
		{
			var result = confirm("Bạn có chắc muốn sửa thông tin của " +name+ " ?");
			if(result == false)
			{
				event.preventDefault();
				window.location = "user.php";
				
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
						"info":           "_START_ đến _END_ của _TOTAL_ mục",
						"infoEmpty":      "0 đến 0 của 0 mục",
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
			$('#add_user').click(function(){
				$(this).hide();
				$('#show_user').show();
				$('#user_table').slideUp();
				$('#user_form').slideDown();
				$('#show_user').click(function(){
					$(this).hide();
					$('#add_user').show();
					$('#user_table').slideDown();
					$('#user_form').slideUp();
				});
			});
		});
	</script>
	<!-- tạo hiệu ứng khi nhấn nút xóa và nút edit -->
	<script type = "text/javascript">
		$(document).ready(function(){
			$result = $('<center><label>Đang xóa</label></center>');
			$('.deluser_id').click(function(){
				$user_id = $(this).attr('value');
				$(this).parents('td').empty().append($result);
				$('.deluser_id').attr('disabled', 'disabled');
				$('.euser_id').attr('disabled', 'disabled');
				setTimeout(function(){
					window.location = 'delete_user.php?user_id=' + $user_id;
				}, 1000);
			});
			$('.euser_id').click(function(){
				$user_id = $(this).attr('value');
				$('#show_user').show();
				$('#show_user').click(function(){
					$(this).hide();
					$('#edit_form').empty();
					$('#user_table').show();
					$('#add_user').show();
				});
				$('#user_table').fadeOut();
				$('#add_user').hide();
				$('#edit_form').load('load_user.php?user_id=' + $user_id);
			});

			$('.iuser_id').click(function(){
				$user_id = $(this).attr('value');
				$('#show_user').show();
				$('#show_user').click(function(){
					$(this).hide();
					$('#edit_form').empty();
					$('#user_table').show();
					$('#add_user').show();
				});
				$('#user_table').fadeOut();
				$('#add_user').hide();
				$('#edit_form').load('detail_user.php?user_id=' + $user_id);
			});
		});
	</script>
</html>