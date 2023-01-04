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
    <a href="bookpage.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-book fa-fw"></i>  Sách</a>
    <a href="userpage.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-user fa-fw"></i>  Độc giả</a>
    <a href="bookborrow.php" class="w3-bar-item w3-button w3-padding w3-blue"><i class="fa fa-arrow-right fa-fw"></i>  Mượn sách</a>
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
    <div class = "col-lg-12 " style = "padding-left:30px; padding-right:40px;">
							<div class = "alert alert-info alert__label" style ="border-radius:50px;">Mượn sách</div>
							<form method = "POST" action = "borrow.php" enctype = "multipart/form-data">
								<div class = "form-group pull-right" style = "margin-bottom:0px;">	
									<label>Chọn độc giả:</label>
									<br />
									<select name = "user_no" id = "user" class = "select">
										<option value = "" selected = "selected" disabled = "disabled">Tìm kiếm </option>
										<?php
											$qborrow = $conn->query("SELECT * FROM `user` ORDER BY `lastname`") or die(mysqli_error());
											while($fborrow = $qborrow->fetch_array()){
										?>
											<option value = "<?php echo $fborrow['user_no']?>"><?php echo $fborrow['firstname']." ".$fborrow['middlename']." ".$fborrow['lastname']?></option>
										<?php
											}
										?>
									</select>
									<br/>						
									<label style = "margin-top:10px;">Chọn sách</label>
								</div>
								<div class = "form-group pull-left">	
									<button name = "save_borrow" class = "btn btn-primary" style="border-radius:50px;width:100px;outline:none;">Mượn</button>
								</div>
								<table id = "table" class = "table table-bordered">
									<thead class = "alert-success">
										<tr>
											<th>ID sách</th>
											<th>Tên sách</th>
											<!--<th>Thể loại</th>-->
											<th>Tác giả</th>
											<!--<th>Ngày XB</th>-->
											<th>Số lượng</th>
											<th>Còn lại</th>
											<th>Mượn</th>
											<th>Chọn</th>
										</tr>
									</thead>
									<tbody>
										<?php
											$q_book = $conn->query("SELECT * FROM `book`") or die(mysqli_error());
											while($f_book = $q_book->fetch_array()){
											$q_borrow = $conn->query("SELECT SUM(qty) as total FROM `borrowing` WHERE `book_id` = '$f_book[book_id]' && `status` = 'Đang mượn'") or die(mysqli_error());
											$new_qty = $q_borrow->fetch_array();
											$total = $f_book['qty'] - $new_qty['total'];
										?> 
										<tr>
											<td><?php echo $f_book['book_id']?></td>
											<td><?php echo $f_book['book_title']?></td>
											<!--<td><?php echo $f_book['book_category']?></td>-->
											<td><?php echo $f_book['book_author']?></td>
											<!--<td><?php echo date("d-m-Y", strtotime($f_book['date_publish']))?></td>-->
											<td><?php echo $f_book['qty']?></td>
											<td><?php echo $total?></td>
											<td><?php echo $new_qty['total']?></td>
											<td>
												<?php
													if($total == 0){
														echo "<center><label class = 'text-danger'>Hết sách</label></center>";
													}else{
														echo '<input type = "hidden" name = "book_id[]" value = "'.$f_book['book_id'].'"><center><input type = "checkbox" name = "selector[]" value = "1"></center>';
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

	<!-- chosen -->
<script type = "text/javascript">
		$(document).ready(function(){
			$("#user").chosen({ width:"200px" });	
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
</body>
</html>