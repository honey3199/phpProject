<?php include("header.php");
require_once("../config/connection.php")
?>

        <!-- Basic Form Start -->
        
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline12-list">
                            <div class="sparkline12-hd">
                                <div class="main-sparkline12-hd">
                                    <h1>Facility Form</h1>
                                </div>
                            </div>
                            <div class="sparkline12-graph">
                                <div class="basic-login-form-ad">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="all-form-element-inner">
                                                <form action="#" method="POST">
                                                    <div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                <label class="login2 pull-right pull-right-pro">Facility Name</label>
                                                            </div>
                                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                                <input type="text" class="form-control" name="fname" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                <label class="login2 pull-right pull-right-pro">Description</label>
                                                            </div>
                                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                                <input type="text" class="form-control" name="dis"/>
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
	if($_SERVER["REQUEST_METHOD"]=="POST")
	{
		if(isset($_POST["fname"]) && isset($_POST["dis"]))
		{
			
			$facilityname=$_POST["fname"];
			$disc=$_POST["dis"];
		
	
		if($facilityname!='' && $disc!='')
		{
			$sql="INSERT INTO facility (F_Name,Description,IsActive)VALUES('".$facilityname."','".$disc."',1)";
			
			$result=mysqli_query($conn,$sql);
			if($result)
			{
				echo "<meta http-equiv='refresh' content='0;url=facility.php'>";
			}
		} 
		
		else
		{
			echo "Value not set";
		}
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