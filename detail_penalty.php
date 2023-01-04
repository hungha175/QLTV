<?php
	require_once 'connect.php';
	$q_penalty = $conn->query("SELECT * FROM `penalty` WHERE `penalty_id` = '$_REQUEST[penalty_id]'") or die(mysqli_error());
	$f_penalty = $q_penalty->fetch_array();


?>

<div class = "col-lg-12" style = "background-color:white;">

	<form method = "POST" action = "edit_penalty_query.php?penalty_id=<?php echo $f_penalty['penalty_id']?>" enctype = "multipart/form-data">
		<!--<div class = "form-group form-group__heading">Phiếu đóng phạt trễ hạn</div>
		<div class = "form-group">
			<label>Mã phiếu:</label>
			<p><?php echo $f_penalty['penalty_id']?></p>
		</div>
		<div class = "form-group">
			<label>Tên độc giả:</label>
			<p><?php echo $f_penalty['penalty_name']?></p>
		</div>
		<div class = "form-group">
			<label>Ngày lập phiếu:</label>
			<p><?php echo $f_penalty['penalty_date']?></p>
		</div>
		<div class = "form-group">
			<label>Số tiền phải đóng:</label>
			<p><?php echo $f_penalty['penalty_fine']?></p>
		</div>-->
		
			<pre style ="font-size:14px;">
                                                PHIẾU THU
                                               Mã phiếu: <?php echo $f_penalty['penalty_id']?> 

Ngày lập: <?php echo date("d / m / Y", strtotime($f_penalty['penalty_date']))?> 

Họ và tên người nộp tiền:  <?php echo $f_penalty['penalty_name']?>


Lý do nộp:   <?php echo $f_penalty['penalty_reason']?>


Số tiền:  <?php echo $f_penalty['penalty_fine']?>đ

(Viết bằng chữ):....................................................

   Kế toán trưởng                               Người nộp tiền                                 Thủ quỹ
    (Ký, họ tên)                                 (Ký, họ tên)                                (Ký, họ tên)








Đã nhận đủ số tiền (viết bằng chữ):...........................................................
			</pre>
		
	</form>			
</div>
<button onclick = "window.print();" class = "btn btn-primary pull-right" id = "print-btn">
	<div>
		<img src ="img/printer.png" style = "width:30px;height:30px;">
	</div>
</button>