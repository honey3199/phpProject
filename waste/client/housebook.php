<?php include("header.php");
require_once("../config/connection.php");
session_start();
    $uid=$_SESSION["User_Id"];
    $sql1="SELECT house.Address, house.Rent, appointment.Status, appointment.App_Date, appointment.App_Time FROM appointment INNER JOIN house ON appointment.House_Id=house.House_Id AND appointment.User_Id=$uid";

	$result1 = mysqli_query($conn,$sql1);
?>
		<!-- Banner Section Start -->
		<section id="banner">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="banner_area">
							<h3 class="page_title">Submit Property</h3>
							<div class="page_location">
								<a href="index_1.html">Home</a> 
								<i class="fa fa-angle-right" aria-hidden="true"></i>
								<a href="index_1.html">Pages</a> 
								<i class="fa fa-angle-right" aria-hidden="true"></i>
								<span>Submit Property</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- Banner Section End -->
		
		<!-- Submit Property Start -->
		<section id="submit_property">
			<div class="container">
				<div class="row">
					<div class="col-md-9 col-sm-12">
						<div class="property-summary2">
							<div class="profile_data">
								<table class="table">
                                    <tr>
                                        <th>House Address</th>
                                        <th>Rent</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                    </tr>
                                    <?php
                                    while($row1 = mysqli_fetch_array($result1))
									{    
                                    ?>
                                    <tr>
                                        <td><?php echo $row1['Address']; ?></td>
                                        <td><?php echo $row1['Rent']; ?></td>
                                        <td><?php echo $row1['App_Date']; ?></td>
                                        <td><?php echo $row1['Status']; ?></td>
                                    </tr>
                                    <?php
                                    }
                                    ?>
                                </table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- Submit Property End -->
<?php include("footer.php");
?>