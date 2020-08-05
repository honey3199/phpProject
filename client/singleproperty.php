<?php
include ("header.php");
require_once("../config/connection.php");
if(isset($_GET['hid']))
{
	$hid=$_GET['hid'];
	//$id=$row['House_Id'];
	$sql="select * from house h join house_images i join category c join area a join
	user1 u where h.House_Id=i.House_Id and h.Cat_Id=c.Cat_Id and a.A_Code=h.A_Code 
	and h.User_Id=u.User_Id and h.House_Id='".$hid."'  and h.IsActive=1 and h.IsAvailable=1";
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_array($result);
	$cat = $row['Cat_Id'];
}

if($_SERVER["REQUEST_METHOD"]=="POST")
{
	if(isset($_SESSION['User_Id']))
	{
		echo "<meta http-equiv='refresh' content='0;url=bookhouse.php?id=$hid'>";
	}
	else
	{
		echo "<meta http-equiv='refresh' content='0;url=login.php'>";
	}
}
?>		

		<link rel="stylesheet" href="css/bootstrap.css">
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/font-awesome.css">
		<link rel="stylesheet" href="fonts/flaticon.css">
		<link rel="stylesheet" href="css/color.css" id="color-change">
		<link rel="stylesheet" href="css/jslider.css">
		<link rel="stylesheet" href="css/responsive.css">
		<link rel="stylesheet" href="css/loader.css">
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/bootstrap-select.js"></script>
		<script src="js/YouTubePopUp.jquery.js"></script>
		<script src="js/jquery.fancybox.pack.js"></script>
		<script src="js/jquery.fancybox-media.js"></script>
		<script src="js/owl.js"></script>
		<script src="js/mixitup.js"></script>
		<script src="js/wow.js"></script>
		<script src="js/jshashtable-2.1_src.js"></script> 
		<script src="js/jquery.numberformatter-1.2.3.js"></script> 
		<script src="js/tmpl.js"></script>
		<script src="js/jquery.dependClass-0.1.js"></script> 
		<script src="js/draggable-0.1.js"></script> 
		<script src="js/jquery.slider.js"></script>
		<script src="js/jquery.barrating.js"></script>
		<script src="js/custom.js"></script>



		<!-- Banner Section Start -->
		<section id="banner">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="banner_area">
							<h3 class="page_title">Single Property</h3>
							<div class="page_location">
								<a href="">Home</a> 
								<i class="fa fa-angle-right" aria-hidden="true"></i> 
								<span>Single Property</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- Banner Section End -->
		
		<!-- Single Property Start -->
		<section id="single_property">
			<div class="container">
				<div class="row">
					<div class="col-md-8">
						<div class="row">
							<div class="col-md-12">
								<div class="property_slider">
									<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">										
										<!-- Wrapper for slides -->
										<div class="carousel-inner" role="listbox">	
									<?php
										
								$sql2 = "SELECT * FROM house_images where House_Id = '".$hid."'";			
								$result2 = mysqli_query($conn,$sql2);
								$row2=mysqli_fetch_array($result2);
								?>
									
											<div class="item active">
												<img src="../images/<?php echo $row2['Image_Path']?>" alt="">
											</div>
									<?php
										$row2=mysqli_fetch_array($result2);
									?>
										
											<div class="item">
												<img src="../images/<?php echo $row2['Image_Path']?>" alt="">
											</div>

									<?php
										$row2=mysqli_fetch_array($result2);
									?>
								
											<div class="item">
												<img src="../images/<?php echo $row2['Image_Path']?>" alt="">
											</div>

								
										</div>
										<!-- Controls -->
										<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
											<div class="lef_btn">prev</div>
											<span class="sr-only">Previous</span>
										</a>
										<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
											<div class="right_btn">next</div>
											<span class="sr-only">Next</span>
										</a>
									</div>
								</div>
							</div>
						</div>						
						<div class="row">
							<div class="col-md-12">
								<div class="detail_text">
									<div class="property-text">
										<h4 class="property-title"><?php echo $row['H_Name']?> at <?php echo $row['A_Name']?> </h4>
										<span><i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo $row['Address']?> </span>
										<span><i class="" aria-hidden="true"></i> <?php echo $row['Description']?> </span>
									</div>
								</div>
								<div class="more_information">
									<h4 class="inner-title">More Information</h4>
									<div class="profile_data">
										<ul>
										<li><span>House Type :</span><?php echo $row['Cat_Name']?> </li>
										<li><span>House Name :</span> <?php echo $row['H_Name']?> </li>
										<li><span>Address :</span> <?php echo $row['Address']?> </li>
										<li><span>Area :</span> <?php echo $row['A_Name']?> </li>
										<li><span>House Owner :</span> <?php echo $row['U_Name']?> </li>
										<li><span>Price :</span> <?php echo $row['Rent']?> </li>
										<li><span>Square Foot:</span> <?php echo $row['Square_Foot']?> </li>
										<li><span>Bedroom :</span> <?php echo $row['No_of_Rooms']?> </li>
										<li><span>Floor :</span> <?php echo $row['Floor']?> </li>
										<li><span>Uploaded Date :</span> <?php echo $row['Uploaded_Date']?> </li>
										</ul>
									</div>
								</div>
								<div class="news_letter">
									<form method="post">
										<input type="submit" name="submit" value="Take Appointment" class="btn btn-default"></a>
									</form>
								</div>
								
							</div>
						</div>

						
					</div>
					<div class="col-md-4">
						<div class="property_sidebar">
							<div class="property_listing sidebar-widget">
								<h4 class="inner-title">Property Summary</h4>
								<div class="profile_data">
									<ul>
										<li><span>House Type :</span><?php echo $row['Cat_Name']?> </li>
										<li><span>House Name :</span> <?php echo $row['H_Name']?> </li>
										<li><span>Address :</span> <?php echo $row['Address']?> </li>
										<li><span>Area :</span> <?php echo $row['A_Name']?> </li>
										<li><span>House Owner :</span> <?php echo $row['U_Name']?> </li>
										<li><span>Description :</span> <?php echo $row['Description']?> </li>
										<li><span>Price :</span> <?php echo $row['Rent']?> </li>
										<li><span>Square Foot :</span> <?php echo $row['Square_Foot']?> </li>
										<li><span>Bedroom :</span> <?php echo $row['No_of_Rooms']?> </li>
										<li><span>Floor :</span> <?php echo $row['Floor']?> </li>
										<li><span>Uploaded Date :</span> <?php echo $row['Uploaded_Date']?> </li>
									</ul>
								</div>
							</div>
							
						</div>
					</div>
				</div>
				<!-- Related Property -->
			<section id="recent_property">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="title-row">
							<h3 class="section_title_blue">Related <span>Properties</span></h3>
						</div>
					</div>
				</div>
			<div class="row">
				<?php
				$cat = $row['Cat_Id'];
				$sql1="select * from house h join area a join category c 
                 where h.A_Code=a.A_Code and h.House_Id!='".$hid."' and h.Cat_Id='".$cat."'
				 and h.Cat_Id=c.Cat_Id and h.IsActive=1 and h.IsAvailable=1";
				$result1=mysqli_query($conn,$sql1);
				while($row1=mysqli_fetch_array($result1))
				 {
				?>	
					<div class="col-md-4 col-sm-6">
						<div class="property_grid">
							<div class="img_area">
								<a href="singleproperty.php?hid=<?php echo $row1['House_Id']?>"><img src="../profileimages/<?php echo $row1['Profile_Image']?>"  height="250" width="150" alt=""></a>
								<div class="hover_property">
									<ul>
										<li><a href="#"><i class="fa fa-search" aria-hidden="true"></i></a></li>
										<li><a href="#"><i class="fa fa-link" aria-hidden="true"></i></a></li>
									</ul>
								</div>
							</div>
							<div class="property-text"> 
								<a href="#">
									<h5 class="property-title"><?php echo $row1['H_Name']; ?>  (<?php echo $row1['Cat_Name']; ?>)</h5>
								</a> 
								<span><i class="fa fa-map-marker" aria-hidden="true"></i><?php echo $row1['Address']; ?></span>
								<div class="quantity">
									<ul>
										<li><span>Square Foot</span><?php echo $row1['Square_Foot']; ?></li>
										<li><span>Rooms</span><?php echo $row1['No_of_Rooms']; ?></li>
										<li><span>Floor</span><?php echo $row1['Floor']; ?></li>
										
									</ul>
								</div>
							</div>
							<div class="bed_area">
								<ul>
									<li> ₹ <?php echo $row1['Rent']; ?></li>
									<li class="flat-icon"><a href="#"><i class="flaticon-like"></i></a></li>
									<li class="flat-icon"><a href="#"><i class="flaticon-connections"></i></a></li>
								</ul>
							</div>
						</div>
					</div>
				<?php
				}
				?>
			
			</div>
		</section>
		<!-- Recent Property End --> 
			</div>
		</section>
		<!-- Single Property End --> 
		
<?php
include ("footer.php");
?>		
		<!-- Register Section End -->
		
		