<!doctype html>

<?php
require_once("../config/connection.php");
if(isset($_GET['id']))
{
	$id = $_GET['id'];
	$u = "update user1 set Payment_Status = 1 where User_Id = $id";
	$r = mysqli_query($conn,$u);
	
}

?>

<?php 
//include("header.php");

session_start();
$emailErr=$passErr="";
$Email=$Password="";

	
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		if(empty($_POST["username"]))
		{
			$emailErr= "email is required";
		}
		else
		{
			$Email = $_POST["username"];
		}
		if(empty($_POST["password"]))
		{
			$passErr= "password is required";
		}
		else
		{
			$Password = $_POST["password"];
		}
		if(isset($_POST["username"]) && isset($_POST["password"]))
		{
			$Email = $_POST["username"];
			$Password = $_POST["password"];
			$date = date('Y-m-d');
			
			if($Email != '' && $Password != '')
			{
				$query = "select * from user1 u join role r where Email = '".$Email."' 
				and Password='".$Password."' and r.Role_Id=u.Role_Id and u.Payment_Status=1 and u.End_Date > '".$date."'";	
				//echo $query;
				//die;
				$result = mysqli_Query($conn,$query);
				
				if (mysqli_num_rows($result) == 1)
				{
					$row = mysqli_fetch_array($result);
					
					if($row['Role_Id']==3)
					{
						$_SESSION['U_Id'] = $row['User_Id'];
						header("Location:../houseowner/index.php");
					}
					else if($row['Role_Id']==4)
					{
						$_SESSION['User'] = $row['User_Id'];
						header("Location:../tiffin/index.php");
					}
					else
					{
						header("Location:login.php?error=Invalid username or password");
					}
				}
				else
				{
					header("Location:login.php?error=Invalid username or password");
				}
			
			}
			else
			{
				echo"value is null";
			}
		
		}
		else
		{
			echo"null value";
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
	
	</head>
	<body class="pagewrap login_and_Signup">
		<section class="login-box">
			<!-- Modal -->
			<div id="myModal_two">
			<br/>
			<br/>
				<div class="modal-dialog toggle_area" role="document">
					<div class="modal-header toggle_header">
						<h4 class="inner-title">Sign In Account</h4>
					</div>
					<div class="modal-body login_body">
						<p>Welcome to Dwelling Discoverer, please sign in!</p>
						<div class="login_option">
                        <form action="" id="loginForm" method="post">
                            <div class="form-group">
                                <label class="control-label" for="username">Username</label>
                                <input type="email" required placeholder="example@gmail.com" title="Please enter you username" required="" value="" name="username" id="username" class="form-control">
                                
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="password">Password</label>
                                <input type="password" required title="Please enter your password" placeholder="******" required="" value="" name="password" id="password" class="form-control">
                                
                            </div>
                            <div class="form-group">
								<button type="submit" name="signin" class="btn btn-default">Sign In</button>
							</div>
                        <div class="submit_area"><span><a href="otp.php">Forgot Password?</a>
						   <a href="reset.php">&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
							 &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp Reset Password?</a>
                           </span></div>
						   <div class="submit_area"><span><a href="registert.php">&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
						   &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <b> <i> <u>Sign Up</u></i></b></a></span></div>
					</div>
			</div>
		</section>
</html>
<?php include("footer.php");?>