<!DOCTYPE html>
<?php include ("header.php"); ?>
<?php require_once('../config/connection.php');
session_start();
$id = $_SESSION['User_Id'];
	$sql = "SELECT * FROM house_booking h JOIN user1 u JOIN house p WHERE h.User_Id=u.User_Id && h.House_Id=p.House_Id and h.User_Id='".$id."'";
	$result = mysqli_query($conn,$sql);
 ?>
		<!-- Banner Section Start -->
		<section id="banner">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="banner_area">
							<h3 class="page_title">Booking List</h3>
							<div class="page_location">
								<a href="index_1.html">Home</a> 
								<i class="fa fa-angle-right" aria-hidden="true"></i>
								<a href="index_1.html">Pages</a> 
								<i class="fa fa-angle-right" aria-hidden="true"></i>
								<span>Booking List</span>
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
		
					<div class="col-md-8 col-sm-12">
						
						<div class="row">
							<div class="col-md-12">
									<div class="row">
										<div class="col-md-12">
											<div>
												<table class="list_table" cellpadding="0" cellspacing="0">
													<thead>
														<tr>
															<td>User Name</td>
															<td>House Name</td>
															<td>House Booking Date</td>
															<td>House Booking Status</td>
														</tr>
													</thead>
													<tbody>
														
													<?php
													while($row=mysqli_fetch_array($result))
													{
												
												echo "<tr>";
													
													echo "<td>".$row['U_Name']."</td>";
													echo "<td>".$row['H_Name']."</td>";
													echo "<td>".$row['HB_Date']."</td>";
													echo "<td>".$row['HB_Status']."</td>";
													
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