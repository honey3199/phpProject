<?php include("header.php");?>
<!doctype html>
<?php
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
									
										   
										   if( $user!=''&& $address!=''&& $area!='' && 
										   $role!='' && $package!='' && $contact!='' && $email!=''
										   && $pass!='')
										    {
											   if ($pass == $pass1 )
											   {
											   $sql = "insert into user1(U_Name,Address,A_Code,MPackage_Id,Role_Id,ContectNo,Email,
											   Password,Reg_Date,IsActive)values('".$user."','".$address."','".$area."','".$package."',
											   '".$role."','".$contact."','".$email."','".$pass."','".$date."',1)";
											   //echo $sql;
											   //die;
											   $result=mysqli_query($conn,$sql);
											   }
											   else
											   {
												   echo "Password Mismatch";
											   }
											   if($result)
											   {
												   	echo "<meta http-equiv='refresh' content='3;url=logint.php'>";
											   }
										    }
							    }
							    else
							    {
								   echo "value not set";
							    }								
							}    
					   ?>

<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Register | jeweler - Material Admin Template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Play:400,700" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/owl.theme.css">
    <link rel="stylesheet" href="css/owl.transitions.css">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="css/normalize.css">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="css/main.css">
    <!-- morrisjs CSS
		============================================ -->
    <link rel="stylesheet" href="css/morrisjs/morris.css">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="css/scrollbar/jquery.mCustomScrollbar.min.css">
    <!-- metisMenu CSS
		============================================ -->
    <link rel="stylesheet" href="css/metisMenu/metisMenu.min.css">
    <link rel="stylesheet" href="css/metisMenu/metisMenu-vertical.css">
    <!-- calendar CSS
		============================================ -->
    <link rel="stylesheet" href="css/calendar/fullcalendar.min.css">
    <link rel="stylesheet" href="css/calendar/fullcalendar.print.min.css">
    <!-- forms CSS
		============================================ -->
    <link rel="stylesheet" href="css/form/all-type-forms.css">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="style.css">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- modernizr JS
		============================================ -->
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

    <div class="color-line"></div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="back-link back-backend">
                    
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12"></div>
            <div class="col-md-6 col-md-6 col-sm-6 col-xs-12">
                <div class="text-center custom-login">
                    <h3>Registration For Service Provider</h3>
                </div>
                <div class="hpanel">
                    <div class="panel-body">
                        <form class="resistration" method="post" action="" id="loginForm">
                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <label>Username</label>
                                    <input type="text" required class="form-control" name="U_Name">
									<span class="error"><?php echo $userErr;?></span>
                                </div>
								<div class="form-group col-lg-12">
								<label>Address</label>
								 <input type="text" required class="form-control" name="Address">
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
							    <div class="form-group col-lg-6">
                                    <label>Contact No.</label>
                                    <input type="text" required class="form-control" name="Contact_No">
									<span class="error"><?php echo $conErr;?></span>
                                </div>
                                
                                <div class="form-group col-lg-6">
                                    <label>Email Address</label>
                                    <input type="email" required class="form-control" name="email">
									<span class="error"><?php echo $emailErr;?></span>
                                </div>
								
                                <div class="form-group col-lg-6">
                                    <label>Password</label>
                                    <input type="password" required class="form-control" name="password">
									<span class="error"><?php echo $passErr;?></span>
                                </div>
                               <div class="form-group col-lg-6">
                                    <label>Confirm Password</label>
                                    <input type="password" required class="form-control" name="confirm_password">
									<span class="error"><?php echo $cpassErr;?></span>
                                </div>
                               
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-success loginbtn">Register</button>
                                <button type="reset" class="btn btn-default">Cancel</button>
                            </div>
                                <div class="form-group col-lg-12">
								</div>
								<div class="form-group col-lg-6">
                                    <label>Already have an Account?</label>
                                    <a href="login.php"><u>Sign In</u></a>
                                </div>
                        </form>
						
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12"></div>
        </div>
        
    </div>

    <!-- jquery
		============================================ -->
    <script src="js/vendor/jquery-1.11.3.min.js"></script>
    <!-- bootstrap JS
		============================================ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- wow JS
		============================================ -->
    <script src="js/wow.min.js"></script>
    <!-- price-slider JS
		============================================ -->
    <script src="js/jquery-price-slider.js"></script>
    <!-- meanmenu JS
		============================================ -->
    <script src="js/jquery.meanmenu.js"></script>
    <!-- owl.carousel JS
		============================================ -->
    <script src="js/owl.carousel.min.js"></script>
    <!-- sticky JS
		============================================ -->
    <script src="js/jquery.sticky.js"></script>
    <!-- scrollUp JS
		============================================ -->
    <script src="js/jquery.scrollUp.min.js"></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src="js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="js/scrollbar/mCustomScrollbar-active.js"></script>
    <!-- metisMenu JS
		============================================ -->
    <script src="js/metisMenu/metisMenu.min.js"></script>
    <script src="js/metisMenu/metisMenu-active.js"></script>
    <!-- tab JS
		============================================ -->
    <script src="js/tab.js"></script>
    <!-- icheck JS
		============================================ -->
    <script src="js/icheck/icheck.min.js"></script>
    <script src="js/icheck/icheck-active.js"></script>
    <!-- plugins JS
		============================================ -->
    <script src="js/plugins.js"></script>
    <!-- main JS
		============================================ -->
    <script src="js/main.js"></script>
</body>

</html>
<?php include("footer.php");?>