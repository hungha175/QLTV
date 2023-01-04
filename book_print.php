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
			<header></header>
			<div class = "container-fluid">				
				<div class="grid">
					<div class="grid__row">								
						<div class = "col-lg-12 style" style = "margin-top:30px;">
							<div class = " alert__label" style ="border:none;">Danh sách sách</div>
								<button onclick = "window.print();" class = "btn btn-primary" id = "print-btn">Print</button>
								<form>
									<div id = "book_table">
										<table id = "table" class = "table table-bordered">
											<thead class = "alert-success">
												<tr>
													<th >ID</th>
													<th >Tên sách</th>
													<th >Vị trí</th>												
													<th >Thể loại</th>	
													<th >Tác giả</th>	
													<th >Ngày XB</th>
													<th >Qty</th>														
												</tr>
											</thead>
											<tbody>
												<?php								
													$qbook = $conn->query("SELECT * FROM `book`") or die(mysqli_error());
													while($fbook = $qbook->fetch_array()){														
												?>
												<tr>				
													<td><?php echo $fbook['book_id'] ?></td>
													<td><?php echo $fbook['book_title']?></td>	
													<td><?php echo $fbook['book_description'] ?></td>
													<td><?php echo $fbook['book_category'] ?></td>								
													<td><?php echo $fbook['book_author']?></td>	
													<td><?php echo $fbook['date_publish'] ?></td>
													<td><?php echo $fbook['qty'] ?></td>																												
												</tr>
												<?php
													}
												?>
											</tbody>
										</table>
									</div>
								</form>
							</div>					
						</div>
					</div>						
				</div>
			</div>		
		</div>
		<footer></footer>
	</body>
</html>