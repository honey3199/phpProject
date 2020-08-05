	<?php
include("header.php");
?>
<?php
include("../config/connection.php");

$sql="select * from tiffin_service_package t join food f join user1 u 
where t.Food_Id=f.Food_Id and t.User_Id=u.User_Id";


if($_SERVER["REQUEST_METHOD"] == "POST")
{
	if(isset($_POST["search"]))
	{
		if(isset($_POST["food"]))
		{
			$food = $_POST["food"];
			if($food!='')
			{
				$sql = $sql . " and t.Food_Id='".$food."'";
			}
		}
	}
}


if($_SERVER["REQUEST_METHOD"] == "POST")
{
	if(isset($_POST['bsort']))
	{
		
		$val = $_POST['sort'];
		
		if($val == "Price High")
		{
			$sql = $sql . "	order by t.Price desc";
		}
		else
		{
			$sql = $sql . "	order by t.Price";
		}

	}
}


$result=mysqli_query($conn,$sql);
?>
		<!-- Banner Section Start -->
		<section id="banner">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="banner_area">
							<h3 class="page_title">Services </h3>
							<div class="page_location">
								<a href="">Home</a> 
								<i class="fa fa-angle-right" aria-hidden="true"></i> 
								<span>Services</span>
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
									<form class="property_filter" action="" method="post">
										<div class="property_show">
											<select class="selectpicker form-control" name="food">
												<option> <?php echo 'Food Type' ?> </option>
												<?php $sql3="select * from food";
													$result3=mysqli_query($conn,$sql3);
														while($row3=mysqli_fetch_array($result3))
													{
												?>
												<option value="<?php echo $row3['Food_Id']; ?>">
												<?php echo $row3['Food_Type']; ?></option>
													<?php															
													}
													?>
											</select>
										</div>
										<div class="col-md-3 col-sm-6">
											<input type="submit" name="search" class="btn btn-default" value="search">
										</div>
										<div class="property_view">
											<ul>
												<div class="col-md-12">
												<li>
												<div class="col-md-8">
													<select class="selectpicker form-control" name="sort">
														<option>Price High</option>
														<option>Price Low</option>
													</select>
												</div>
												<div class="col-md-1">
													<input type="submit" name="bsort" class="btn btn-default" value="go">
												</div>
												</li>
												</div>
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
										<a href="singleservice.php?tid=<?php echo $row['TSPackage_Id']?>"><img src="../profileimages/<?php echo $row['Profile_Image']?>" height="350" width="400" alt=""></a>
										<div class="hover_property">
											<ul>
												<li><a href="#"><i class="fa fa-search" aria-hidden="true"></i></a></li>
												<li><a href="#"><i class="fa fa-link" aria-hidden="true"></i></a></li>
											</ul>
										</div>
									</div>
									<div class="property-text"> 
										<a href="#">
											<h5 class="property-title"><?php echo $row['Package_Name']; ?></h5>
										</a> <span><i class="fa fa-map-marker" aria-hidden="true"></i><?php echo $row['Address']; ?></span>
										<div class="quantity">
											<ul>
												<li><span><b>Tiffin Service Provider</b></span><?php echo $row['U_Name']; ?></li>
												<li><span><b>Food Type</b></span><?php echo $row['Food_Type']; ?></li>
												<li><span><b>Description</b></span><?php echo $row['Description']; ?></li>
												<li><span><b>Duration</b></span><?php echo $row['Duration']; ?></li>
											</ul>
										</div>
									</div>
									<div class="bed_area">
										<ul>
											<li> ₹ <?php echo $row['Price']; ?></li>
											<li class="flat-icon"><a href="#"><i class="flaticon-like"></i></a></li>
											<li class="flat-icon"><a href="#"><i class="flaticon-connections"></i></a></li>
										</ul>
									</div>
								</div>
							</div>
								<?php } ?>
						</div>
							
						<!-- End property Grids -->
						
					</div>
					<!-- Start Sidebar -->
					<div class="col-md-4">
						<div class="property_sidebar">
							<div class="sidebar_agent sidebar-widget">
								<h4 class="widget-title">Our Gallery</h4>
								<div class="member-widget-view">
									<div class="item">
										<div class="team_img"> 
											<div class="profile-pic"><img src="../profileimages/tiffin1.jpeg" height="300" width="400" alt=""></div>
										</div>
									</div>
									<div class="item">
										<div class="team_img"> 
											<div class="profile-pic"><img src="../profileimages/tiffin4.jpeg" height="300" width="400" alt=""></div>
										</div>
									</div>
									<div class="item">
										<div class="team_img"> 
											<div class="profile-pic"><img src="../profileimages/tiffin3.jpeg" height="300" width="400" alt=""></div>
										</div>
									</div>
									<div class="item">
										<div class="team_img">
											<div class="profile-pic"><img src="../profileimages/tiffin5.jpeg" height="300" width="400" alt=""></div>
											
										</div>
									</div>
									<div class="item">
										<div class="team_img">
											<div class="profile-pic"><img src="../profileimages/tiffin6.jpeg" height="300" width="400" alt=""></div>
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
<?php
include("footer.php");
?>