<!DOCTYPE html>
<?php
session_start();
?>
<html lang="en">
	
<!-- Mirrored from unicoderbd.com/theme/html/uniland/index_1.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 04 Jan 2019 19:27:46 GMT -->
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
		<link rel="stylesheet" href="fonts/flaticon.css">
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
	<body class="pagewrap home-page">
		
		<!-- Page Loader -->
		
		<!-- End Loader -->
		
		
		<header id="header">
			<!-- Top Header Start -->
			<div id="top_header">
				<div class="container">
					<div class="row">
						<div class="col-md-8 col-sm-5">
							<div class="top_contact">
								<ul>
									<li></li>
								</ul>
							</div>
						</div>
						<div class="col-md-4 col-sm-7">
							<div class="top_right">
								<ul>
								<?php if(isset($_SESSION['User_Id']))
								{
									?>
									<li><a href="logout.php" class="toogle_btn" >Logout</a></li>
								<?php
								}
								else
								{
								?>
									<li><a href="register.php" class="toogle_btn" >Register</a></li>
									<li><a href="login.php" class="toogle_btn" >Login</a></li>
								<?php
								}
								?>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Top Header End --> 
			
			<!-- Nav Header Start -->
			<div id="nav_header">
				<div class="container">
					<div class="row">
						<div class="col-md-12 col-sm-12">
						<div class="col-md-11 col-sm-12">
							<nav class="navbar navbar-default nav_edit"> 
								<!-- Brand and toggle get grouped for better mobile display -->
								<div class="navbar-header">
									<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"> 
										<span class="sr-only">Toggle navigation</span> 
										<span class="icon-bar"></span> 
										<span class="icon-bar"></span> 
										<span class="icon-bar"></span> 
									</button>
									<a class="navbar-brand" href="#"><img class="nav-logo" src="img/logo.png" alt=""></a> 
								</div>
								<!-- Collect the nav links, forms, and other content for toggling -->
								<div class="collapse navbar-collapse my_nav" id="bs-example-navbar-collapse-1">
									<ul class="nav navbar-nav navbar-right nav_text">
										<li class="dropdown">
											<a href="index.php" class="dropdown-toggle" role="button" aria-haspopup="true" aria-expanded="false">Home </a>
										</li>
										<li class="dropdown">
											<a href="property.php" class="dropdown-toggle" role="button" aria-haspopup="true" aria-expanded="false">Properties</a>
										</li>
										<li class="dropdown">
											<a href="tiffinservice.php" class="dropdown-toggle" role="button" aria-haspopup="true" aria-expanded="false">Tiffin Service</a>
										</li>
										<?php if(isset($_SESSION['User_Id']))
										{
										?>
										<li class="dropdown">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">My Bookings <i class="fa fa-caret-down" aria-hidden="true"></i></a>
											<ul class="dropdown-menu">
												<li><a href="appointmentlist.php">Appointment</a></li>
												<li><a href="bookinglist.php">House Booking</a></li>
												<li><a href="tiffinlist.php">Tiffin Service Booking</a></li>
											</ul>
										</li>
										<li class="dropdown">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Pages <i class="fa fa-caret-down" aria-hidden="true"></i></a>
											<ul class="dropdown-menu">
												<li><a href="myprofile.php">My Profile</a></li>
													<li><a href="insertfeedback.php">Feedback</a></li>
													<li class="dropdown">
														<a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Complaint <i class="fa fa-caret-right" aria-hidden="true"></i></a>
														<ul class="dropdown-menu">
															<li><a href="housecomplaint.php">House Comlaint</a></li>
															<li><a href="tiffincomplaint.php">Tiffin Complaint</a></li>
														</ul>
													</li>
											</ul>
										</li>
										<?php } ?>
										<li class="dropdown">
											<a href="contact.php" class="dropdown-toggle" role="button" aria-haspopup="true" aria-expanded="false">Contact</a>
										</li>
										<li class="dropdown">
											<a href="index.php#feedback" class="dropdown-toggle" role="button" aria-haspopup="true" aria-expanded="false">Feedback</a>
										</li>
									</ul>
								</div>
								<!-- /.navbar-collapse --> 
							</nav>
							</div>
							<div class="col-md-1 col-sm-12">
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Nav Header End -->
		</header>
		
