<!DOCTYPE html>
<?php
	//require_once 'valid.php';
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
		<link rel = "stylesheet" type = "text/css" href = "bootstrap/bootstrap-3.3.7/bootstrap.min.css" />	
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src = "DataTables/datatables.min.js"></script>
		<script src = "chosen_v1.8.7/chosen.jquery.min.js"></script>
	</head>

	<body class = "body">
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
						<div class = "col-lg-2 style2" style = "">
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
							<div class = "alert alert-info alert__label" style ="border-radius:50px;">Quy định</div>
								<div class = "menu-regulation">
									<button id = "add_book" type = "button" class = "btn btn-primary pull-left" style = "border-radius:50px;width:210px;outline:none;"><i class=""></i>Nội quy thư viện</button> 
									<button id = "add_book1" type = "button" class = "btn btn-primary pull-left" style = "border-radius:50px;width:210px;outline:none;"><i class=""></i>Quy định phạt trễ hạn</button>
									<button id = "add_book2" type = "button" class = "btn btn-primary pull-left" style = "border-radius:50px;width:210px;outline:none;"><i class=""></i>Quy định về mượn trả tài liệu</button>
									<button id = "add_book3" type = "button" class = "btn btn-primary pull-left" style = "border-radius:50px;width:210px;outline:none;"><i class=""></i>Vị trí để sách</button>
								</div>
								<button id = "show_book" type = "button" style = "display:none;border-radius:50px;width:100px;outline:none;" class = "btn btn-success"><i class="fas fa-backspace" ></i></button>
								<button id = "show_book1" type = "button" style = "display:none;border-radius:50px;width:100px;outline:none;" class = "btn btn-success"><i class="fas fa-backspace" ></i></button>
								<button id = "show_book2" type = "button" style = "display:none;border-radius:50px;width:100px;outline:none;" class = "btn btn-success"><i class="fas fa-backspace" ></i></button>
								<button id = "show_book3" type = "button" style = "display:none;border-radius:50px;width:100px;outline:none;" class = "btn btn-success"><i class="fas fa-backspace" ></i></button>
								<br />
								
																		
								<div id = "book_form" style = "display:none;">
									<div class = "col-lg-1"></div>
									<div class = "col-lg-10">
									<p class = "text-content">									
										1.	Bạn đọc xuất trình thẻ cho thủ thư tại bàn trực ở cửa ra vào. Việc trình thẻ là bắt buộc, nếu bạn đọc không tuân thủ sẽ bị từ chối quyền sử dụng các dịch vụ của Thư viện.<br/><br/>

										2.	Tập trung tư trang và tài liệu cá nhân tại nơi quy định, Bạn đọc tự bảo quản tiền và tài sản. Dùng xong tủ phải khóa tủ trước khi trả chìa khóa.<br/><br/>

										3.	 Trang phục nghiêm túc; giữ gìn vệ sinh, không mang theo đồ ăn uống; giữ trật tự. Tuyệt đối không hút thuốc trong thư viện, không được mặc áo khoác khi vào kho sách.<br/><br/>

										4.	 Điện thoại phải để chế độ rung, không mang các vật dễ cháy nổ vào khu vực thư viện.<br/><br/>

										5.	 Bạn đọc được đọc tài liệu tự do trong kho. Nếu mang tài liệu ra khỏi kho tài liệu, bạn đọc phải đăng ký mượn nơi quầy lưu hành.<br/><br/>

										6.	 Bạn đọc giữ gìn máy móc, trang thiết bị và tài liệu của thư viện; không tự ý mang tài sản, tài liệu ra khỏi thư viện. Bạn đọc làm mất, hư hỏng tài sản của thư viện phải bồi thường theo quy định.<br/><br/>

										7.	 Bạn đọc cần sử dụng máy tính và internet phải đăng ký tại quầy lưu hành và tuân thủ theo những quy định về sử dụng máy tính trong thư viện.<br/><br/>

										8.	 Thời gian phục vụ : THỨ 2 – CHỦ NHẬT : 9h - 19h<br/><br/>
										
										9.	Bạn đọc vi phạm nội quy này, tuỳ theo mức độ sẽ bị xử lý kỷ luật theo quy định của thư viện.
									</p>
									</div>	
								</div>

								<div id = "book_form1" style = "display:none;">
									<div class = "col-lg-1"></div>
									<div class = "col-lg-10">						
									<p class="text-heading">Điều 1. Số lượng sách mượn và thời gian mượn sách</p>
										<p class = "text-content">
										- Thư viện có trách nhiệm thông báo đến bạn đọc số lượng tài liệu cho một lần mượn và số ngày bạn đọc được mượn tài liệu; niêm yết văn bản này tại tất cả các phòng đọc và phổ biến trên trang web của Thư viện.<br/>
										- Nếu ngày trả sách của bạn đọc  rơi vào ngày Thư viện đóng cửa (tuyển sinh, nghỉ Lễ, Tết, kiểm kê), bạn đọc được tính ngày trả sách vào ngày Thư viện mở cửa trở lại.
										</p>
									<p class="text-heading">Điều 2. Trách nhiệm của bạn đọc</p>
										<p class = "text-content">
										- Bạn đọc có trách nhiệm trả sách Thư viện đúng hạn quy định và còn nguyên hiện trạng.<br/>
										- Bạn đọc giữ sách quá hạn sẽ bị nhà trường phạt theo điều 4 của Quy định này.
										</p>
									<p class="text-heading">Điều 3. Mức phạt quá hạn</p>
										<p class = "text-content">
										- Bạn đọc mượn quá hạn so với số ngày quy định theo điều 2 của Quy định này sẽ bị phạt số tiền 2.000đ/quyển sách/ngày quá hạn 
										</p>
									<p class="text-heading">Điều 4. Thời hạn đóng phạt</p>
										<p class = "text-content">
										- Bạn đọc phải đóng phạt ngay khi trả sách. Bạn đọc không có điều kiện đóng phạt ngay thì phải ghi bản cam kết hẹn ngày nộp. Thời gian cam kết nộp phạt không quá 01 tuần kể từ ngày trả sách.
										</p>
									<p class="text-heading">Điều 5. Xử lý bạn đọc không trả sách và không đóng phạt mượn quá hạn</p>
										<p class = "text-content">
										- Không được tiếp tục sử dụng thư viện.
										</p>
									</div>	
								</div>

								<div id = "book_form2" style = "display:none;">
									<div class = "col-lg-1"></div>
									<div class = "col-lg-10">
										<p class="text-heading">Về việc mượn tài liệu </p>
										<p class="text-content">
										1. Bạn đọc phải trình Thẻ sinh viên và tài liệu cần mượn cho thủ thư để đăng ký mượn tài liệu đọc tại chỗ hoặc mang về nhà.<br/><br/>
										2. Thời điểm được mượn tài liệu về nhà sẽ do Thư viện quy định theo từng thời kỳ nhất định và được thông báo tại Thư viện và trên website của Thư viện.<br/><br/>
										3. Không được mượn tài liệu trong 30 phút trước giờ đóng cửa và vào những thời điểm có phục vụ buổi tối, Thư viện chỉ mở cửa kho đến 19h00.<br/><br/>
										4. Trước khi rời khỏi quầy Mượn tài liệu bạn đọc phải kiểm tra tình trạng sách. Nếu phát hiện tài liệu bị rách, mất trang phải báo ngay cho Thủ thư. Các trường hợp tài liệu được trả bị hư hỏng so với khi mượn bạn đọc phải chịu trách nhiệm đền bù.<br/><br/>
										5. Bạn đọc không được mang tài liệu mượn đọc tại chỗ ra khỏi Thư viện.<br/>					
										</p>
										<p class="text-heading">Về việc trả tài liệu</p>
										<p class="text-content">
										6. Ngày trả các tài liệu mượn về do Thư viện quy định và được thông báo ngay tại Quầy Thủ Thư ngay sau khi đăng ký mượn. Bạn đọc có trách nhiệm trả lại các tài liệu đã mượn về nhà cho Thư viện theo thời hạn quy định được ghi trên giấy báo.<br/><br/>        
										7. Bất kỳ tài liệu mượn đều có thể được thu hồi trước kỳ hạn nếu có yêu cầu theo kế hoạch đột xuất của Thư viện. Trong thời hạn bảy ngày sau khi nhận được yêu cầu thu hồi tài liệu, bạn đọc phải mang trả lại tài liệu đó cho Thư viện.        
										</p>
									</div>	
								</div>

								<div id = "book_form3" style = "display:none;">
									<div class = "col-lg-3"></div>
									<div class = "col-lg-6">
										<p class = "text-content" style = "font-size:21px;">							
											A : Sách Chính trị – pháp luật <br/>
											B : Sách Khoa học công nghệ – Kinh tế <br/>
											C : Sách Văn học nghệ thuật <br/>
											D : Sách Văn hóa xã hội – Lịch sử <br/>
											E : Sách Giáo trình <br/>
											F : Sách Truyện, tiểu thuyết <br/>
											G : Sách Tâm lý, tâm linh, tôn giáo <br/>
											H : Sách Thiếu nhi 								
										</p>
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
	
	<!-- tạo form datatable -->
	<script type = "text/javascript">
		$(document).ready(function(){
			$('#table').DataTable();
		});
	</script>
	<!-- tạo hiệu ứng khi nhấn nút quy định -->
	<script type = "text/javascript">
		$(document).ready(function(){
			$('#add_book').click(function(){
				$(this).hide();
                $('#add_book1').hide();
                $('#add_book2').hide();
				$('#add_book3').hide();
				$('#show_book').show();
				//$('#book_table').slideUp();
				$('#book_form').slideDown();
				$('#show_book').click(function(){
					$(this).hide();
					$('#add_book').show();
                    $('#add_book1').show();
                    $('#add_book2').show();
					$('#add_book3').show();
					//$('#book_table').slideDown();
					$('#book_form').slideUp();					
				});
			});

            $('#add_book1').click(function(){
				$(this).hide();
                $('#add_book').hide();
                $('#add_book2').hide();
				$('#add_book3').hide();
				$('#show_book1').show();
				//$('#book_table').slideUp();
				$('#book_form1').slideDown();
				$('#show_book1').click(function(){
					$(this).hide();
					$('#add_book').show();
                    $('#add_book1').show();
                    $('#add_book2').show();
					$('#add_book3').show();
					//$('#book_table').slideDown();
					$('#book_form1').slideUp();
				});
			});

            $('#add_book2').click(function(){
				$(this).hide();
                $('#add_book').hide();
                $('#add_book1').hide();
				$('#add_book3').hide();
				$('#show_book2').show();
				//$('#book_table').slideUp();				
				$('#book_form2').slideDown();
				$('#show_book2').click(function(){
					$(this).hide();
					$('#add_book').show();
                    $('#add_book1').show();
                    $('#add_book2').show();
					$('#add_book3').show();
					//$('#book_table').slideDown();
					$('#book_form2').slideUp();
				});
			});

			$('#add_book3').click(function(){
				$(this).hide();
                $('#add_book').hide();
                $('#add_book1').hide();
				$('#add_book2').hide();
				$('#show_book3').show();
				//$('#book_table').slideUp();				
				$('#book_form3').slideDown();
				$('#show_book3').click(function(){
					$(this).hide();
					$('#add_book').show();
                    $('#add_book1').show();
                    $('#add_book2').show();
					$('#add_book3').show();
					//$('#book_table').slideDown();
					$('#book_form3').slideUp();
				});
			});
		});
	</script>

    
	
</html>