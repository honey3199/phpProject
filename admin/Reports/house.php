<?php
			require_once("../config/connection.php");
			//session_start();
			//$id=$SESSION['User_Id'];
			$sql = "SELECT h.H_Name ,a.A_Name , h.Rent , u.U_Name FROM house h join user1 u join area a where h.House_Id = u.User_Id and h.A_Code = a.A_Code and u.Role_Id = 3";
			
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
                                    <h1>User <span class="table-project-n"></span> Table</h1>
									<div class="add-product">
										<select name="role" id="select" class="form-control">
							 <?php
                                $sql="select * from role r join user1 u where r.Role_Id=u.Role_Id and u.Role_Id = 3";
								$result = mysqli_query($conn,$sql);
								while($row=mysqli_fetch_array($result))
								{
							 ?>
								<option value="<?php echo $row['User_Id'];?>"> 
								<?php echo $row['U_Name'];?>
								<?php
								}
								?>
										</select>	
							 
									</div>
                                </div>
						    </div>
                            <div class="sparkline13-graph">
                                <div class="datatable-dashv1-list custom-datatable-overright">
                                    
                                    <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                        data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                        <thead>
                                            <tr>
                                                <th>House Name</th> 
                                                <th>Area Name</th>
												<th>Rent</th>
												<th>User Name</th>
												
                                            </tr>
                                        </thead>
                                        <tbody>
												<?php
												while($row=mysqli_fetch_array($result))
												{
													echo "<tr>";
													
													echo "<td>".$row['H_Name']."</td>";
													echo "<td>".$row['A_name']."</td>";
													echo "<td>".$row['Rent']."</td>";
													echo "<td>".$row['U_Name']."</td>";
													
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