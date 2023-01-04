<!DOCTYPE html>
<?php
	//require_once 'valid.php';
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
						</div>
						
						<div class = "col-lg-9 style" style = "margin-top:30px;">
							<div class = "alert alert-info alert__label" style ="border-radius:50px;">Nhà cung cấp</div>
								
								<button id = "add_supplier" type = "button" class = "btn btn-primary pull-right" style = "border-radius:50px;width:100px;outline:none;"><i class="fas fa-plus"></i></button>
								<button id = "show_supplier" type = "button" style = "display:none;border-radius:50px;width:100px;outline:none;" class = "btn btn-success"><i class="fas fa-backspace" ></i></button>
								<br />
								<br />
								
								<div id = "supplier_table">
									<table id = "table" class = "table table-bordered">
										<thead class = "alert-success">
											<tr>
												<th style = "width:56px;">ID</th>
												<th>Nhà cung cấp</th>												
												<th>Địa chỉ</th>
                                                <th>Số điện thoại</th>										
												<th style = "width:105px;">Sửa / Xóa</th>
											</tr>
										</thead>
										<tbody>
											<?php
												//$n = 'SA00001';
												$qsupp = $conn->query("SELECT * FROM `supplier`") or die(mysqli_error());
												while($fsupp = $qsupp->fetch_array()){
													
											?>
											<tr>
												
												<td><?php echo $fsupp['supplier_id'] ?></td>
												<td><?php echo $fsupp['supplier_name']?></td>									
												<td><?php echo $fsupp['supplier_add']?></td>
                                                <td><?php echo $fsupp['supplier_phone']?></td>																																
												<td><a value = "<?php echo $fsupp['supplier_id']?>"  class = "btn btn-warning esupplier_id btn-ed-del" style="border-radius:50px;outline:none;"><span class = "fas fa-pen-square"></span></a> <a class = "btn btn-danger delsupplier_id btn-ed-del" value = "<?php echo $fsupp['supplier_id']?>" style="border-radius:50px;outline:none;"><span class = "fas fa-trash-alt"></span></a></td>
											</tr>
											<?php
												}
											?>
										</tbody>
									</table>
								</div>
								<div id = "edit_form"></div>
								<div id = "supplier_form" style = "display:none;">
									<div class = "col-lg-3"></div>
									<div class = "col-lg-6">
										<form method = "POST" action = "save_supplier_query.php" enctype = "multipart/form-data">
											<div class = "form-group form-group__heading">Thêm thông tin nhà cung cấp</div>
											<div class = "form-group">
												<label>Nhà cung cấp:</label>
												<input type = "text" name = "supplier_name" required = "required" class = "form-control" />
											</div>
											<div class = "form-group">
												<label>Địa chỉ</label>
												<input type = "text" name = "supplier_add" class = "form-control" required = "required"/>
											</div>
											<div class = "form-group">
												<label>Số điện thoại</label>
												<input type = "text" name = "supplier_phone" class = "form-control" required = "required" />
											</div>
											<div class = "form-group">
												<button name = "save_supplier" class = "btn btn-success btn__style" style ="border-radius:50px;outline:none;">Lưu</button>
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
			$('#add_supplier').click(function(){
				$(this).hide();
				$('#show_supplier').show();
				$('#supplier_table').slideUp();
				$('#supplier_form').slideDown();
				$('#show_supplier').click(function(){
					$(this).hide();
					$('#add_supplier').show();
					$('#supplier_table').slideDown();
					$('#supplier_form').slideUp();
				});
			});
		});
	</script>
	<!-- tạo hiệu ứng khi nhấn nút xóa và edit -->
	<script type = "text/javascript">
		$(document).ready(function(){
			$result = $('<center><label>Đang xóa</label></center>');
			$('.delsupplier_id').click(function(){
				$supplier_id = $(this).attr('value');
				$(this).parents('td').empty().append($result);
				$('.delsupplier_id').attr('disabled', 'disabled');
				$('.esupplier_id').attr('disabled', 'disabled');
				setTimeout(function(){
					window.location = 'delete_supplier.php?supplier_id=' + $supplier_id;
				}, 1000);
			});
			$('.esupplier_id').click(function(){
				$supplier_id = $(this).attr('value');
				$('#show_supplier').show();
				$('#add_supplier').hide();
				$('#show_supplier').click(function(){
					$(this).hide();
					$('#edit_form').empty();
					$('#supplier_table').show();
					$('#supplier_admin').show();
					$('#add_supplier').show();
				});
				$('#supplier_table').fadeOut();	
				$('#edit_form').load('load_supplier.php?supplier_id=' + $supplier_id);
			});
		});
	</script>
</html>