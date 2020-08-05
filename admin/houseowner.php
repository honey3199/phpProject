<?php
			include("header.php");
			require_once("../config/connection.php");
	
			$sql = "SELECT h.H_Name ,a.A_Name , h.Rent , U_Name FROM house h join user1 u join area a where h.User_Id = u.User_Id and h.A_Code = a.A_Code and u.Role_Id = 3 and h.IsActive = 1";
			$flag=0;
			if($_SERVER["REQUEST_METHOD"]=="POST")
			{
				$flag=1;
				$u = $_POST['role'];
				$sql ="SELECT h.H_Name ,a.A_Name , h.Rent , U_Name FROM house h join user1 u join area a where h.User_Id = u.User_Id and h.A_Code = a.A_Code and u.Role_Id = 3 and h.IsActive = 1 and h.User_Id = ".$u."";

			}
		
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
                                <div class="col-md-12">
									<div class="col-md-4">
									<h1>House <span class="table-project-n"></span> Table</h1>
									
									</div>
							<form method="post">
									<div class="add-product">
										<div class="col-md-4">
										<select name="role" class="form-control">
							 <?php
                                $sql1="select * from role r join user1 u where r.Role_Id=u.Role_Id and u.Role_Id = 3";
								$result1 = mysqli_query($conn,$sql1);
								while($row1=mysqli_fetch_array($result1))
								{
							 ?>
								<option value="<?php echo $row1['User_Id'];?>"> 
								<?php echo $row1['U_Name'];?>
								<?php
								}
								?>
										</select>	
										</div >
										<div class="col-md-4">
											<button type="submit">Filter</button>
										</div>
									</div>
									<?php
										if($flag==0)
										{
											$str ="Reports/houseowner.php";
										}
										else
										{
											$str = "Reports/houseowner.php?id=$u";
										}
									?>
									
									<div class="add-product">
										<a href=<?php echo $str?>>Generate Report</a>
									</div>
								</div>
                                </div>
							</form>
						    </div>
                            <div class="sparkline13-graph">
                                <div class="datatable-dashv1-list custom-datatable-overright">
                                    <br/><br/><br/>
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
													echo "<td>".$row['A_Name']."</td>";
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
		<?php include("footer.php"); ?>