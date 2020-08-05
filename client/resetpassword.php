<!DOCTYPE html>
<?php
session_start();
require_once("../config/connection.php");

if ($_SERVER["REQUEST_METHOD"] ==  "POST")
{
	
	   $id = $_SESSION['id'];
	   $otp = $_POST["oldpwd"];
	   $npass = $_POST["newpwd"];
	   $cpass = $_POST["newpwd1"];
	   
	   if($npass != $cpass)
	   {
		   echo "Password must be same";
		   exit;
	   }
	     $query = "update user1 set Otpused = 1, Password = '".$npass."' 
		 where Email = '".$id."' and Otp = '".$otp."'";
		 
		 echo $query;
		 
		 $result = mysqli_query($conn,$query);
		 
		 
		       if($result)
		      {
				  echo "   <script>
				  alert('Password successfully Reset !');
				  window.location='login.php';
				  </script>";
		       
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
		
		<!-- Page Loader -->
		
		<!-- End Loader -->
		
		
		
		<section class="login-box">
			<!-- Modal -->
			<div id="myModal_two">
				<div class="modal-dialog toggle_area" role="document">
					<div class="modal-header toggle_header">
						<h4 class="inner-title">Change Password</h4>
					</div>
					<div class="modal-body login_body">
						<p>Welcome to Dwelling Discoverer, please sign in!</p>
						<div class="login_option">
							<form class="signin" action="#" method="post">
								<div class="form-group">
								<label>OTP</label>
									<input type="password" class="form-control" placeholder="OTP" name="oldpwd">
								</div>
								<div class="form-group">
								<label>New Password</label>
									<input type="Password" class="form-control" placeholder="New Password" name="newpwd">
								</div>
								<div class="form-group">
								<label>Re-type New Password</label>
									<input type="password" class="form-control" placeholder="Re-type New Password" name="newpwd1">
								</div>
								<div class="form-group">
									<button type="submit" name="signin" class="btn btn-default">Set New Password</button>
								</div>
							</form>
						</div>
					</div>
			</div>
		</section>
</html>