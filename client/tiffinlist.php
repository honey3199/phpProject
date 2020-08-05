<!DOCTYPE html>
<?php include ("header.php"); ?>
<?php require_once('../config/connection.php');
session_start();
$id = $_SESSION['User_Id'];
$sql = "SELECT * FROM tiffin_service_booking b JOIN user1 u JOIN tiffin_service_package p join area a 
	WHERE b.TSPackage_Id=p.TSPackage_Id and b.User_Id=u.User_Id and a.A_Code=b.A_Code and u.User_Id='".$id."'";
$result = mysqli_query($conn,$sql);
 ?>
		<!-- Banner Section Start -->
		<section id="banner">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="banner_area">
							<h3 class="page_title">Tiffin Service Booking List</h3>
							<div class="page_location">
								<a href="">Home</a> 
								<i class="fa fa-angle-right" aria-hidden="true"></i>
								<a href="">My Bookings</a> 
								<i class="fa fa-angle-right" aria-hidden="true"></i>
								<span>Tiffin Service Booking List</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- Banner Section End -->
		
		<!-- Profile Setting Start -->
		<section id="profile_setting">
			<div class="container">
				<div class="row">
		
					<div class="col-md-10 col-sm-12">
						
						<div class="row">
							<div class="col-md-12">
									<div class="row">
										<div class="col-md-12">
											<div>
												<table class="list_table" cellpadding="0" cellspacing="0">
													<thead>
														<tr>
															<td>User Name</td>
															<td>Package Name</td>
															<td>Delivery Address</td>
															<td>Area</td>
															<td>Price</td>
															<td>Booking Date</td>
															<td>Booking Status</td>
														</tr>
													</thead>
													<tbody>
														
													<?php
													while($row=mysqli_fetch_array($result))
													{
												
												echo "<tr>";
													
													echo "<td>".$row['U_Name']."</td>";
													echo "<td>".$row['Package_Name']."</td>";
													echo "<td>".$row['Delivery_Address']."</td>";
													echo "<td>".$row['A_Name']."</td>";
													echo "<td>".$row['Price']."</td>";
													echo "<td>".$row['SB_Date']."</td>";
													echo "<td>".$row['SB_Status']."</td>";
													
													echo "</tr>";
													
												
												}
												?>

													</tbody>
													
												</table>
												
												
											</div>
										</div>
									</div>
								
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- Profile Setting End -->
		
	<?php include ("footer.php"); ?>