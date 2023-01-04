<!DOCTYPE html>
<html lang="en">
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
<body class ="body1">
	<!--<div class = "login-page">
		<div class ="form">
			<form action ="login.php" method = "POST" role ="form" class="login-form">
				<input type="text" placeholder="username" name = "username" required = "required"/>
				<input type="password" placeholder="password" name = "password" required = "required"/>
				<button type = "submit" name = "login">Đăng nhập</button>
			</form>
		</div>
	</div>-->
	
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-2"></div>
            <div class="col-lg-6 col-md-8 login-box">
                
					<img src="img/logohkt.png" style="" class="login-key" >
               
                <div class="col-lg-12 login-form">
                    <div class="col-lg-12 login-form">
                        <form action ="login.php" method = "POST" role ="form">
                            <div class="form-group">
                                <label class="form-control-label">USERNAME</label>
                                <input type="text" name = "username" class="form-control" required = "required">
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">PASSWORD</label>
                                <input type="password" name = "password" class="form-control" required = "required">
                            </div>

                            <div class="col-lg-12 loginbttm">
                                <div class="col-lg-6 login-btm login-text">
                                    <!-- Error Message -->
                                </div>
                                <div class="col-lg-6 login-btm login-button">
                                    <button type="submit" name = "login" class="btn btn-outline-primary">LOGIN</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-3 col-md-2"></div>
            </div>
        </div>





</body>
</html>