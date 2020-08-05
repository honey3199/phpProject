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
										$sql = "select count(*) as users from user1";
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
                                <h4 class="text-left text-uppercase"><b>Properties</b></h4>
                                <div class="row vertical-center-box vertical-center-box-tablet">
                                    <?php
										$sql = "select count(*) as property from house where IsActive=1";
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
                                <h4 class="text-left text-uppercase"><b>House Booking</b></h4>
                                <div class="row vertical-center-box vertical-center-box-tablet">
									<?php
										$sql = "select count(*) as hbook from house_booking where HB_Status='Booked'";
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
                                <h4 class="text-left text-uppercase"><b>Tiffin Booking</b></h4>
                                <div class="row vertical-center-box vertical-center-box-tablet">
                                    <?php
										$sql = "select count(*) as tbook from tiffin_service_booking where SB_Status='Booked'";
										$result = mysqli_query($conn,$sql);
										$row = mysqli_fetch_array($result);
									?>
                                    <div class="col-xs-9 cus-gh-hd-pro">
                                        <h2 class="text-right no-margin"><?php echo $row['tbook']?></h2>
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
			$sql = "SELECT * FROM appointment h JOIN user1 u JOIN house p WHERE h.User_Id=u.User_Id and h.House_Id=p.House_Id and h.Status='Pending' and p.IsActive=1";
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
                                    <h1>House Booking<span class="table-project-n"></span> Table</h1>
                                </div>
                            </div>
                            <div class="sparkline13-graph">
                                <div class="datatable-dashv1-list custom-datatable-overright">
                                    
                                    <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                        data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                        <thead>
                                            <tr>
                                                
                                                
                                                <th>User Name</th> 
                                                <th>House Name</th>
												<th>House Booking Date</th>
												<th>House Booking status</th>
												<!--<th>Action</th>-->
												</tr>
                                        </thead>
                                        <tbody>
												<?php
													while($row=mysqli_fetch_array($result))
													{
												
												echo "<tr>";
													
													echo "<td>".$row['U_Name']."</td>";
													echo "<td>".$row['H_Name']."</td>";
													?>
													<td>  </td>
													<?php
													echo "<td>".$row['Status']."</td>";
													
													//echo "<td><a href=\"deletehousebooking.php?id=$row[HBook_Id]\">
													//<img src=\"delete.png\" height='20' width='20'/></a> &nbsp &nbsp;
													//<a href=\"categoryupdate.php?id=$row[HBook_Id]\">
													//<img src=\"edit.png\" height='20' width='20'/></a>
													//</td>";
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
	<?php
			//include("../config/connection.php");
			$sql = "SELECT * FROM tiffin_service_booking b JOIN user1 u JOIN tiffin_service_package t WHERE b.User_Id=u.User_Id && b.TSPackage_Id=t.TSPackage_Id and b.SB_Status='Pending' and b.IsActive=1";
			
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
												<th>Service Booking Status</th>
												<!--<th>Action</th>-->
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
													echo "<td>".$row['SB_Status']."</td>";
																			
													//echo "<td><a href=\"deletetsbooking.php?id=$row[TSBook_Id]\">
													//<img src=\"delete.png\" height='20' width='20'/></a> &nbsp &nbsp;
													//<a href=\"categoryupdate.php?id=$row[TSBook_Id]\">
													///<img src=\"edit.png\" height='20' width='20'/></a>
													//</td>";
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
	    <!-- Static Table End -->
<?php include ("footer.php"); ?>