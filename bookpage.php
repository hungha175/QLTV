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
    <a href="bookpage.php" class="w3-bar-item w3-button w3-padding w3-blue"><i class="fa fa-book fa-fw"></i>?? S??ch</a>
    <a href="userpage.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-user fa-fw"></i>?? ?????c gi???</a>
    <a href="bookborrow.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-arrow-right fa-fw"></i>?? M?????n s??ch</a>
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
    <div class = "col-lg-12" style = "padding-left:30px; padding-right:40px;">
							<div class = "alert alert-info alert__label" style ="border-radius:50px;">S??ch</div>
								<a href = "book_print.php" class = "btn btn-primary" id = "print_book">
									<div>
										<img src ="img/printer.png" style = "width:30px;height:30px;">
									</div>
								</a>
								<button id = "add_book" type = "button" class = "btn btn-primary pull-right" style = "border-radius:50px;width:100px;outline:none;"><i class="fas fa-plus"></i></button>
								<button id = "show_book" type = "button" style = "display:none;border-radius:50px;width:100px;outline:none;" class = "btn btn-success"><i class="fas fa-backspace" ></i></button>
								<br />
								<br />
								
								<div id = "book_table">
									<table id = "table" class = "table table-bordered">
										<thead class = "alert-success">
											<tr>
												<th style = "width:40px;"></th>
												<th style = "width:56px;">ID s??ch</th>
												<th>T??n s??ch</th>												
												<th>T??c gi???</th>
												<th>Ng??y xu???t b???n</th>						
												<th style = "width:105px;">S???a / X??a</th>
											</tr>
										</thead>
										<tbody>
											<?php
												//$n = 'SA00001';
												$qbook = $conn->query("SELECT * FROM `book`") or die(mysqli_error());
												while($fbook = $qbook->fetch_array()){
													
											?>
											<tr>
												<td><a value = "<?php echo $fbook['book_id']?>"  class = "btn btn-info ibook_id " style="border-radius:50%;outline:none;"><span class = "fas fa-info-circle"></span></a></td>
												<td><?php echo $fbook['book_id'] ?></td>
												<td><?php echo $fbook['book_title']?></td>									
												<td><?php echo $fbook['book_author']?></td>	
												<td><?php echo $fbook['date_publish']?></td>																															
												<td><a value = "<?php echo $fbook['book_id']?>"  class = "btn btn-warning ebook_id btn-ed-del" style="border-radius:50px;outline:none;"><span class = "fas fa-pen-square"></span></a> <a onclick = "return Del('<?php echo $fbook['book_title'];?>');"class = "btn btn-danger delbook_id btn-ed-del" value = "<?php echo $fbook['book_id']?>" style="border-radius:50px;outline:none;"><span class = "fas fa-trash-alt"></span></a></td>
											</tr>
											<?php
												}
											?>
										</tbody>
									</table>
								</div>
								<div id = "edit_form"></div>
								<div id = "book_form" style = "display:none;">
									<div class = "col-lg-3"></div>
									<div class = "col-lg-6">
										<form method = "POST" action = "save_book_query.php" enctype = "multipart/form-data">
											<div class = "form-group form-group__heading">Th??m th??ng tin s??ch</div>
											<div class = "form-group">
												<label>T??n s??ch:</label>
												<input type = "text" name = "book_title" required = "required" class = "form-control" />
											</div>
											<div class = "form-group">
												<label>Th??? lo???i:</label>
												<!--<input type = "text" name = "book_category" class = "form-control" required = "required"/>-->
												<select  name = "book_category" class = "form-control" required = "required">
													<option value="Ch??nh tr??? - Ph??p lu???t">Ch??nh tr??? - Ph??p lu???t</option>
													<option value="Khoa h???c c??ng ngh??? - Kinh t???">Khoa h???c c??ng ngh??? - Kinh t???</option>
													<option value="V??n h???c ngh??? thu???t">V??n h???c ngh??? thu???t</option>
													<option value="V??n h??a x?? h???i - l???ch s???">V??n h??a x?? h???i - l???ch s???</option>
													<option value="Gi??o tr??nh">Gi??o tr??nh</option>
													<option value="Truy???n - Ti???u thuy???t">Truy???n - Ti???u thuy???t</option>
													<option value="T??m l?? - T??m linh - T??n gi??o">T??m l?? - T??m linh - T??n gi??o</option>
													<option value="Thi???u nhi">Thi???u nhi</option>
												</select>
											</div>
											<div class = "form-group">
												<label>T??c gi???:</label>
												<input type = "text" name = "book_author" class = "form-control" required = "required" />
											</div>
											<div class = "form-group">
												<label>Ng??y xu???t b???n:</label>
												<input type = "date" name = "date_publish" required = "required" class = "form-control" />
											</div>
											<div class = "form-group">
												<label>S??? l?????ng:</label>
												<input type = "number" min = "0" name = "qty" required = "required" class = "form-control" />
											</div>
											<div class = "form-group">
												<label>V??? tr??:</label>
												<!--<input type = "text" name = "book_desc" class = "form-control" />-->
												<select  name = "book_desc" class = "form-control" required = "required">
													<option value="A (Ch??nh tr??? - Ph??p lu???t)">A (Ch??nh tr??? - Ph??p lu???t)</option>
													<option value="B (Khoa h???c c??ng ngh??? - Kinh t???)">B (Khoa h???c c??ng ngh??? - Kinh t???)</option>
													<option value="C (V??n h???c ngh??? thu???t)">C (V??n h???c ngh??? thu???t)</option>
													<option value="D (V??n h??a x?? h???i - l???ch s???)">D (V??n h??a x?? h???i - l???ch s???)</option>
													<option value="E (Gi??o tr??nh)">E (Gi??o tr??nh)</option>
													<option value="F (Truy???n - Ti???u thuy???t)">F (Truy???n - Ti???u thuy???t)</option>
													<option value="G (T??m l?? - T??m linh - T??n gi??o)">G (T??m l?? - T??m linh - T??n gi??o)</option>
													<option value="H (Thi???u nhi)">H (Thi???u nhi)</option>
												</select>
											</div>
											<div class = "form-group">
												<label>H??nh ???nh:</label>
												<input type = "file" name = "book_image" />
											</div>
											<div class = "form-group">
												<button name = "save_book" class = "btn btn-success btn__style" style ="border-radius:50px;outline:none;">L??u</button>
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
			var result = confirm("B???n c?? ch???c mu???n x??a " +name+ " ?");
			if(result == false)
			{
				event.preventDefault();
				window.location = "book.php";
				
			}
		}
        function Ed(name)
		{
			var result = confirm("B???n c?? ch???c mu???n s???a th??ng tin c???a " +name+ " ?");
			if(result == false)
			{
				event.preventDefault();
				window.location = "book.php";
				
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
			$('#add_book').click(function(){
				$(this).hide();
				$('#print_book').hide();
				$('#show_book').show();
				$('#book_table').slideUp();
				$('#book_form').slideDown();
				$('#show_book').click(function(){
					$(this).hide();
					$('#print_book').show();
					$('#add_book').show();
					$('#book_table').slideDown();
					$('#book_form').slideUp();
				});
			});
		});
