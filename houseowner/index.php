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
										$sql = "select count(*) as users from user1 where Role_Id=3";
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
										$sql = "select count(*) as property from house where User_Id='".$id."' and IsActive=1";
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
                                <h4 class="text-left text-uppercase"><b>House Bookings</b></h4>
                                <div class="row vertical-center-box vertical-center-box-tablet">
									<?php
										$sql = "select count(*) as hbook from house_booking b join house h 
										where b.House_Id=h.House_Id and h.User_Id='".$id."' and b.HB_Status='Booked'";
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
										$sql = "select count(*) as com from complaint where House_Owner_Id='".$id."'";
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
			$id=$_SESSION['U_Id'];
			$sql = "SELECT * FROM appointment a join house h JOIN user1 u
            where a.House_Id = h.House_Id and a.User_Id = u.User_Id and h.User_Id='".$id."' and a.Status='Pending' and a.IsActive=1";
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
                                    <h1>Appointment <span class="table-project-n"></span> Table</h1>
                                </div>
                            </div>
                            <div class="sparkline13-graph">
                                <div class="datatable-dashv1-list custom-datatable-overright">
                                    
                                    <table id="table" data-toggle="table">
                                        <thead>
                                            <tr>
                                                
                                                
                                                <th>House Name</th> 
                                                <th>User Name</th>
												<th>App_Date</th>
												<th>App_Time</th>
												<th>Status</th>
												<th>Action</th>
										</tr>
                                        </thead>
                                        <tbody>
												 <?php
													while($row=mysqli_fetch_array($result))
													{
														$uid1=$row['House_Id'];
														$uid=$row['User_Id'];
													echo "<tr>";
													
													
													echo "<td>".$row['H_Name']."</td>";
													echo "<td>".$row['U_Name']."</td>";
													echo "<td>".$row['App_Date']."</td>";
													echo "<td>".$row['App_Time']."</td>";
													echo "<td>".$row['Status']."</td>";

																			
													if($row['Status'] == 'Pending')
													{
													echo "<td>
													<a href=\"accept.php?id=$row[App_Id]\">
													<img src=\"like.png\" height='20' width='20'/></a> &nbsp &nbsp;
												
													<a href=\"reject.php?id=$row[App_Id]\">
													<img src=\"dislike.png\" height='20' width='20'/></a>
													</td>";
													
													}
													else
													{
														echo "<td></td>";
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