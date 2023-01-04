<!DOCTYPE html>
<?php
	require_once 'connect.php';
    if(!isset($_SESSION["login"])){
        header("location:loginform.php");
    }
   
?>	
<html lang = "eng">
	<head>
		<title>HTVibrary</title>
		<meta charset = "utf-8" />
        <link rel="shortcut icon"  href="img/logo5.png">
		<meta name = "viewport" content = "width=device-width, initial-scale=1" />
		<link rel = "stylesheet" type = "text/css" href = "css/main.css">
		<link rel = "stylesheet" type = "text/css" href = "fonts/fontawesome-free-5.15.4/css/all.min.css">
		<link rel = "stylesheet" type = "text/css" href = "DataTables/datatables.min.css" />
		<link rel = "stylesheet" type = "text/css" href = "chosen_v1.8.7/chosen.min.css" />		
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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
                                <div class="header-logo__img" >
                                    <img src="img/logo5.png" style="width:100%;" >                        
                                </div>
                            </div>
                        </a>
                    </div>                          
                </div>
            </header>
            <h4>
                <?php
                    if(isset($_SESSION["login"]))
                    {
                        echo $_SESSION["login"][1];
                    }
                ?>
            </h4>
            <div class="container-fluid">
                <div class ="clock" >
                    <iframe src="https://free.timeanddate.com/clock/i8260iv9/n218/tlvn42/fn6/fs39/tct/pct/ftb/pl2/pr2/pt2/pb2/tt0/tw1/tm3/td2/th1/tb4" frameborder="0" width="286" height="96" allowtransparency="true"></iframe>
                </div>
                <div class="grid">  
                    <div class="grid__row grid__row--margin">
                        <!--<div class="col-lg-6">                    
                            <div class="slide">
                                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                                    Indicators 
                                    <ol class="carousel-indicators" style="bottom:0px;">
                                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                        <li data-target="#myCarousel" data-slide-to="1"></li>
                                        <li data-target="#myCarousel" data-slide-to="2"></li>
                                        <li data-target="#myCarousel" data-slide-to="3"></li>
                                        <li data-target="#myCarousel" data-slide-to="4"></li>
                                        <li data-target="#myCarousel" data-slide-to="5"></li>
                                    </ol>

                                     Wrapper for slides 
                                    <div class="carousel-inner">
                                        <div class="item active">
                                            <img src="img/logo5.png" alt="" style="width:580px;height:325px;">
                                        </div>

                                        <div class="item">
                                            <img src="https://phuriengdo.com/wp-content/uploads/2021/05/z2495917808078_830845217ed6855b33c4f0346dfd0edc.jpg" alt="" style="width:100%;">
                                        </div>

                                        <div class="item">
                                            <img src="https://www.sheridancollege.ca/-/media/images/experience/trafalgar/student-life/trafalgar_library_shelves.jpg?w=1024&hash=4D562F553D56473795F9928DC86DAF9A" alt="" style="width:100%;">
                                        </div>
                                        
                                        <div class="item">
                                            <img src="https://phuriengdo.com/wp-content/uploads/2021/05/z2495917208319_3eac6678014e14ed3c1b2fdf5114113e-1024x576.jpg" alt="" style="width:100%;">
                                        </div>

                                        <div class="item">
                                            <img src="http://whs.edu.vn/wp-content/uploads/2016/12/tv-c2-6.jpg" alt="" style="width:100%;">
                                        </div>

                                        <div class="item">
                                            <img src="https://phuriengdo.com/wp-content/uploads/2021/05/z2495917797778_b580536675dd08396c7442cb488037f2.jpg" alt="" style="width:100%;">
                                        </div>
                                    </div>

                                     Left and right controls 
                                    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                                    <span class="fas fa-angle-left" style="margin-top:295px;"></span>
                                    <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="right carousel-control" href="#myCarousel" data-slide="next">
                                    <span class="fas fa-angle-right" style="margin-top:295px;"></span>
                                    <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            </div>
                        </div>-->
                                    <!-- Menu -->
                        <div class="col-lg-6">
                            <div class="menu-function">
                                <div class="grid__row  ">
                                    <div class="col-lg-4">
                                        <a href="supplier.php" class="menu-function__link">
                                            <div class="menu-function__item red-color">
                                               <!-- <i class="menu-function__icon fas fa-align-justify"></i>-->
                                               <img src = "img/supplier.png" alt = "" style = "width:100%"> 
                                               <p class="menu-function__name">Nhà cung cấp</>
                                            </div>
                                        </a>   
                                    </div>

                                    <div class="col-lg-4">
                                        <a href="receive.php" class="menu-function__link">
                                            <div class="menu-function__item red-color">
                                               <!-- <i class="menu-function__icon fas fa-align-justify"></i>-->
                                               <img src = "img/receive.png" alt = "" style = "width:100%"> 
                                               <p class="menu-function__name">Tiếp nhận sách</>
                                            </div>
                                        </a>   
                                    </div>

                                    <div class="col-lg-4">
                                        <a href="book.php" class="menu-function__link">
                                            <div class="menu-function__item red-color">
                                               <!-- <i class="menu-function__icon fas fa-book"></i>-->
                                               <img src = "img/book.png" alt = "" style = "width:100%"> 
                                                <p class="menu-function__name">Sách</p>
                                            </div>
                                        </a>   
                                    </div>

                                    <div class="col-lg-4">
                                        <a href="user.php" class="menu-function__link">
                                            <div class="menu-function__item yellow-color">
                                               <!-- <i class="menu-function__icon fas fa-user-friends"></i>-->
                                               <img src = "img/reading.png" alt = "" style = "width:100%"> 
                                               <p class="menu-function__name">Độc giả</p>
                                            </div>
                                        </a>   
                                    </div>

                                    <div class="col-lg-4">
                                        <a href="borrowing.php" class="menu-function__link">
                                            <div class="menu-function__item yellow-color">
                                               <!--<i class="menu-function__icon fas fa-handshake"></i>-->
                                               <img src = "img/borrow.png" alt = "" style = "width:100%"> 
                                               <p class="menu-function__name">Mượn sách</p>
                                            </div>
                                        </a>   
                                    </div>

                                    <div class="col-lg-4">
                                        <a href="returning.php" class="menu-function__link">
                                            <div class="menu-function__item yellow-color">
                                               <!-- <i class="menu-function__icon far fa-handshake"></i>-->
                                               <img src = "img/return.png" alt = "" style = "width:100%"> 
                                               <p class="menu-function__name">Trả sách</p>
                                            </div>
                                        </a>   
                                    </div>

                                    <div class="col-lg-4">
                                        <a href="statistic.php" class="menu-function__link">
                                            <div class="menu-function__item green-color">
                                               <!-- <i class="menu-function__icon fas fa-chart-line"></i>-->
                                               <img src = "img/analytics.png" alt = "" style = "width:100%"> 
                                               <p class="menu-function__name">Thống kê</p>
                                            </div>
                                        </a>   
                                    </div> 
                                    
                                    <div class="col-lg-4">
                                        <a href="regulation.php" class="menu-function__link">
                                            <div class="menu-function__item green-color">
                                                <!-- <i class="menu-function__icon fas fa-align-justify"></i>-->
                                                <img src = "img/compliant.png" alt = "" style = "width:100%"> 
                                                <p class="menu-function__name">Quy định</p>
                                            </div>
                                        </a>   
                                    </div>
                                    
                                    <div class="col-lg-4">
                                        <a href="penalty.php" class="menu-function__link">
                                            <div class="menu-function__item green-color">
                                               <!-- <i class="menu-function__icon fas fa-align-justify"></i>-->
                                               <img src = "img/penalty.png" alt = "" style = "width:100%"> 
                                               <p class="menu-function__name">Phiếu phạt</p>
                                            </div>
                                        </a>   
                                    </div>

                                    <div class="col-lg-4">
                                        <a href="logout.php" class="menu-function__link">
                                            <div class="menu-function__item green-color">
                                               <!-- <i class="menu-function__icon fas fa-align-justify"></i>-->
                                               <img src = "img/penalty.png" alt = "" style = "width:100%"> 
                                               <p class="menu-function__name">Đăng xuất</p>
                                            </div>
                                        </a>   
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>          
                </div>  
            </div>

            <div class="footer">
                <span class="footer-info"><span>Made by MahHug - 2021</span></span>
            </div>
        </div>
    </body>
</html>