</script>
	<!-- t???o hi???u ???ng khi nh???n n??t x??a v?? edit -->
<script type = "text/javascript">
		$(document).ready(function(){
			$result = $('<center><label>??ang x??a</label></center>');
			$('.delbook_id').click(function(){
				$book_id = $(this).attr('value');
				$(this).parents('td').empty().append($result);
				$('.delbook_id').attr('disabled', 'disabled');
				$('.ebook_id').attr('disabled', 'disabled');
				setTimeout(function(){
					window.location = 'delete_book.php?book_id=' + $book_id;
				}, 1000);
			});
			$('.ebook_id').click(function(){
				$book_id = $(this).attr('value');
				$('#show_book').show();
				$('#print_book').hide();
				$('#add_book').hide();
				$('#show_book').click(function(){
					$(this).hide();
					$('#edit_form').empty();
					$('#book_table').show();
					$('#book_admin').show();
					$('#print_book').show();
					$('#add_book').show();
				});
				$('#book_table').fadeOut();			
				$('#edit_form').load('load_book.php?book_id=' + $book_id);
			});

			$('.ibook_id').click(function(){
				$book_id = $(this).attr('value');
				$('#print_book').hide();
				$('#show_book').show();
				$('#add_book').hide();
				$('#show_book').click(function(){
					$(this).hide();
					$('#edit_form').empty();
					$('#book_table').show();
					$('#book_admin').show();
					$('#print_book').show();
					$('#add_book').show();
				});
				$('#book_table').fadeOut();			
				$('#edit_form').load('detail_book.php?book_id=' + $book_id);
			});
		});
</script>
</body>
</html>
