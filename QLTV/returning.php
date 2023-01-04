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

	<body class ="body">
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
						<div class = "col-lg-2 style2"  style = "">
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
							<div class = "alert alert-info alert__label" style ="border-radius:50px;">Trả sách</div>
							<a href = "return_print.php" class ="btn btn-primary pull-right">
								<div>
									<img src ="img/printer.png" style = "width:30px;height:30px;">
								</div>
							</a>
							<form method = "POST" action = "return.php" enctype = "multipart/form-data">	
								<table id = "table" class = "table table-bordered">
									<thead class = "alert-success">
										<tr>
											<th>STT</th>
											<th>Độc giả</th>
											<th>Tên sách</th>
											<th>Tác giả</th>
											<th>Trạng thái</th>
											<th>Ngày mượn / trả</th>
											<th>Trạng thái</th>
										</tr>
									</thead>
									<tbody>
										<?php
											$i ='1';
											$qreturn = $conn->query("SELECT * FROM `borrowing`") or die(mysqli_error());
											while($freturn = $qreturn->fetch_array()){
										?>
										<tr>
											<td>
												<?php echo $i++ ;?>
											</td>
											<td>
												<?php
													$quser = $conn->query("SELECT * FROM `user` WHERE `user_no` = '$freturn[user_no]'") or die(mysqli_error());
													$fuser = $quser->fetch_array();
													echo $fuser['firstname']." ".$fuser['middlename']." ".$fuser['lastname'];
												?>
											</td>
											<td>
												<?php
													$qbook = $conn->query("SELECT * FROM `book` WHERE `book_id` = '$freturn[book_id]'") or die(mysqli_error());
													$fbook = $qbook->fetch_array();
													echo $fbook['book_title'];
												?>
											</td>
											<td>
												<?php
													$qbook = $conn->query("SELECT * FROM `book` WHERE `book_id` = '$freturn[book_id]'") or die(mysqli_error());
													$fbook = $qbook->fetch_array();
													echo $fbook['book_author'];
												?>
											</td>
											<td><?php echo $freturn['status']?></td>
											<td><?php echo date("d-m-Y", strtotime($freturn['date']))?></td>
											<td>
												<?php 
													if($freturn['status'] == 'Đã trả'){
													echo '<center><button disabled = "disabled"  class = "btn btn-success" style="border-radius:50px;outline:none;" type = "button" href = "#" data-toggle = "modal" data-target = "#return" >Hoàn tất</button></center>';	
													}else{
													echo '<input type = "hidden" name = "borrow_id" value = "'.$freturn['borrow_id'].'" /><center><button class = "btn btn-danger" data-toggle = "modal" data-target = "#return" style="border-radius:50px;outline:none;">Chưa hoàn tất</button></center>';
													}
												?>
											</td>								
										</tr>
										<?php
											}
										?>
									</tbody>
								</table>
							</form>	
						</div>
					</div>
				</div>
			</div>

			<footer class="footer">
				<span class="footer-info">Made by MahHug - 2021</span>
			</footer>
	</body>
	

	<!-- chosen -->
	<script type = "text/javascript">
		$(document).ready(function(){
			$("#user").chosen({ width:"auto" });	
		})
	</script>
	<!-- datatable -->
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
</html>