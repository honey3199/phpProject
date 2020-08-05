<?php include("header.php");
require_once("../config/connection.php")
?>

        <!-- Basic Form Start -->
        
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline12-list">
                            <div class="sparkline12-hd">
                                <div class="main-sparkline12-hd">
                                    <h1>Area Form</h1>
                                </div>
                            </div>
                            <div class="sparkline12-graph">
                                <div class="basic-login-form-ad">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="all-form-element-inner">
                                                <form method="POST">
												    <div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                <label class="login2 pull-right pull-right-pro">Area Name</label>
                                                            </div>
                                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
																<input type="text" class="form-control" name="aname"/>
                                                            </div>
                                                        </div>
                                                    </div>

													<div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                <label class="login2 pull-right pull-right-pro">Pincode</label>
                                                            </div>
                                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                                <input type="text" class="form-control" name="pin"/>
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
		if(isset($_POST["aname"]) && isset($_POST["pin"]))
			$areaname=$_POST["aname"];
			$pincode=$_POST["pin"];
			
		
		if($areaname!='' && $pincode!='')
		{
			$sql="INSERT INTO area (A_Name,Pincode)VALUES('".$areaname."','".$pincode."')";
			$result=mysqli_query($conn,$sql);
			if($result)
			{
				echo "<meta http-equiv='refresh' content='3;url=area.php'>";
			}
		} 
		
		else{
			echo "Value not set";
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