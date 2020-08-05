
<?php
include ("header.php");
require_once("../config/connection.php");
session_Start();
$uid=$_SESSION['User_Id'];
if(isset($_GET['tid']))
{
	$id=$_GET['tid'];
	$sql="select * from tiffin_service_package t join food f join user1 u 
	where t.Food_Id=f.Food_Id and t.User_Id=u.User_Id and t.TSPackage_Id='".$id."'";
	//echo $sql;
	//die;
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_array($result);
}
?>		
		<!-- Banner Section Start -->
		<section id="banner">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="banner_area">
							<h3 class="page_title">Properties single</h3>
							<div class="page_location">
								<a href="index_1.html">Home</a> 
								<i class="fa fa-angle-right" aria-hidden="true"></i> 
								<span>Property Single</span>
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
											<div class="item active">
												<img src="../profileimages/<?php echo $row['Profile_Image']?>" alt="" height="100" width="150">
											</div>
										</div>
										<!-- Controls -->
									</div>
								</div>
							</div>
						</div>						
						<div class="row">
							<div class="col-md-12">
								<div class="detail_text">
									<div class="property-text">
										<h4 class="property-title"><?php echo $row['Package_Name']?> of <?php echo $row['U_Name']?> </h4>
										<span><i class="" aria-hidden="true"></i> <?php echo $row['Description']?> </span>
									</div>
								</div>
								<div class="news_letter">
						
						<form method="post" class="submit_form">
							<div class="basic_information">
								<h4 class="inner-title">Booking Details</h4>
								<div class="row">

									<div class="col-md-9 col-sm-6">
										<input type="text" required name="address" placeholder="Delivery Address" class="form-control">
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
										<h6 class="inner-title"> Starting Date : </h6>
									</div>
									<div class="col-md-6 col-sm-6">
										<input type="date" required name="date" placeholder="Starting Date" class="form-control">
									</div>
								</div>
							</div>
							<div class="browse_submit">
									<input type="submit" name="submit" class="btn btn-default" value="Book"/>
									<p><span>note</span> : Your Request will under review within 24 Hours after submission *</p>
								</div>
							</div>
						</form>
						<?php						
						   if ($_SERVER["REQUEST_METHOD"] =="POST")
						    {
							    if (isset($_POST["address"]) && isset($_POST["area"]) && isset($_POST["date"]))
								{
										   $add=$_POST["address"];
										   $area=$_POST["area"];									
										   $date=$_POST["date"];
										   $d=date('Y-m-d');
										   
										   if($uid!='' && $id!='' && $add!='' && $area!='' && $date!='')
										   {
											   if($date > $d)
											   {
											   $sql1 = "insert into tiffin_service_booking
											   (User_Id,TSPackage_Id,Delivery_Address,A_Code,SB_Date,SB_Status)values
											   ('".$uid."','".$id."','".$add."','".$area."','".$date."','Pending')";
												//echo $sql1;
												//die;
											   $result1=mysqli_query($conn,$sql1);
										   
											   if($result1)
											   {
												   echo "<meta http-equiv='refresh' content='3;url=tiffinlist.php'>";
											   }
											   }
											   else
											   {
												   echo "Please Enter Valid Date";
											   }
										   }
								}
							    else
							    {
								   echo "value not set";
							    }								
							}
					   ?>
								</div>
								
							</div>
					</div>
					<div class="col-md-4">
						<div class="property_sidebar">
							<div class="property_listing sidebar-widget">
								<h4 class="inner-title">Property Summary</h4>
								<div class="profile_data">
									<ul>
										<li><span><b>Package Name</b></span><?php echo $row['Package_Name']; ?></li>
										<li><span><b>Tiffin Service Provider</b></span><?php echo $row['U_Name']; ?></li>
										<li><span><b>Food Type</b></span><?php echo $row['Food_Type']; ?></li>
										<li><span><b>Description</b></span><?php echo $row['Description']; ?></li>
										<li><span><b>Duration</b></span><?php echo $row['Duration']; ?></li>
										<li><span><b>Price</b></span> ₹ <?php echo $row['Price']; ?></li>
									</ul>
								</div>
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
							<h3 class="section_title_blue">Related <span>Services</span></h3>
						</div>
					</div>
				</div>
			<div class="row">
				<?php
				$food = $row['Food_Id'];
				$sql1="select * from tiffin_service_package t join food f join user1 u 
					where t.Food_Id=f.Food_Id and t.Food_Id='".$food."' and t.User_Id=u.User_Id and t.TSPackage_Id!='".$id."' limit 3";
				$result1=mysqli_query($conn,$sql1);
				while($row1=mysqli_fetch_array($result1))
				 {
				?>	
					<div class="col-md-4 col-sm-6">
						<div class="property_grid">
									<div class="img_area">
										<a href="singleservice.php?tid=<?php echo $row1['TSPackage_Id']?>"><img src="../profileimages/<?php echo $row1['Profile_Image']?>" height="350" width="400" alt=""></a>
										<div class="hover_property">
											<ul>
												<li><a href="#"><i class="fa fa-search" aria-hidden="true"></i></a></li>
												<li><a href="#"><i class="fa fa-link" aria-hidden="true"></i></a></li>
											</ul>
										</div>
									</div>
									<div class="property-text"> 
										<a href="#">
											<h5 class="property-title"><?php echo $row1['Package_Name']; ?></h5>
										</a> <span><i class="fa fa-map-marker" aria-hidden="true"></i><?php echo $row['Address']; ?></span>
										<div class="quantity">
											<ul>
												<li><span><b>Tiffin Service Provider</b></span><?php echo $row1['U_Name']; ?></li>
												<li><span><b>Food Type</b></span><?php echo $row1['Food_Type']; ?></li>
												<li><span><b>Description</b></span><?php echo $row1['Description']; ?></li>
												<li><span><b>Duration</b></span><?php echo $row1['Duration']; ?></li>
											</ul>
										</div>
									</div>
									<div class="bed_area">
										<ul>
											<li> ₹ <?php echo $row1['Price']; ?></li>
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
		
		