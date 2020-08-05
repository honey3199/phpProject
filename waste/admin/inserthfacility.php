<?php include("header.php");
require_once("../config/connection.php");
$sql="select * from house";
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
															
															
															
                                                                <select class="form-control" name="n4">
																<?php $sql3="select * from house";
																$result3=mysqli_query($conn,$sql3);
																while($row3=mysqli_fetch_array($result3))
																{
															?>
															<option value="<?php echo $row3['House_Id']; ?>">
															<?php echo $row3['House_Name']; ?></option>
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
															
															
															
                                                                <select class="form-control" name="n4">
																<?php $sql3="select * from facility";
																$result3=mysqli_query($conn,$sql3);
																while($row3=mysqli_fetch_array($result3))
																{
															?>
															<option value="<?php echo $row3['Facility_Id']; ?>">
															<?php echo $row3['F_Name']; ?></option>
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
                                                                <label class="login2 pull-right pull-right-pro">Description</label>
                                                            </div>
                                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
															
															
															
                                                                <select class="form-control" name="n4">
																<?php $sql3="select * from facility";
																$result3=mysqli_query($conn,$sql3);
																while($row3=mysqli_fetch_array($result3))
																{
															?>
															<option value="<?php echo $row3['Facility_Id']; ?>">
															<?php echo $row3['Description']; ?></option>
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
	  if (isset($_POST["hid"]) && isset($_POST["fid"]) && isset($_POST["desc"]))
		{
			$hid=$_POST["hid"];
			$fid=$_POST["fid"];
			$desc=$_POST["desc"];
										   								    
			 if($hid!=' ' && $fid!='' && $desc!='')
			 {
			 $sql = "insert into house_facility (House_Id,Fcaility_Id,Description)
			 values('".$hid."','".$fid."','".$desc."')";
			 echo $sql;
			 die;
			 
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