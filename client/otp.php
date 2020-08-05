<?php
require_once("../config/connection.php");
require_once("lib/function.php");
include('PHPMailer/PHPMailerAutoload.php');

if ($_SERVER["REQUEST_METHOD"]=="POST") {
	
	if(isset($_POST['username']) && !empty($_POST['username']))
	{
		
		$username = mysqli_real_escape_string($conn,$_POST['username']);
		
		$query = "select * from user1 where Email = '".$username."'";
	
		
		$result = mysqli_query($conn, $query);
		if (mysqli_num_rows($result) == 1) {
		
			$arr = array();
		$row=mysqli_fetch_assoc($result);
				$to = $row['Email'];
				$arr = $row	;
				
			$otp = mt_rand(000000,999999);
			$query1 = "update user1 set Otp = ".$otp.", Otpused = 0 where 
			Email = '".$to."'";
			$result1 = mysqli_query($conn,$query1);
			
			if ($result1) {
				$message = "<h3>Your new OTP is ".$otp.". Please do not share</h3> . <br> . <p>For further details you might visit our website</p>";
				$subject = "Request For OTP";		
				$mailSent = send_mail($to, $message, $subject);
				if ($mailSent) {
					session_start();
					$_SESSION['id'] = $to;
					echo "<script>
								window.location='resetpassword.php';
					      </script>";
				} else {
					
				}
				$array = array('status' => '200' , 'details' => $arr);
			}	
			
		}	
		
	} else {
		echo "Invalid Username"; die;
	}	 
}

?>
<html lang="en">
	
<!-- Mirrored from unicoderbd.com/theme/html/uniland/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 04 Jan 2019 19:31:17 GMT -->
<head>
		<!-- Meta Tag -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="Uniland - Real Estate HTML5 Template">
		<meta name="keywords" content="real estate, property, property search, agent, apartments, booking, business, idx, housing, real estate agency, rental">
		<meta name="author" content="unicoder">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<title>Dwelling Discoverer</title>
		<!-- Favicon -->
		<link rel="shortcut icon" href="img/favicon.ico">
		
		<!-- Bootstrap -->
		<link rel="stylesheet" href="css/bootstrap.css">
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/font-awesome.css">
		<link rel="stylesheet" href="css/color.css" id="color-change">
		<link rel="stylesheet" href="css/jslider.css">
		<link rel="stylesheet" href="css/responsive.css">
		<link rel="stylesheet" href="css/loader.css">
		
		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body class="pagewrap login_and_Signup">
		
		
		<section class="login-box">
			<!-- Modal -->
			<div id="myModal_two">
				<div class="modal-dialog toggle_area" role="document">
					<div class="modal-header toggle_header">
						<h4 class="inner-title">Forgot Password</h4>
					</div>
					<div class="modal-body login_body">
						<p>Welcome to Dwelling Discoverer, please sign in!</p>
						<div class="login_option">
							<form action="" method="post">
								<div class="form-group">
								<label>User Name</label>
									<input type="email" class="form-control" placeholder="Email@gmail.com" name="username">
								</div>
								<div class="form-group">
									<button type="submit" name="Submit" class="btn btn-default">Set New Password</button>
								</div>
							</form>
						</div>
					</div>
			</div>
		</section>
</html>