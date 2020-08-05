<?php
include("header.php");
include("../config/connection.php");

$sql="select * from house h join area a join category c 
where h.A_Code=a.A_Code and h.Cat_Id=c.Cat_Id and h.IsActive=1 and h.IsAvailable=1 order by h.Uploaded_Date desc limit 3";

if($_SERVER["REQUEST_METHOD"] == "POST")
{
	if(isset($_POST["category"]) && isset($_POST["area"]) && isset($_POST["rooms"]) 
		&& isset($_POST["floor"]) && isset($_POST["minprice"]) && isset($_POST["maxprice"]))
	{
		$area = $_POST["area"];
		$rooms = $_POST["rooms"];
		$category = $_POST["category"];
		$floor = $_POST["floor"];
		$minprice = $_POST["minprice"];
		$maxprice = $_POST["maxprice"];
		if($category!='' && $area!='' && $rooms!='' && $floor!='' && $minprice!='' && $maxprice!='')
		{
			$sql = "select * from house h join category c  where c.Cat_Id=h.Cat_Id and Rent >= '".$minprice."' and Rent <= '".$maxprice."' and A_Code='".$area."' 
				and No_of_Rooms='".$rooms."' and h.Cat_Id='".$category."' and Floor='".$floor."' and h.IsActive=1 and h.IsAvailable=1";
		}
	}
}



