<?php include("header.php");
require_once("../config/connection.php");
$id = $_SESSION['U_Id'];
$sql="select * from house where User_Id='".$id."'";
$result= mysqli_query($conn,$sql);
$sql1="select * from facility";
$result1=mysqli_query($conn,$sql1);
?>

        <!-- Basic Form Start -->
        
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline12-list">
                            <div class="sparkline12-hd">
                                <div class="main-sparkline12-hd">
                                    <h1>House Facility Form</h1>
                                </div>
                            </div>
                            <div class="sparkline12-graph">
                                <div class="basic-login-form-ad">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="all-form-element-inner">
                                                <form action="" method="POST">
                                                    
												<div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                <label class="login2 pull-right pull-right-pro">House Name</label>
                                                            </div>
                                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
															
															
															
                                                            <select class="form-control" name="hid">
															<?php
																while($row=mysqli_fetch_array($result))
																{
															?>
															<option value="<?php echo $row['House_Id']; ?>">
															<?php echo $row['H_Name']; ?></option>
															<?php															
															}
															?>
															</select>
                                                            </div>
                                                        </div>
                                                    </div>
													 
													<div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                <label class="login2 pull-right pull-right-pro">Facility Name</label>
                                                            </div>
                                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
															
															
															
                                                                <select class="form-control" name="fid">
																<?php 
																while($row1=mysqli_fetch_array($result1))
																{
															?>
															<option value="<?php echo $row1['Facility_Id']; ?>">
															<?php echo $row1['F_Name']; ?></option>
															<?php															
															}
															?>
															</select>
                                                            </div>
                                                        </div>
                                                    </div>
													 
                                                     
                                                            <div class="row">
                                                                <div class="col-lg-3"></div>
                                                                <div class="col-lg-9">
                                                                    <div class="login-horizental cancel-wp pull-left">
                                                                        
                                                                        <button class="btn btn-sm btn-primary login-submit-cs" type="submit">Submit</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
<?php
						           
	if ($_SERVER["REQUEST_METHOD"] =="POST")
	{
	  if (isset($_POST["hid"]) && isset($_POST["fid"]))
		{
			$hid=$_POST["hid"];
			$fid=$_POST["fid"];
										   								    
			 if($hid!=' ' && $fid!='')
			 {
			 $sql = "insert into house_facility (Facility_Id,House_Id)
			 values('".$fid."','".$hid."')";
			// echo $sql;
			 //die;
			 $result=mysqli_query($conn,$sql);
											   
				if($result)
				{
					 echo "<meta http-equiv='refresh' content='3;url=housefacility.php'>";
				}
			  }
		}
		else
		{
			echo"value not set";
		}
									   
								   
	}
?>
						            
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php include("footer.php");?>