<?php include("header.php"); ?>
<?php
require_once("../config/connection.php");



if(isset($_GET['cid']))
{
	$id = $_GET['cid'];
	$sql="select * from house h join area a join category c 
	where h.A_Code=a.A_Code and h.Cat_Id=c.Cat_Id and h.Cat_Id='".$id."'  and h.IsActive=1 and h.IsAvailable=1";


	$result=mysqli_query($conn,$sql);
}
else 
{
	$sql="select * from house h join area a join category c 
	where h.A_Code=a.A_Code and h.Cat_Id=c.Cat_Id  and h.IsActive=1 and h.IsAvailable=1";

	$result=mysqli_query($conn,$sql);
}
?>
		
		<!-- Banner Section Start -->
		<section id="banner">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="banner_area">
							<h3 class="page_title">Properties</h3>
							<div class="page_location">
								<a href="">Home</a> 
								<i class="fa fa-angle-right" aria-hidden="true"></i> 
								<span>Properties</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- Banner Section End -->
		
		<!-- Property Grid Start -->
		<section id="property_area">
			<div class="container">
				<div class="row">
					<div class="col-md-8">
						<div class="row">
							<div class="col-md-12">
								<div class="property_sorting">
									<form class="property_filter" action="#" method="post">
										
										<div class="property_view">
											<ul>
												<li>
													<span>Order:</span>
													<select class="selectpicker form-control">
														<option>Price Hight</option>
														<option>Price Low</option>
													</select>
												</li>
											</ul>
										</div>
									</form>
								</div>
							</div>
						</div>
						<!-- Property Grids -->
						<div class="row">
						<?php
						
				while($row=mysqli_fetch_array($result))
				{
				?>	
						
							<div class="col-md-6 col-sm-6">
								<div class="property_grid">
									<div class="img_area">
										<a href="singleproperty.php?hid=<?php echo $row['House_Id']?>"><img src="../profileimages/<?php echo $row['Profile_Image']?>" alt=""></a>
										<div class="hover_property">
											<ul>
												<li><a href="#"><i class="fa fa-search" aria-hidden="true"></i></a></li>
												<li><a href="#"><i class="fa fa-link" aria-hidden="true"></i></a></li>
											</ul>
										</div>
									</div>
									<div class="property-text"> 
										<a href="#">
											<h5 class="property-title"><?php echo $row['H_Name']; ?>  (<?php echo $row['Cat_Name']; ?>)</h5>
										</a> <span><i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo $row['Address']; ?> </span>
										<div class="quantity">
											<ul>
												<li><span>Area</span><?php echo $row['Square_Foot']; ?></li>
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
					</div>
					<!-- Start Sidebar -->
					<div class="col-md-4">
						<div class="property_sidebar">
							<div class="price_range sidebar-widget">
								<h4 class="widget-title">Price</h4>
								<form class="price-filter" action="#" method="post">
									<span class="price-slider">
										<input class="filter_price" type="text" name="price" value="0;1000000" />
									</span>
								</form>								
							</div>
							<div class="sidebar_agent sidebar-widget">
								<h4 class="widget-title">Our Gallery</h4>
								<div class="member-widget-view">
									<div class="item">
										<div class="team_img"> 
											<div class="profile-pic"><img src="../profileimages/img6.jpg" alt=""></div>
										</div>
									</div>
									<div class="item">
										<div class="team_img">
											<div class="profile-pic"><img src="../profileimages/img7.jpg" alt=""></div>
											
										</div>
									</div>
									<div class="item">
										<div class="team_img">
											<div class="profile-pic"><img src="../profileimages/img8.jpg" alt=""></div>
										</div>
									</div>
								</div>
							</div>
							<div class="sidebar_tesimonial">
								<h4 class="widget-title">Clients Feedback</h4>
								<div class="feedback_small">
									<?php
								$sql = "SELECT * FROM feedback f JOIN user1 u WHERE f.User_Id=u.User_Id";
								$result = mysqli_query($conn,$sql);
								while($row=mysqli_fetch_array($result))
								{
								?>
									<div class="item">
										<div class="testimonial_person">
												<h6 class="client_name"><?php echo $row['U_Name']?></h6>
										</div>
										<p><?php echo $row['Feedback']?></p>
									</div>
								<?php 
								}
								?>
								</div>
							</div>
						</div>
					</div>
					<!-- End SIdebar -->
				</div>
			</div>
		</section>
		<!-- Property Grid End -->
		
<?php include("footer.php"); ?>	