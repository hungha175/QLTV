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
    <a href="bookborrow.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-arrow-right fa-fw"></i>?? M?????n s??ch</a>
    <a href="bookreturn.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-arrow-left fa-fw"></i>?? Tr??? s??ch</a>
    <a href="statisticpage.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bar-chart fa-fw"></i>?? Th???ng k??</a>
    <a href="regulationpage.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bell fa-fw"></i>?? Quy ?????nh</a>
    <a href="penaltypage.php" class="w3-bar-item w3-button w3-padding w3-blue"><i class="fa fa-file-text fa-fw"></i>?? Phi???u ph???t</a>
    <a href="logout.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-sign-out fa-fw"></i>?? ????ng xu???t</a>
  </div>
</nav>


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">
    <div class = "col-lg-12 " style = "padding-left:30px; padding-right:40px;">
							<div class = "alert alert-info alert__label" style ="border-radius:50px;">Phi???u ph???t</div>
								
								<button id = "add_penalty" type = "button" class = "btn btn-primary pull-right" style = "border-radius:50px;width:100px;outline:none;"><i class="fas fa-plus"></i></button>
								<button id = "show_penalty" type = "button" style = "display:none;border-radius:50px;width:100px;outline:none;" class = "btn btn-success"><i class="fas fa-backspace" ></i></button>
								<br />
								<br />
								
								<div id = "penalty_table">
									<table id = "table" class = "table table-bordered">
										<thead class = "alert-success">
											<tr>
                                                <th style = "width:50px;"></th>
												<th style = "width:100px;">M?? phi???u</th>
												<th style = "">T??n ?????c gi???</th>
												<th>Ng??y l???p phi???u</th>												
												<th>S??? ti???n</th>									
												<th style = "width:105px;">S???a / X??a</th>
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
											<div class = "form-group form-group__heading">Phi???u ????ng ph???t</div>
											
											<div class = "form-group">
												<label>T??n ?????c gi???:</label>
												<input type = "text" name = "penalty_name" class = "form-control" required = "required"/>
												
											</div>
											<div class = "form-group">
												<label>Ng??y l???p phi???u:</label>
												<input type = "date" name = "penalty_date" class = "form-control" required = "required" />
											</div>
											<div class = "form-group">
												<label>S??? ti???n ph???i ????ng</label>
												<input type = "text" name = "penalty_fine" required = "required" class = "form-control" />
											</div>
											<div class = "form-group">
												<label>L?? do</label>
												<input type = "text" name = "penalty_reason" required = "required" class = "form-control" />
											</div>
											<div class = "form-group">
												<button name = "save_penalty" class = "btn btn-success btn__style" style ="border-radius:50px;outline:none;">L??u</button>
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
			var result = confirm("B???n c?? ch???c mu???n x??a th??ng tin ????ng ph???t c???a " +name+ " ?");
			if(result == false)
			{
				event.preventDefault();
				window.location = "penalty.php";
				
			}
		}
</script>
	<!-- t???o form datatable -->
<script type = "text/javascript">
			$(document).ready(function() {
			$('#table').DataTable( {
				"language":{
					"decimal":        "",
					"emptyTable":     "Kh??ng c?? d??? li???u",
					"info":           " _START_ ?????n _END_ c???a _TOTAL_ m???c",
					"infoEmpty":      " 0 ?????n 0 c???a 0 m???c",
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
	<!-- t???o hi???u ???ng khi nh???n n??t th??m th??ng tin -->
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
	<!-- t???o hi???u ???ng khi nh???n n??t x??a v?? edit -->
<script type = "text/javascript">
		$(document).ready(function(){
			$result = $('<center><label>??ang x??a</label></center>');
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
</body>
</html>
