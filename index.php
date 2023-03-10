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
  <span class="w3-bar-item w3-right"style="color:black;">Logo</span>
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
    <a href="index.php" class="w3-bar-item w3-button w3-padding w3-blue"><i class="fa fa-home fa-fw"></i>?? Trang ch???</a>
    <a href="bookpage.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-book fa-fw"></i>?? S??ch</a>
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
