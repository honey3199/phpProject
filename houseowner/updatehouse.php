<!doctype html>
<?php
require_once('../config/connection.php');
session_start();
$id=$_SESSION['U_Id'];
if(isset($_GET['id']))
{
	$hid=$_GET['id'];
$sql="select * from house h join area a join user1 u join category c
 where h.A_Code=a.A_Code and h.User_Id=u.User_Id and h.Cat_Id=c.Cat_Id and u.User_Id='".$id."' and h.House_Id='".$hid."'";
$result = mysqli_query($conn,$sql);
$row=mysqli_fetch_array($result);
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
                    <h3>House Information</h3>
                </div>
                <div class="hpanel">
                    <div class="panel-body">
                        <form class="resistration" method="post" enctype="multipart/form-data" action="" id="loginForm">
                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <label>House Name</label>
                                    <input type="text" readonly name="hname" class="form-control" value="<?php echo $row['H_Name']?>">
                                </div>
								<div class="form-group col-lg-12">
								<label>Category</label>
								<select name="category" id="select" class="form-control">
								<?php
                                $sql3="select * from category";
								$result3 = mysqli_query($conn,$sql3);
								while($row3=mysqli_fetch_array($result3))
								{
								?>
								<option value='<?php echo $row3['Cat_Id'];?>'
								<?php if($id==$row['Cat_Name'])
									echo "selected"; ?>> 
								<?php echo $row3['Cat_Name'];?>
								<?php
								}
								?>
								</select>
								</div>
								<div class="form-group col-lg-12">
								<label>Address</label>
								 <input type="text" name="address" class="form-control" value="<?php echo $row['Address']?>">
								</div>
								<div class="form-group col-lg-12">
								<label>Area</label>
							<select name="area" id="select" class="form-control">
							 <?php
                                $sql3="select * from area";
								$result3 = mysqli_query($conn,$sql3);
								while($row3=mysqli_fetch_array($result3))
								{
							 ?>
								<option value='<?php echo $row3['A_Code'];?>'
								<?php if($id==$row['A_Name'])
								{echo "selected";} ?>> 
								<?php echo $row3['A_Name'];?>
								<?php
								}
								?>
                              </select>
								</div>
							  <div class="form-group col-lg-12">
                                    <label>Profile Image</label>
									<img id="output" height="100"/>
									<br/>
									<input type="file" name="image" accept="image/*"  
										onchange="loadFile(event)">
										

									<script>
									function loadFile(event) {
										document.getElementById('output').src = 
										URL.createObjectURL(event.target.files[0]);
										};
									</script>
									<br/>

                              </div>
							  <div class="form-group col-lg-12">
                                    <label>Description</label>
                                    <input type="text" name="desc" class="form-control" value="<?php echo $row['Description']?>">
                              </div>
							  <div class="form-group col-lg-12">
                                    <label>Rent / Month </label>
                                    <input type="text" name="rent" class="form-control" value="<?php echo $row['Rent']?>">
                              </div>
							  <div class="form-group col-lg-12">
                                    <label>Area(Square Foot)</label>
                                    <input type="text" name="square" class="form-control" value="<?php echo $row['Square_Foot']?>">
                              </div>
							  <div class="form-group col-lg-12">
                                    <label>No. of Rooms</label>
                                    <input type="text" name="room" class="form-control" value="<?php echo $row['No_of_Rooms']?>">
                              </div>
							    <div class="form-group col-lg-12">
                                    <label>Floor</label>
                                  <input type="text" readonly name="floor" class="form-control"  value="<?php echo $row['Floor']?>">
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
									   if (isset($_POST["hname"]) && isset ($_POST["category"]) && isset ($_POST["address"]) &&
									   isset($_POST["area"]) && isset ($_POST["desc"]) && isset ($_POST["rent"])
									   && isset ($_POST["square"])  && isset ($_POST["room"]) && isset ($_POST["floor"]))
									   {
											$cat=$_POST["category"];
											$address=$_POST["address"];
											$desc=$_POST["desc"];
											$rent=$_POST["rent"];
											$square=$_POST["square"];
											$room=$_POST["room"];
										   if(isset($_FILES['image']))
										   {
    
												$file_name = $_FILES['image']['name'];
												$file_tmp =$_FILES['image']['tmp_name'];
	  
												if(move_uploaded_file($file_tmp,"../profileimages/".$file_name)==1)
												{

												if($cat!='' && $address!='' && $desc!='' && $rent!='' && $square!='' && $room!='')
												{
													$sql2 = "update house set Cat_Id='".$cat."',Address='".$address."',Profile_Image='".$file_name."',
													Description='".$desc."',Rent='".$rent."',Square_Foot='".$square."',No_of_Rooms='".$room."' where User_Id='".$id."' and House_Id='".$hid."'";
													$result2=mysqli_query($conn,$sql2);
													if($result2)
													{
														echo "<meta http-equiv='refresh' content='3;url=house.php'>";
													}
												}
												}
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