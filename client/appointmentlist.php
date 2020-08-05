<!DOCTYPE html>
<?php include ("header.php"); ?>
<?php require_once('../config/connection.php');
session_start();
$id = $_SESSION['User_Id'];
	$sql6="SELECT * FROM user1 u JOIN house h join appointment a WHERE a.House_Id=h.House_Id and a.User_Id=u.User_Id and a.User_Id='".$id."'";
	$result6=mysqli_query($conn,$sql6);
	
 ?>
		<!-- Banner Section Start -->
		<section id="banner">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="banner_area">
							<h3 class="page_title">My  List</h3>
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
															<td>Appointment Date</td>
															<td>Appointment Status</td>
														</tr>
													</thead>
													<tbody>
													<?php
													while($row6=mysqli_fetch_array($result6))
													{
												
												echo "<tr>";
													
													echo "<td>".$row6['U_Name']."</td>";
													echo "<td>".$row6['H_Name']."</td>";
													echo "<td>".$row6['App_Date']."</td>";
													echo "<td>".$row6['Status']."</td>";
													
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