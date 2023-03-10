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
    <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>?? Close Menu</a>
    <a href="index.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-home fa-fw"></i>?? Trang ch???</a>
    <a href="bookpage.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-book fa-fw"></i>?? S??ch</a>
    <a href="userpage.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-user fa-fw"></i>?? ?????c gi???</a>
    <a href="bookborrow.php" class="w3-bar-item w3-button w3-padding w3-blue"><i class="fa fa-arrow-right fa-fw"></i>?? M?????n s??ch</a>
    <a href="bookreturn.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-arrow-left fa-fw"></i>?? Tr??? s??ch</a>
    <a href="statisticpage.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bar-chart fa-fw"></i>?? Th???ng k??</a>
    <a href="regulationpage.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bell fa-fw"></i>?? Quy ?????nh</a>
    <!--<a href="penaltypage.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-file-text fa-fw"></i>?? Phi???u ph???t</a>-->
    <a href="logout.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-sign-out fa-fw"></i>?? ????ng xu???t</a>
  </div>
</nav>


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">
    <div class = "col-lg-12 " style = "padding-left:30px; padding-right:40px;">
							<div class = "alert alert-info alert__label" style ="border-radius:50px;">M?????n s??ch</div>
							<form method = "POST" action = "borrow.php" enctype = "multipart/form-data">
								<div class = "form-group pull-right" style = "margin-bottom:0px;">	
									<label>Ch???n ?????c gi???:</label>
									<br />
									<select name = "user_no" id = "user" class = "select">
										<option value = "" selected = "selected" disabled = "disabled">T??m ki???m </option>
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
									<label style = "margin-top:10px;">Ch???n s??ch</label>
								</div>
								<div class = "form-group pull-left">	
									<button name = "save_borrow" class = "btn btn-primary" style="border-radius:50px;width:100px;outline:none;">M?????n</button>
								</div>
								<table id = "table" class = "table table-bordered">
									<thead class = "alert-success">
										<tr>
											<th>ID s??ch</th>
											<th>T??n s??ch</th>
											<!--<th>Th??? lo???i</th>-->
											<th>T??c gi???</th>
											<!--<th>Ng??y XB</th>-->
											<th>S??? l?????ng</th>
											<th>C??n l???i</th>
											<th>M?????n</th>
											<th>Ch???n</th>
										</tr>
									</thead>
									<tbody>
										<?php
											$q_book = $conn->query("SELECT * FROM `book`") or die(mysqli_error());
											while($f_book = $q_book->fetch_array()){
											$q_borrow = $conn->query("SELECT SUM(qty) as total FROM `borrowing` WHERE `book_id` = '$f_book[book_id]' && `status` = '??ang m?????n'") or die(mysqli_error());
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
														echo "<center><label class = 'text-danger'>H???t s??ch</label></center>";
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
					"emptyTable":     "Kh??ng c?? d??? li???u",
					"info":           "_START_ ?????n _END_ c???a _TOTAL_ m???c",
					"infoEmpty":      "0 ?????n 0 c???a 0 m???c",
					"infoFiltered":   "(l???c t??? _MAX_ m???c)",
					"infoPostFix":    "",
					"thousands":      ",",
					"lengthMenu":     "Hi???n th??? _MENU_ m???c",
					"loadingRecords": "??ang t???i...",
					"processing":     "Processing...",
					"search":         "T??m ki???m:",
					"zeroRecords":    "Kh??ng t??m th???y k???t qu???",
					"paginate": {
						"first":      "?????u",
						"last":       "Cu???i",
						"next":       "Sau",
						"previous":   "Tr?????c"
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
