<?php include("header.php");
require_once("../config/connection.php");
if(isset($_GET['id']))
{
	$id=$_GET['id'];
	
	$sql="Select * from membership_package where MPackage_Id = '".$id."'";
	
	$result=mysqli_query($conn,$sql);
	$row=mysqli_fetch_array($result);
}
?>

        <!-- Basic Form Start -->
        
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline12-list">
                            <div class="sparkline12-hd">
                                <div class="main-sparkline12-hd">
                                    <h1>Membership Package Form</h1>
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
                                                                <label class="login2 pull-right pull-right-pro">Package Name</label>
                                                            </div>
                                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                                <input type="text" class="form-control" name="pname" value='<?php echo $row['Package_Name']?>'/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                <label class="login2 pull-right pull-right-pro">Description</label>
                                                            </div>
                                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                                <input type="text" class="form-control" name="pdesc" value='<?php echo $row['Description']?>'/>
                                                            </div>
                                                        </div>
                                                    </div>
													 <div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                <label class="login2 pull-right pull-right-pro">Price</label>
                                                            </div>
                                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                                <input type="text" class="form-control" name="pprice" value='<?php echo $row['Price']?>'/>
                                                            </div>
                                                        </div>
                                                    </div>
													 <div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                <label class="login2 pull-right pull-right-pro">Duration</label>
                                                            </div>
                                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                                <input type="text" class="form-control" name="dur" value='<?php echo $row['Duration']?>'/>
                                                            </div>
                                                        </div>
                                                    </div>

                                                            <div class="row">
                                                                <div class="col-lg-3"></div>
                                                                <div class="col-lg-9">
                                                                    <div class="form-group review-pro-edt">
																		<button type="submit" class="btn btn-primary waves-effect waves-light">Submit
																		</button>
																	</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
												
	  <?php
						           
								   if ($_SERVER["REQUEST_METHOD"] =="POST")
								   {
									   if (isset($_POST["pname"]) && isset($_POST["pdesc"]) && isset($_POST["pprice"]) && 
											isset($_POST["dur"]))
									   {
										   $package=$_POST["pname"];
										    $desc=$_POST["pdesc"];
											$price=$_POST["pprice"];
											$duration=$_POST["dur"];
											
									
										   
										   if($package!=' ' && $desc!='' && $price!='' && $duration)
										   {
											   $sql = "update membership_package set Package_Name='".$package."',
												Description='".$desc."',Price='".$price."',Duration='".$duration."' 
												where MPackage_Id = '".$id."'";
												
											   $result=mysqli_query($conn,$sql);
											   
											   if($result)
											   {
												   echo "<meta http-equiv='refresh' content='3;url=membershippackage.php'>";
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