$result=mysqli_query($conn,$sql);
?>
		<!-- Slider Part Start -->
		<section id="slider">
			<div id="carousel-example-generic" class="carousel slide" data-ride="carousel"> 
				<!-- Indicators -->
				<ol class="carousel-indicators my_carousel">
					<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
					<li data-target="#carousel-example-generic" data-slide-to="1"></li>
					<li data-target="#carousel-example-generic" data-slide-to="2"></li>
				</ol>
				
				<!-- Wrapper for slides -->
				<div class="carousel-inner" role="listbox">
					<div class="item active"> 
						<img src="img/slider/PG.jpg" alt="">
						<div class="carousel-caption">
							<div class="container">
								<div class="slider_text">
									<h1>Dwelling Discoverer</h1>
									<p>This is an Online Web Application that is used to  find a house for tenants.
									 it isalso used to find the PG for Boys and Girls.</p>
									 
									
									
								</div>
							</div>
						</div>
					</div>
					<div class="item">
						<img src="img/slider/tenant.jpg" alt="">
						<div class="carousel-caption">
							<div class="container">
								<div class="slider_text">
									<h1>WHAT IS PG AND TENANTS</h1>
									<p><p>A tenant who not only lives at your place but also pays for food and shelter. shared accommodation with the owner..</p>
									<p>PG is someone who takes a part of your house on rent, Normally young students  take up these kind of opportunity as it comes pretty reasonable and their focus at this time of life is college, studies, work etc...</p>
								</div>
							</div>
						</div>
					</div>
					<div class="item">
						<img src="img/slider/tiffin-service.jpg" alt="">
						<div class="carousel-caption">
							<div class="container">
								<div class="slider_text">
									<h1>Tiffin Service</h1>
									<p><p>This is also Provide Different Tiffin Service Providers so Clients can Book Tiffin in Different Packages.</p>
									.</p>
									
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<!-- Controls --> 
				<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
					<div class="lef_btn">prev</div>
					<span class="sr-only">Previous</span> </a> <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
					<div class="right_btn">next</div>
				<span class="sr-only">Next</span> </a> </div>
		</section>
		<!-- Slider Part End --> 
		
		<!-- Find Part Satrt -->
		<div id="find_area">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="property_search_form"> 
							<form action="" name="search" method="post" class="property_filter_input">
								<div class="row">
									<div class="col-md-3 col-sm-6">
										<select class="selectpicker form-control" name="category">
										<option> <?php echo 'Category' ?> </option>
																<?php $sql3="select * from category";
																$result3=mysqli_query($conn,$sql3);
																while($row3=mysqli_fetch_array($result3))
																{
															?>
															<option value="<?php echo $row3['Cat_Id']; ?>">
															<?php echo $row3['Cat_Name']; ?></option>
															<?php															
															}
															?>
															</select>
									</div>
									<div class="col-md-3 col-sm-6">
										<select class="selectpicker form-control" name="area">
											<option> <?php echo 'Area' ?> </option>
												<?php $sql3="select * from area";
													$result3=mysqli_query($conn,$sql3);
														while($row3=mysqli_fetch_array($result3))
													{
												?>
												<option value="<?php echo $row3['A_Code']; ?>">
												<?php echo $row3['A_Name']; ?></option>
													<?php															
													}
													?>
									</select>
									</div>
									<div class="col-md-3 col-sm-6">
										<select class="selectpicker form-control" name="rooms">
										<option> <?php echo 'No. of Rooms' ?> </option>
																<?php $sql3="select * from house";
																$result3=mysqli_query($conn,$sql3);
																while($row3=mysqli_fetch_array($result3))
																{
															?>
															<option value="<?php echo $row3['No_of_Rooms']; ?>">
															<?php echo $row3['No_of_Rooms']; ?></option>
															<?php															
															}
															?>
															</select>
									</div>
									<div class="col-md-3 col-sm-6">
										<select class="selectpicker form-control" name="floor">
										<option> <?php echo 'Floor' ?> </option>
																<?php $sql3="select * from house";
																$result3=mysqli_query($conn,$sql3);
																while($row3=mysqli_fetch_array($result3))
																{
															?>
															<option value="<?php echo $row3['Floor']; ?>">
															<?php echo $row3['Floor']; ?></option>
															<?php															
															}
															?>
															</select>
									</div>
									<div class="col-md-3 col-sm-6">
										<input type="text" class="form-control" name="minprice" placeholder="Min Price(Rs)" >
									</div>
									<div class="col-md-3 col-sm-6">
										<input type="text" class="form-control" name="maxprice" placeholder="Max Price(Rs)" >
									</div>
							
									<div class="col-md-3 col-sm-6">
										<input type="submit" name="search" class="btn btn-default" value="Search">
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Find Part End --> 
		
		<!-- Offer Part Start -->
		<section id="offer">
			<div class="container">
				<div class="row">
					<div class="col-md-4 col-sm-6">
						<div class="offer_area wow fadeInLeft" data-wow-delay="200ms" data-wow-duration="1000ms">
							<div class="circle_area"><i class="flaticon-home-1"></i></div>
							<a href="#"><h5 class="offer-title">Property Booking</h5></a>
							<p>Property booking features allow you as an activity operator the freedom to choose when and where you will offer specific reservations.</p>
							
						</div>
					</div>
					<div class="col-md-4 col-sm-6">
						<div class="offer_area wow fadeInLeft" data-wow-delay="100ms" data-wow-duration="1000ms">
							<div class="circle_area"><i class="flaticon-pencil-and-paper"></i></div>
							<a href="#"><h5 class="offer-title">Beautiful Image Gallery</h5></a>
							<p>High resolution images allow customers to visualize what they will experience when they book with your company.</p>
							
						</div>
					</div>
					<div class="col-md-4 col-sm-6">
						<div class="offer_area wow fadeInRight" data-wow-delay="200ms" data-wow-duration="1000ms">
							<div class="circle_area"><i class="flaticon-connections"></i></div>
							<a href="#"><h5 class="offer-title">Online Support and Phone Support</h5></a>
							<p>As with any technological addition to your business, tour and activity operators might need support when it comes to their online booking system. </p>
							
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- Offer Part End --> 
		
		<!-- Recent Property Start -->
		<section id="recent_property">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="title-row">
							<h3 class="section_title_blue">Recent <span>Properties</span></h3>
						</div>
						<a href="property.php" class="property_link">View All Properties</a>
					</div>
				</div>
			<div class="row">
				<?php
				 while($row=mysqli_fetch_array($result))
				 {
				?>	
					<div class="col-md-4 col-sm-6">
						<div class="property_grid">
							<div class="img_area">
								<a href="singleproperty.php?hid=<?php echo $row['House_Id']?>"><img src="../profileimages/<?php echo $row['Profile_Image']?>" height="250" width="15
								0" alt=""></a>
								<div class="hover_property">
									<ul>
										<li><a href="#"><i class="fa fa-search" aria-hidden="true"></i></a></li>
										<li><a href="#"><i class="fa fa-link" aria-hidden="true"></i></a></li>
									</ul>
								</div>
							</div>
							<div class="property-text"> 
								<a href="">
									<h5 class="property-title"><?php echo $row['H_Name']; ?>  (<?php echo $row['Cat_Name']; ?>)</h5>
								</a> <span><i class="fa fa-map-marker" aria-hidden="true"></i><?php echo $row['Address']; ?></span>
								<div class="quantity">
									<ul>
										<li><span>Square Foot</span><?php echo $row['Square_Foot']; ?></li>
										<li><span>Rooms</span><?php echo $row['No_of_Rooms']; ?></li>
										<li><span>Floor</span><?php echo $row['Floor']; ?></li>
										
									</ul>
								</div>
							</div>
							<div class="bed_area">
								<ul>
									<li> ₹ <?php echo $row['Rent']; ?></li>
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
		
		<!-- Service Section Start -->
		<section id="service_part">

			<div class="container">
			
				<div class="row">
				<?php
				$sql1="select * from category";
				$result1=mysqli_query($conn,$sql1);
				?>
					<div class="col-md-12">
						<div class="title-row">
							<h3 class="section_title_blue"><span>What you are looking for?</span></h3>
							
						</div>
					</div>
				</div>
				<div class="row">
				<?php
					while($row1=mysqli_fetch_array($result1))
					{
						?>
					<div class="col-md-3 col-sm-6">
						<div class="service_area wow fadeInUp" data-wow-delay="100ms" data-wow-duration="1500ms">
							<div class="service_icon"><i class="glyph-icon flaticon-home"></i></div>
							<a href="tenant.php?cid=<?php echo $row1['Cat_Id']?>"><h4 class="service_title">
							<?php echo $row1['Cat_Name']?>
							</h4></a>
							<p><?php echo $row1['Cat_Description']?></p>
						</div>
					</div>
					
					
					
					<?php
					}
					?>
				</div>
			</div>
		</section>
		<!-- Service Section End --> 
		
		
		<!--achivement Section Start-->
		<div id="achivment">
			<div class="container">
				<div class="row">
					<div class="fact-counter">
						<div class="col-md-3 col-sm-3 col-xs-12">
						<?php
						$sql = "select count(*) as tenants from house where Cat_Id=1";
						$result = mysqli_query($conn,$sql);
						$row = mysqli_fetch_array($result);
						?>
							<div class="achievement wow fadeIn" data-wow-delay="300ms" data-wow-duration="500ms">
								<h2 class="counting" data-speed="3000" data-stop="<?php echo $row['tenants']?>"><?php echo $row['tenants']?></h2>
								<p class="subject">Tenants</p>
							</div>
						</div>
						<div class="col-md-3 col-sm-3 col-xs-12">
						<?php
						$sql = "select count(*) as pgs from house where Cat_Id=2";
						$result = mysqli_query($conn,$sql);
						$row = mysqli_fetch_array($result);
						?>
							<div class="achievement wow fadeIn" data-wow-delay="300ms" data-wow-duration="500ms">
								<h2 class="counting" data-speed="3000" data-stop="<?php echo $row['pgs']?>"><?php echo $row['pgs']?></h2>
								<p class="subject">PGs</p>
							</div>
						</div>
						<div class="col-md-3 col-sm-3 col-xs-12">
						<?php
						$sql = "select count(*) as bookings from house_booking";
						$result = mysqli_query($conn,$sql);
						$row = mysqli_fetch_array($result);
						?>
							<div class="achievement wow fadeIn" data-wow-delay="300ms" data-wow-duration="500ms">
								<h2 class="counting" data-speed="3000" data-stop="<?php echo $row['bookings']?>"><?php echo $row['bookings']?></h2>
								<p class="subject">Bookings</p>
							</div>
						</div>
						<div class="col-md-3 col-sm-3 col-xs-12">
						<?php
						$sql = "select count(*) as feedbacks from feedback";
						$result = mysqli_query($conn,$sql);
						$row = mysqli_fetch_array($result);
						?>
							<div class="achievement wow fadeIn" data-wow-delay="300ms" data-wow-duration="500ms">
								<h2 class="counting" data-speed="3000" data-stop="<?php echo $row['feedbacks']?>"><?php echo $row['feedbacks']?></h2>
								<p class="subject">Feedbacks</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--achivement Section End-->
		
		
		<!-- Client Feedback Section Start -->
		<section id="feedback">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="fedback_area">
							<div class="row">
								<div class="col-ms-12">
									<div class="title-row">
										<h3 class="section_title_white">clients <span>feedback</span></h3>
									</div>
								</div>
							</div>
							<a name="feedback"/>
							<div class="row">
								<div class="col-ms-12">
									<div class="testimonials-carousel">
								<?php
								$sql = "SELECT * FROM feedback f JOIN user1 u WHERE f.User_Id=u.User_Id";
								$result = mysqli_query($conn,$sql);
								while($row=mysqli_fetch_array($result))
								{
								?>

										<div class="item">
											<div class="feedback">
												<p><?php echo $row['Feedback']?></p>
												<div class="testimonial_person"> 
												<h5 class="client-name"><?php echo $row['U_Name']?></h5>
													
												</div>
												</div>
										</div>
								<?php
								}
								?>
										
										
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- Client Feedback Section End --> 
		 
		
<?php
include("footer.php");
?>