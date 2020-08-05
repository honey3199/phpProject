<?php include("header.php");
require_once("../config/connection.php");
session_start();
if(isset($_GET['id']))
{
	$hid=$_GET['id'];
	$sql1="select * from house h join house_images i join category c join area a join
	user1 u where h.House_Id=i.House_Id and h.Cat_Id=c.Cat_Id and 
	h.A_Code=h.A_Code and h.User_Id=u.User_Id and h.House_Id='".$hid."'";
	$result1 = mysqli_query($conn,$sql1);
	$row1 = mysqli_fetch_array($result1);
}

?>
		<!-- Banner Section Start -->
		<section id="banner">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="banner_area">
							<h3 class="page_title">Submit Property</h3>
							<div class="page_location">
								<a href="">Home</a> 
								<i class="fa fa-angle-right" aria-hidden="true"></i>
								<a href="">Property</a> 
								<i class="fa fa-angle-right" aria-hidden="true"></i>
								<a href="">Single Property</a> 
								<i class="fa fa-angle-right" aria-hidden="true"></i>
								<span>Book Appointment</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- Banner Section End -->
		
		<!-- Submit Property Start -->
		<section id="single_property">
			<div class="container">
				<div class="row">
					<div class="col-md-9 col-sm-12">
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
								<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
									<div class="lef_btn">prev</div>
									<span class="sr-only">Previous</span>
								</a>
								<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
									<div class="right_btn">Next</div>
									<span class="sr-only">Next</span>
								</a>
							</div>
						</div>
						<div class="property-summary2">
							<div class="profile_data">
								<ul>
									<li><span>House Type :</span><?php echo $row1['Cat_Name']?> </li>
									<li><span>House Name :</span> <?php echo $row1['H_Name']?> </li>									
									<li><span>Address :</span> <?php echo $row1['Address']?> </li>
									<li><span>Area :</span> <?php echo $row1['A_Name']?> </li>
									<li><span>House Owner :</span> <?php echo $row1['U_Name']?> </li>
									<li><span>Description :</span> <?php echo $row1['Description']?> </li>
									<li><span>Price :</span> <?php echo $row1['Rent']?> </li>
									<li><span>Area :</span> <?php echo $row1['Square_Foot']?> </li>
									<li><span>Bedroom :</span> <?php echo $row1['No_of_Rooms']?> </li>
									<li><span>Floor :</span> <?php echo $row1['Floor']?> </li>
									<li><span>Uploaded Date :</span> <?php echo $row1['Uploaded_Date']?> </li>
								</ul>
							</div>
						</div>
						<form method="post" class="submit_form">
							<div class="basic_information">
								<h4 class="inner-title">Appointment Details</h4>
								<div class="row">
									<div class="col-md-3 col-sm-6">
									</div>
									<div class="col-md-3 col-sm-6">
										<h6 class="inner-title"> Appointment Date : </h6>
									</div>
									<div class="col-md-6 col-sm-6">
										<input type="date" required name="App_Date" placeholder="Starting Date" class="form-control">
									</div>
									<div class="col-md-3 col-sm-6">
									</div>
									<div class="col-md-3 col-sm-6">
										<h6 class="inner-title"> Appointment Time : </h6>
									</div>
									<div class="col-md-6 col-sm-6">
										<input type="time" required name="App_Time" placeholder="Appointment Time" class="form-control">
									</div>	
							<div class="property_owner">
							<?php
							//if (isset($_SESSION["User_Id"])) {
								//$uid=$_SESSION["User_Id"];
								//$hid= $_GET["id"];
							// FETCH DATA FROM TABLE OF PERTICULAR USER AND HOUSE
								//$sql = "SELECT Status FROM appointment WHERE User_Id=$uid AND House_Id=$hid LIMIT 1";
								//$result = $conn->query($sql);
								//$value = $result->fetch_array(MYSQLI_NUM);
								//if (strtolower($value[0]) != 'pending' && strtolower($value[0]) == '	
								//booked') {
									// IF STATUS IS NOT PENDING
							?>
								<div class="browse_submit">
									<input type="submit" name="submit" class="btn btn-default" value="Request"/>
									<p><span>note</span> : Your Request will under review within 24 Hours after submission *</p>
								</div>
							</div>
							<?php
								//} else {
									// IF STATUS IS PENDING
									//echo "Your request is pending.";
							//	}
						//	} else {
								//echo "Please Login to continue.";
							//}
							?>
						</form>
						<?php						
						   if ($_SERVER["REQUEST_METHOD"] =="POST")
						    {
							    if (isset($_POST["App_Date"]) && isset($_POST["App_Time"]))
								{
										   $uid=$_SESSION["User_Id"];
										   $date=$_POST["App_Date"];
										   $time=$_POST["App_Time"];									
										   $hid= $_GET["id"];
										  
										   
										   if( $date!=''&& $time!='')
										   {
											   $sql = "insert into Appointment
											   (House_Id,User_Id,App_Date,App_Time,Status)values
											   ('".$hid."','".$uid."','".$date."','".$time."','Pending')";
												//echo $sql;
												//die;
											   $result=mysqli_query($conn,$sql);
										   }
											   if($result)
											   {
												   echo "<meta http-equiv='refresh' content='3;url=appointmentlist.php'>";
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
		</section>
		<!-- Submit Property End -->
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
				$cat = $row1['Cat_Id'];
				$sql="select * from house h join area a join category c 
                 where h.A_Code=a.A_Code and h.House_Id!='".$hid."' and h.Cat_Id='".$cat."' and h.Cat_Id=c.Cat_Id and h.IsActive=1 and h.IsAvailable=1";
				$result=mysqli_query($conn,$sql);
				while($row=mysqli_fetch_array($result))
				 {
				?>	
					<div class="col-md-4 col-sm-6">
						<div class="property_grid">
							<div class="img_area">
								<a href="singleproperty.php?hid=<?php echo $row['House_Id']?>"><img src="../profileimages/<?php echo $row['Profile_Image']?>" height="250" width="150" alt=""></a>
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
								</a> 
								<span><i class="fa fa-map-marker" aria-hidden="true"></i><?php echo $row['Address']; ?></span>
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
		</section>
		
<?php include("footer.php");
?>