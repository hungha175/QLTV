<!DOCTYPE html>
<?php
	
	require_once 'connect.php';
?>	
<html lang = "eng">
	<head>
		<title>HTVibrary</title>
		<meta charset = "utf-8" />
		<meta name = "viewport" content = "width=device-width, initial-scale=1" />
		<link rel="shortcut icon"  href="img/logo5.png">
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
	
	<body>
		<div class = "body">
			<header class="header">
				<div class="grid">
					<div class="header-content">
						<a href="home.php" class="header-logo__link">
							<div class="header-logo">
								<div class="header-logo__img">
									<img src="img/logo5.png" style="width:100%;" >
								</div>
							</div>
						</a>
					</div>
				</div>
			</header>

			<div class = "container-fluid">
				<div class ="clock" >
                    <iframe src="https://free.timeanddate.com/clock/i8260iv9/n218/tlvn42/fn6/fs39/tct/pct/ftb/pl2/pr2/pt2/pb2/tt0/tw1/tm3/td2/th1/tb4" frameborder="0" width="286" height="96" allowtransparency="true"></iframe>
                </div>
				<div class="grid">
					<div class="grid__row">
						<div class = "col-lg-3 bg" style = "margin-top:30px;">
							<ul id = "menu" class = "nav menu">
								<li class = "nav__item"><a class = "nav__link" href = "supplier.php"><img src ="img/supplier.png" style = "width:16%;"> Nhà cung cấp</a></li>
								<li class = "nav__item"><a class = "nav__link" href = "receive.php"><img src ="img/receive.png" style = "width:16%;"> Tiếp nhận sách</a></li>
								<li class = "nav__item"><a class = "nav__link" href = "book.php"><img src ="img/book.png" style = "width:16%;"> Sách</a></li>
								<li class = "nav__item"><a class = "nav__link" href = "user.php"><img src ="img/reading.png" style = "width:16%;"> Độc giả</a></li>
								<li class = "nav__item"><a class = "nav__link" href = "borrowing.php"><img src ="img/borrow.png" style = "width:16%;"> Mượn sách </a></li>
								<li class = "nav__item"><a class = "nav__link" href = "returning.php"><img src ="img/return.png" style = "width:16%;"> Trả sách</a></li>
								<li class = "nav__item"><a class = "nav__link" href = "statistic.php"><img src ="img/analytics.png" style = "width:16%;"> Thống kê</a></li>
								<li class = "nav__item"><a class = "nav__link" href = "regulation.php"><img src ="img/compliant.png" style = "width:16%;"> Quy định</a></li>
								<li class = "nav__item"><a class = "nav__link" href = "penalty.php"><img src ="img/penalty.png" style = "width:16%;">Phiếu phạt</a></li>
							</ul>
						</div>
						
						<div class = "col-lg-9 style" style = "margin-top:30px;">
							<div class = "alert alert-info alert__label" style ="border-radius:50px;">Tiếp nhận sách</div>
								
								<button id = "add_receive" type = "button" class = "btn btn-primary pull-right" style = "border-radius:50px;width:100px;outline:none;"><i class="fas fa-plus"></i></button>
								<button id = "show_receive" type = "button" style = "display:none;border-radius:50px;width:100px;outline:none;" class = "btn btn-success"><i class="fas fa-backspace" ></i></button>
								<br />
								<br />
								
								<div id = "receive_table">
									<table id = "table" class = "table table-bordered">
										<thead class = "alert-success">
											<tr>
												<th style = "width:56px;">ID </th>
												<th>Nhà cung cấp</th>												
												<th>Ngày nhập</th>	
                                                <th>Số lượng</th>	
                                                <th>Tổng giá tiền</th>									
												<th style = "width:105px;">Sửa / Xóa</th>
											</tr>
										</thead>
										<tbody>
											<?php
												//$n = 'SA00001';
												$qreceive = $conn->query("SELECT * FROM `receive`") or die(mysqli_error());
												while($freceive = $qreceive->fetch_array()){
													
											?>
											<tr>
												<td><?php echo $freceive['receive_id'] ?></td>
												<td><?php echo $freceive['receive_name']?></td>									
												<td><?php echo $freceive['receive_date']?></td>
                                                <td><?php echo $freceive['receive_qty']?></td>
                                                <td><?php echo $freceive['receive_price']?></td>																																
												<td><a onclick = "return Del('<?php echo $freceive['receive_id'];?>');"class = "btn btn-danger delreceive_id btn-ed-del" value = "<?php echo $freceive['receive_id']?>" style="border-radius:50px;outline:none;"><span class = "fas fa-trash-alt"></span></a></td>
											</tr>
											<?php
												}
											?>
										</tbody>
									</table>
								</div>
								<div id = "edit_form"></div>
								<div id = "receive_form" style = "display:none;">
									<div class = "col-lg-3"></div>
									<div class = "col-lg-6">
										<form method = "POST" action = "save_receive_query.php" enctype = "multipart/form-data">
											<div class = "form-group form-group__heading">Thêm thông tin sách</div>
											<div class = "form-group">
												<label>Nhà cung cấp:</label> 
												<!--<input type = "text" name = "receive_name" required = "required" class = "form-control" />--> 
												<select  name = "receive_name" class = "form-control" required = "required">
													<option value="Xuất Bản Trẻ">Xuất Bản Trẻ</option>
													<option value="Kim Đồng">Kim Đồng</option>
													<option value="Minh Long">Minh Long</option>
													<option value="1980 Books">1980 Books</option>
													<option value="Văn Lang">Văn Lang</option>
												</select>
											</div>
											<div class = "form-group">
												<label>Ngày nhập:</label>
												<input type = "date" name = "receive_date" class = "form-control" required = "required"/>
											
											</div>
											<div class = "form-group">
												<label>Số lượng:</label>
												<input type = "text" name = "receive_qty" class = "form-control" required = "required" />
											</div>
											<div class = "form-group">
												<label>Tổng giá tiền:</label>
												<input type = "text" name = "receive_price" required = "required" class = "form-control" />
											</div>
											<div class = "form-group">
												<button name = "save_receive" class = "btn btn-success btn__style" style ="border-radius:50px;outline:none;">Lưu</button>
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
		</div>
	</body>
	
	<script>
		function Del(name)
		{
			var result = confirm("Bạn có chắc muốn xóa tiếp nhận sách " +name+ " ?");
			if(result == false)
			{
				event.preventDefault();
				window.location = "receive.php";
				
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
			$('#add_receive').click(function(){
				$(this).hide();
				$('#print_receive').hide();
				$('#show_receive').show();
				$('#receive_table').slideUp();
				$('#receive_form').slideDown();
				$('#show_receive').click(function(){
					$(this).hide();
					$('#print_receive').show();
					$('#add_receive').show();
					$('#receive_table').slideDown();
					$('#receive_form').slideUp();
				});
			});
		});
	</script>
	<!-- tạo hiệu ứng khi nhấn nút xóa và edit -->
	<script type = "text/javascript">
		$(document).ready(function(){
			$result = $('<center><label>Đang xóa</label></center>');
			$('.delreceive_id').click(function(){
				$receive_id = $(this).attr('value');
				$(this).parents('td').empty().append($result);
				$('.delreceive_id').attr('disabled', 'disabled');
				$('.ereceive_id').attr('disabled', 'disabled');
				setTimeout(function(){
					window.location = 'delete_receive.php?receive_id=' + $receive_id;
				}, 1000);
			});
		});
	</script>
</html>