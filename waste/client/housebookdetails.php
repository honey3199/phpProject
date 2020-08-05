<?php include("header.php");
require_once("../config/connection.php");
session_start();
    $uid=$_SESSION["User_Id"];
    $sql="SELECT * from house_booking h join house b join user1 u join area a where
	h.House_Id=b.House_Id and h.User_Id=u.User_Id and a.A_Code=b.A_Code and h.User_Id='".$uid."'";
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_array($result);
?>
		<!-- Banner Section Start -->
		<section id="banner">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="banner_area">
							<h3 class="page_title">Invoice Details</h3>
							<div class="page_location">
								<a href="index_1.html">Home</a> 
								<i class="fa fa-angle-right" aria-hidden="true"></i>
								<a href="index_1.html">Pages</a> 
								<i class="fa fa-angle-right" aria-hidden="true"></i>
								<span>Invoice Details</span>
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
							<div class="col-md-12">
								<div class="invoice-liner">
									<div class="row">
										<div class="col-md-12">
											<div class="invoice-box">
												<h5 class="inner-title">Your Bookings.</h5>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="invoice-table">
												<table class="list_table" cellpadding="0" cellspacing="0">
													<thead>
														<tr>
															<td>User Name</td>
															<td>House Name</td>
															<td>House Area</td>
															<td>Rent / Month</td>
															<td>Date</td>
															<td>Status</td>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td><?php echo $row["U_Name"]; ?></td>
															<td><?php echo $row["H_Name"]; ?></td>
															<td><?php echo $row["A_Name"]; ?></td>
															<td><?php echo $row["Rent"]; ?></td>
															<td><?php echo $row["HB_Date"]; ?></td>
															<td><?php echo $row["HB_Status"]; ?></td>
														</tr>
														
													</tbody>
												</table>
												<div class="pay-now"><a href="index.php" class="btn btn-default">Back to Home</a></div>
											</div>
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
		
<?php include("footer.php");