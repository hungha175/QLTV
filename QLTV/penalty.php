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
		<link rel = "stylesheet" type = "text/css" href = "bootstrap/bootstrap-3.3.7/bootstrap.min.css" />	
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src = "DataTables/datatables.min.js"></script>
		<script src = "chosen_v1.8.7/chosen.jquery.min.js"></script>
	</head>
	
	<body class = "body">
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
				<div class="grid1">
					<div class="grid__row">
						<div class = "col-lg-2 style2" style = "">
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
							<div class = "alert alert-info alert__label" style ="border-radius:50px;">Phiếu phạt</div>
								
								<button id = "add_penalty" type = "button" class = "btn btn-primary pull-right" style = "border-radius:50px;width:100px;outline:none;"><i class="fas fa-plus"></i></button>
								<button id = "show_penalty" type = "button" style = "display:none;border-radius:50px;width:100px;outline:none;" class = "btn btn-success"><i class="fas fa-backspace" ></i></button>
								<br />
								<br />
								
								<div id = "penalty_table">
									<table id = "table" class = "table table-bordered">
										<thead class = "alert-success">
											<tr>
                                                <th style = "width:50px;"></th>
												<th style = "width:100px;">Mã phiếu</th>
												<th style = "">Tên độc giả</th>
												<th>Ngày lập phiếu</th>												
												<th>Số tiền</th>									
												<th style = "width:105px;">Sửa / Xóa</th>
											</tr>
										</thead>
										<tbody>
											<?php
												
												$qpenalty = $conn->query("SELECT * FROM `penalty`") or die(mysqli_error());
												while($fpenalty = $qpenalty->fetch_array()){
													
											?>
											<tr>
                                                <td><a value = "<?php echo $fpenalty['penalty_id']?>"  class = "btn btn-info ipenalty_id " style="border-radius:50%;outline:none;"><span class = "fas fa-info-circle"></span></a></td>
												<td><?php echo $fpenalty['penalty_id'] ?></td>
												<td><?php echo $fpenalty['penalty_name']?></td>									
												<td><?php echo $fpenalty['penalty_date']?></td>
                                                <td><?php echo $fpenalty['penalty_fine']?></td>																															
												<td><a onclick = "return Del('<?php echo $fpenalty['penalty_name'];?>');"class = "btn btn-danger delpenalty_id btn-ed-del" value = "<?php echo $fpenalty['penalty_id']?>" style="border-radius:50px;outline:none;"><span class = "fas fa-trash-alt"></span></a></td>
											</tr>
											<?php
												}
											?>
										</tbody>
									</table>
								</div>
								<div id = "edit_form"></div>
								<div id = "penalty_form" style = "display:none;">
									<div class = "col-lg-3"></div>
									<div class = "col-lg-6">
										<form method = "POST" action = "save_penalty_query.php" enctype = "multipart/form-data">
											<div class = "form-group form-group__heading">Phiếu đóng phạt</div>
											
											<div class = "form-group">
												<label>Tên độc giả:</label>
												<input type = "text" name = "penalty_name" class = "form-control" required = "required"/>
												
											</div>
											<div class = "form-group">
												<label>Ngày lập phiếu:</label>
												<input type = "date" name = "penalty_date" class = "form-control" required = "required" />
											</div>
											<div class = "form-group">
												<label>Số tiền phải đóng</label>
												<input type = "text" name = "penalty_fine" required = "required" class = "form-control" />
											</div>
											<div class = "form-group">
												<label>Lý do</label>
												<input type = "text" name = "penalty_reason" required = "required" class = "form-control" />
											</div>
											<div class = "form-group">
												<button name = "save_penalty" class = "btn btn-success btn__style" style ="border-radius:50px;outline:none;">Lưu</button>
											</div>
										</form>		
									</div>	
								</div>
							</div>					
						</div>
					</div>						
				</div>
			</div>
			<footer class="footer">
					<span class="footer-info">Made by MahHug - 2021</span>
			</footer>
	</body>
	
	<script>
		function Del(name)
		{
			var result = confirm("Bạn có chắc muốn xóa thông tin đóng phạt của " +name+ " ?");
			if(result == false)
			{
				event.preventDefault();
				window.location = "penalty.php";
				
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
			$('#add_penalty').click(function(){
				$(this).hide();
				$('#print_penalty').hide();
				$('#show_penalty').show();
				$('#penalty_table').slideUp();
				$('#penalty_form').slideDown();
				$('#show_penalty').click(function(){
					$(this).hide();
					$('#print_penalty').show();
					$('#add_penalty').show();
					$('#penalty_table').slideDown();
					$('#penalty_form').slideUp();
				});
			});
		});
	</script>
	<!-- tạo hiệu ứng khi nhấn nút xóa và edit -->
	<script type = "text/javascript">
		$(document).ready(function(){
			$result = $('<center><label>Đang xóa</label></center>');
			$('.delpenalty_id').click(function(){
				$penalty_id = $(this).attr('value');
				$(this).parents('td').empty().append($result);
				$('.delpenalty_id').attr('disabled', 'disabled');
				setTimeout(function(){
					window.location = 'delete_penalty.php?penalty_id=' + $penalty_id;
				}, 1000);
			});
			
            
			$('.ipenalty_id').click(function(){
				$penalty_id = $(this).attr('value');
				$('#print_penalty').hide();
				$('#show_penalty').show();
				$('#add_penalty').hide();
				$('#show_penalty').click(function(){
					$(this).hide();
					$('#edit_form').empty();
					$('#penalty_table').show();
					$('#penalty_admin').show();
					$('#print_penalty').show();
					$('#add_penalty').show();
				});
				$('#penalty_table').fadeOut();			
				$('#edit_form').load('detail_penalty.php?penalty_id=' + $penalty_id);
			});
		});
	</script>
</html>