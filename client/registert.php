<!doctype html>
<?php
//include("header.php");
require_once('../config/connection.php');
?>
<?php						
$userErr=$addErr=$areaErr=$roleErr=$packageErr=$conErr=$emailErr=$passErr=$cpassErr="";

						   if ($_SERVER["REQUEST_METHOD"] =="POST")
						    {
								if(empty($_POST["U_Name"]))
								{
									$userErr= "User Name is  Required.";
								}
								else
								{
									$user = $_POST["U_Name"];
								}
								if(empty($_POST["Address"]))
								{
									$addErr= "Address is  Required.";
								}
								else
								{
									$address = $_POST["Address"];
								}
								if(empty($_POST["Area"]))
								{
									$areaErr= "Area Name is  Required.";
								}
								else
								{
									$area = $_POST["Area"];
								}
								if(empty($_POST["role"]))
								{
									$roleErr= "Role Name is Required. ";
								}
								else
								{
									$role = $_POST["role"];
								}
								if(empty($_POST["mpackage"]))
								{
									$packageErr= "Membership Package Name is Required. ";
								}
								else
								{
									$package = $_POST["mpackage"];
								}
								if(empty($_POST["Contact_No"]))
								{
									$conErr= "Contact No. is Required. ";
								}
								else
								{
									$contact = $_POST["Contact_No"];
								}
								if(empty($_POST["email"]))
								{
									$emailErr= "Email Id is Required. ";
								}
								else
								{
									$email = $_POST["email"];
								}
								if(empty($_POST["password"]))
								{
									$passErr= "Password is Required. ";
								}
								else
								{
									$pass = $_POST["password"];
								}
								if(empty($_POST["confirm_password"]))
								{
									$cpassErr= "Password is  Required.";
								}

							    if (isset($_POST["U_Name"]) && isset($_POST["Address"]) && isset($_POST["Area"]) &&
								isset($_POST["role"]) && isset($_POST["mpackage"]) && isset($_POST["Contact_No"]) && 
								 isset($_POST["email"]) && isset($_POST["password"]))
								{
										   $user=$_POST["U_Name"];
										   $address=$_POST["Address"];
										   $area=$_POST["Area"];
										   $role=$_POST["role"];
										   $package=$_POST["mpackage"];
										   $contact=$_POST["Contact_No"];
										   $email=$_POST["email"];
										   $pass=$_POST["password"];
										   $pass1=$_POST["confirm_password"]; 
										   $date=date('y-m-d');
										
											$query = "select Duration from membership_package where MPackage_Id='".$package."'";
											$results = mysqli_query($conn,$query);
											$rows = mysqli_fetch_array($results);
											$end = $rows['Duration'];
										   
										   if( $user!=''&& $address!=''&& $area!='' && 
										   $role!='' && $package!='' && $contact!='' && $email!=''
										   && $pass!='')
										    {
											   if ($pass == $pass1 )
											   {
												   
												$effectiveDate = date('Y-m-d', strtotime("+$end months", strtotime($date)));

												
											   $sql = "insert into user1(U_Name,Address,A_Code,MPackage_Id,Role_Id,ContectNo,Email,
											   Password,Reg_Date,End_Date)values('".$user."','".$address."','".$area."','".$package."',
											   '".$role."','".$contact."','".$email."','".$pass."','".$date."','".$effectiveDate."')";
											   //echo $sql;
											   //die;
											   $result=mysqli_query($conn,$sql);
											   if($result)
											   {
													$id = mysqli_insert_id($conn);
												
												   	echo "<meta http-equiv='refresh' content='0;url=payment.php?id=$id'>";
											   
													echo "Test"	;
													die;
											   }
											   }
											   else
											   {
												   echo "Password Mismatch";
											   }
											   
										    }
							    }
							    else
							    {
								   echo "value not set";
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
		
<div class="row">
		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"></div>
           <br/>
		   <br/>
		<section class="reg_popup">
			<!-- Modal -->
			<div id="myModal">
				<div class="modal-dialog toggle_area" role="document">
					<div class="modal-header toggle_header">
						<h4 class="inner-title">Create An Account As Service Provider </h4>
					</div>
					<div class="modal-body">
						<form class="registation" action="" method="post">
							<div class="signup_option">
                                <div class="form-group col-lg-12">
                                    <label>Username</label>
                                    <input type="text" class="form-control" name="U_Name">
									<span class="error"><?php echo $userErr;?></span>
                                </div>
								<div class="form-group col-lg-12">
								<label>Address</label>
								 <input type="text" class="form-control" name="Address">
								 <span class="error"><?php echo $addErr;?></span>
								</div>
								<div class="form-group col-lg-12">
								<label>Area</label>
							<select name="Area" id="select" class="form-control">
							 <?php
                                $sql="select * from area";
								$result = mysqli_query($conn,$sql);
								while($row=mysqli_fetch_array($result))
								{
							 ?>
								<option value="<?php echo $row['A_Code'];?>"> 
								<?php echo $row['A_Name'];?>
								<?php
								}
								?>
                              </select>
							  <span class="error"><?php echo $areaErr;?></span>
								</div>
							  <div class="form-group col-lg-12">
							  <label>Role</label>
							 <select name="role" id="select" class="form-control">
							 <?php
                                $sql="select * from role where Role_Id!=2 and Role_Id != 1";
								$result = mysqli_query($conn,$sql);
								while($row=mysqli_fetch_array($result))
								{
							 ?>
								<option value="<?php echo $row['Role_Id'];?>"> 
								<?php echo $row['Role_Name'];?>
								<?php
								}
								?>
                              </select>	
							  <span class="error"><?php echo $roleErr;?></span>
							  </div>
							  <div class="form-group col-lg-12">
							  <label>Membership Package</label>
							 <select name="mpackage" id="select" class="form-control">
							 <?php
                                $sql="select * from membership_package";
								$result = mysqli_query($conn,$sql);
								while($row=mysqli_fetch_array($result))
								{
							 ?>
								<option value="<?php echo $row['MPackage_Id'];?>"> 
								<?php echo $row['Package_Name'];?>
								<?php
								}
								?>
                              </select>	
							  <span class="error"><?php echo $packageErr;?></span>
							  </div>
							    <div class="form-group col-lg-12">
                                    <label>Contact No.</label>
                                    <input type="text"  class="form-control" name="Contact_No">
									<span class="error"><?php echo $conErr;?></span>
                                </div>
                                
                                <div class="form-group col-lg-12">
                                    <label>Email Address</label>
                                    <input type="email" class="form-control" name="email">
									<span class="error"><?php echo $emailErr;?></span>
                                </div>
								
                                <div class="form-group col-lg-6">
                                    <label>Password</label>
                                    <input type="password"  class="form-control" name="password">
									<span class="error"><?php echo $passErr;?></span>
                                </div>
                               <div class="form-group col-lg-6">
                                    <label>Confirm Password</label>
                                    <input type="password"  class="form-control" name="confirm_password">
									<span class="error"><?php echo $cpassErr;?></span>
                                </div>
                               
                            </div>
							<br/>
                        <div class="text-center">
							<br/>
							<button type="submit" name="registration" class="btn btn-default">Sign Up</button>
							<button type="reset" class="btn btn-default">Cancel</button>
						</div>
								<div class="row">
								</div>
								<br/>
								<div class="form-group col-lg-12">
                                    <label>Already have an Account?</label>
                                    <a href="login.php"><u>Sign In</u></a>
                                </div>
								<div class="row"></div>
							</form>
						
						</div>
					</div>
			</div>	
		</section>
</div>
</html>
<?php include("footer.php");?>