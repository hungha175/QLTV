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
							<div class = "alert alert-info alert__label" style ="border-radius:50px;">Thống kê</div>
							<div class = "grid__row-sub">
									<div class = "statistic__user" style = " background-color: #FFCC00; background-image: linear-gradient(#00CCFF,#0033FF );">
										<div class = "statistic__label"> Độc giả</div>
										<div class = "statistic__num">
											<?php
												$q_borrow = $conn->query("SELECT COUNT(user_no) as total FROM `user` 	") or die(mysqli_error());
												$new_qty = $q_borrow->fetch_array();
												echo $new_qty['total'];	
											?>
										</div>
								</div>
							</div>
							<div class = "grid__row-sub statistic">
								<div class = "grid_column-2-6 statistic__content" style = " background-color: green; background-image: linear-gradient(#99FF00,green );">
									<div class = "statistic__label">Sách</div>
									<div class = "statistic__num">
										<?php
											$q_borrow = $conn->query("SELECT Count(book_id) as total FROM `book`") or die(mysqli_error());
											$new_qty = $q_borrow->fetch_array();
											echo $new_qty['total'];				
										?>
									</div>
								</div>
								<div class = "grid_column-2-6 statistic__content" style = " background-color: #FFCC00; background-image: linear-gradient(#FFFF66,#FF9933 );">
									<div class = "statistic__label">Mượn</div>
									<div class = "statistic__num">
										<?php
											$q_borrow = $conn->query("SELECT COUNT(qty) as total FROM `borrowing`") or die(mysqli_error());
											$new_qty = $q_borrow->fetch_array();
											echo $new_qty['total'];
										?>
									</div>
								</div>
								<div class = "grid_column-2-6 statistic__content" style = " background-color: purple; background-image: linear-gradient(pink,#FF99FF);">
									<div class = "statistic__label">Đã trả</div>
									<div class = "statistic__num">
										<?php						
											$q_borrow = $conn->query("SELECT COUNT(qty) as total FROM `borrowing` WHERE  `status` = 'Đã trả'") or die(mysqli_error());
											$new_qty = $q_borrow->fetch_array();
											echo $new_qty['total'];
										?>
									</div>
								</div>
								<div class = "grid_column-2-6 statistic__content" style = " background-color: purple; background-image: linear-gradient(#FF9900,#FF3333);">
									<div class = "statistic__label">Chưa trả</div>
									<div class = "statistic__num">
										<?php											
											$q_borrow = $conn->query("SELECT COUNT(qty) as total FROM `borrowing` WHERE  `status` = 'Đang mượn'") or die(mysqli_error());
											$new_qty = $q_borrow->fetch_array();
											echo $new_qty['total'];
										?>
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
	</body>	
</html>