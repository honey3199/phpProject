<!doctype html>
<?php
require_once('../config/connection.php');
session_start();
$id=$_SESSION['U_Id'];
$sql="select * from user1 u join area a join role r join membership_package m
 where u.A_Code=a.A_Code and u.Role_Id=r.Role_Id and u.MPackage_Id=m.MPackage_Id and User_Id='".$id."'";
$result = mysqli_query($conn,$sql);
$row=mysqli_fetch_array($result);
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
                    <a href="index.php" class="btn btn-primary">Back to Dashboard</a>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12"></div>
            <div class="col-md-6 col-md-6 col-sm-6 col-xs-12">
                <div class="text-center custom-login">
                    <h3>Personal Information</h3>
                </div>
                <div class="hpanel">
                    <div class="panel-body">
                        <form class="resistration" method="post" action="" id="loginForm">
                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <label>Username</label>
                                    <input type="text" name="name" class="form-control" value="<?php echo $row['U_Name']?>">
                                </div>
								<div class="form-group col-lg-12">
								<label>Address</label>
								 <input type="text" name="address" class="form-control" value="<?php echo $row['Address']?>">
								</div>
								<div class="form-group col-lg-12">
								<label>Area</label>
								<select name="area" id="select" class="form-control">
								<?php $sql3="select * from area";
																$result3=mysqli_query($conn,$sql3);
																while($row3=mysqli_fetch_array($result3))
																{
															?>
																<option value='<?php echo $row3['A_Code']; ?>'
																<?php if($row['A_Code']==$row3['A_Code'])
																{echo "selected";} ?>>
																<?php echo $row3['A_Name']; ?>
																</option>
															<?php
															}
															?>
								</select>
								</div>
							
							  <div class="form-group col-lg-12">
                                    <label>Role</label>
                                    <input type="text" readonly name="role" class="form-control" value="<?php echo $row['Role_Name']?>">
                              </div>
							  <div class="form-group col-lg-12">
							  <label>Membership Package</label>
							 <select name="mpackage" id="select" class="form-control">
							<?php $sql4="select * from membership_package";
																$result4=mysqli_query($conn,$sql4);
																while($row4=mysqli_fetch_array($result4))
																{
															?>
																<option value='<?php echo $row4['MPackage_Id']; ?>'
																<?php if($row['MPackage_Id']==$row4['MPackage_Id'])
																{echo "selected";} ?>>
																<?php echo $row4['Package_Name']; ?>
																</option>
															<?php
															}
															?>
								 </select>	
							  </div>
							    <div class="form-group col-lg-6">
                                    <label>Contact No.</label>
                                  <input type="text" name="contact" class="form-control"  value="<?php echo $row['ContectNo']?>">
                                </div>
                                
                                <div class="form-group col-lg-6">
                                    <label>Email Address</label>
                                    <input type="text" class="form-control" value="<?php echo $row['Email']?>" name="email">
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-success loginbtn">Save Changes</button>
                                <button type="reset" class="btn btn-default">Cancel</button>
                            </div>
                        </form>
					<?php
						           
								   if ($_SERVER["REQUEST_METHOD"] =="POST")
								   {
									   if (isset($_POST["name"]) && isset ($_POST["address"]) &&
									   isset($_POST["area"]) && isset($_POST["role"]) && isset ($_POST["mpackage"])
									   && isset ($_POST["contact"])  && isset ($_POST["email"]))
									   {
											$name=$_POST["name"];
											$address=$_POST["address"];
											$area=$_POST["area"];
											$mpackage=$_POST["mpackage"];
											$contact=$_POST["contact"];
											$email=$_POST["email"];
											
											if($name!='' && $address!='' && $area!='' && $mpackage!='' && $contact!='' && $email!='')
										   {
											   $sql2 = "update user1 set U_Name='".$name."',Address='".$address."',A_Code='".$area."',
												MPackage_Id='".$mpackage."',ContectNo='".$contact."',Email='".$email."' where User_Id='".$id."'";
											   $result2=mysqli_query($conn,$sql2);
											   if($result2)
											   {
												   echo "<meta http-equiv='refresh' content='3;url=user.php'>";
											   }
										   }
										   else
										   {
											   echo "value is null.";
										   }
										}
										else
										{
											echo"value not set";
										}
								   }
								   ?>	
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