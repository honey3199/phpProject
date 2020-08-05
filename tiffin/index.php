<?php include ("header.php"); ?>
                  
            <!-- Mobile Menu end -->
          <div class="section-admin container-fluid">
            <div class="row admin text-center">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                            <div class="admin-content analysis-progrebar-ctn res-mg-t-15">
                                <h4 class="text-left text-uppercase"><b>Users</b></h4>
                                <div class="row vertical-center-box vertical-center-box-tablet">
									<?php
										$sql = "select count(*) as users from user1 where Role_Id=4";
										$result = mysqli_query($conn,$sql);
										$row = mysqli_fetch_array($result);
									?>
                                    <div class="col-xs-9 cus-gh-hd-pro">
                                        <h2 class="text-right no-margin"><?php echo $row['users']?></h2>
                                    </div>
                                </div>
                                <div class="progress progress-mini">
                                    <div style="width: 78%;" class="progress-bar bg-green"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12" style="margin-bottom:1px;">
                            <div class="admin-content analysis-progrebar-ctn res-mg-t-30">
                                <h4 class="text-left text-uppercase"><b>Services</b></h4>
                                <div class="row vertical-center-box vertical-center-box-tablet">
                                    <?php
										$sql = "select count(*) as property from tiffin_service_package where User_Id='".$id."' and IsActive=1";
										$result = mysqli_query($conn,$sql);
										$row = mysqli_fetch_array($result);
									?>
                                    <div class="col-xs-9 cus-gh-hd-pro">
                                        <h2 class="text-right no-margin"><?php echo $row['property']?></h2>
                                    </div>
                                </div>
                                <div class="progress progress-mini">
                                    <div style="width: 38%;" class="progress-bar progress-bar-danger bg-red"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                            <div class="admin-content analysis-progrebar-ctn res-mg-t-30">
                                <h4 class="text-left text-uppercase"><b>Tiffin Bookings</b></h4>
                                <div class="row vertical-center-box vertical-center-box-tablet">
									<?php
										$sql = "select count(*) as hbook from tiffin_service_booking b join tiffin_service_package p
										Where b.TSPackage_Id=p.TSPackage_Id and p.User_Id='".$id."' and b.SB_Status='Booked'";
										$result = mysqli_query($conn,$sql);
										$row = mysqli_fetch_array($result);
									?>
                                    <div class="col-xs-9 cus-gh-hd-pro">
                                        <h2 class="text-right no-margin"><?php echo $row['hbook']?></h2>
                                    </div>
                                </div>
                                <div class="progress progress-mini">
                                    <div style="width: 60%;" class="progress-bar bg-blue"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                            <div class="admin-content analysis-progrebar-ctn res-mg-t-30">
                                <h4 class="text-left text-uppercase"><b>Complaints</b></h4>
                                <div class="row vertical-center-box vertical-center-box-tablet">
                                    <?php
										$sql = "select count(*) as com from complaint where TSProvider_Id='".$id."'";
										$result = mysqli_query($conn,$sql);
										$row = mysqli_fetch_array($result);
									?>
                                    <div class="col-xs-9 cus-gh-hd-pro">
                                        <h2 class="text-right no-margin"><?php echo $row['com']?></h2>
                                    </div>
                                </div>
                                <div class="progress progress-mini">
                                    <div style="width: 60%;" class="progress-bar bg-purple"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
   
	<?php
			//include("../config/connection.php");
		$id=$_SESSION['User'];
			//include("../config/connection.php");
			$sql = "SELECT * FROM tiffin_service_booking b JOIN area a join user1 u JOIN tiffin_service_package t
			WHERE b.User_Id=u.User_Id and a.A_Code=b.A_Code and b.TSPackage_Id=t.TSPackage_Id and b.IsActive=1 and b.SB_Status='Pending' and t.User_Id='".$id."'";
		
			$result = mysqli_query($conn,$sql);
	?>
    <!-- Start Welcome area -->
    
            <!-- Mobile Menu end -->
          
        <!-- Static Table Start -->
        <div class="data-table-area mg-tb-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline13-list">
                            <div class="sparkline13-hd">
                                <div class="main-sparkline13-hd">
                                    <h1>Tiffin Service Booking<span class="table-project-n"></span> Table</h1>
                                </div>
                            </div>
                            <div class="sparkline13-graph">
                                <div class="datatable-dashv1-list custom-datatable-overright">
                                    <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                        data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                        <thead>
                                            <tr>
                                                <th>User Name</th> 
                                                <th>Package Name</th>
												<th>Service Booking Date</th>
												<th>Delivery Address</th>
												<th>Area</th>
												<th>Service Booking Status</th>
												<th>Action</th>
												</tr>
                                        </thead>
                                        <tbody>
												  <?php
													while($row=mysqli_fetch_array($result))
													{
												
												echo "<tr>";
													
													
													echo "<td>".$row['U_Name']."</td>";
													echo "<td>".$row['Package_Name']."</td>";
													echo "<td>".$row['SB_Date']."</td>";
													echo "<td>".$row['Delivery_Address']."</td>";
													echo "<td>".$row['A_Name']."</td>";
													echo "<td>".$row['SB_Status']."</td>";
													if($row['SB_Status'] == 'Pending')
													{
													echo "<td><a href=\"accept.php?id=$row[TSBook_Id]\">
													<img src=\"like.png\" height='20' width='20'/></a> &nbsp &nbsp;
													<a href=\"reject.php?id=$row[TSBook_Id]\">
													<img src=\"dislike.png\" height='20' width='20'/></a>
													</td>";
													}
													else
													{
														echo "<td> </td>";
													}
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
<?php include ("footer.php"); ?>