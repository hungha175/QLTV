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
							<div class = " alert__label" style ="border:none;">Danh sách mượn / trả sách</div>
                            <button onclick = "window.print();" class = "btn btn-primary" id = "print-btn">Print</button>
							<form method = "POST" action = "return.php" enctype = "multipart/form-data">	
								<table id = "table" class = "table table-bordered">
									<thead class = "alert-success">
										<tr>
											<th>STT</th>
											<th>Độc giả</th>
											<th>Tên sách</th>
											<th>Tác giả</th>
											<th>Trạng thái</th>
											<th style = "width:100px;">Ngày mượn / trả</th>
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

			<footer></footer>
		</div>
	</body>
	

	
</html>