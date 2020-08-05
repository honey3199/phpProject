<?php include("header.php");
//require_once("connection.php");
?>
<?php
if($_SERVER["REQUEST_METHOD"]=="POST")
{
	if(isset($_POST["cname"]) && isset($_POST["desc"]))
	{
		$Catname=$_POST["cname"];		
		$desc=$_POST["desc"];		
		
		
		if($Catname!='' && $desc!='')
		{
			$sql="INSERT INTO category (Cat_Name,Cat_Description) VALUES('".$Catname."','".$desc."')";
			

			$result=mysqli_query($conn,$sql);
			if($result)
			{
				echo "<meta http-equiv='refresh' content='0;url=category.php'>";
			
			}
		} 
	}
		else
		{
			echo "Value not set";
		}
}
?>
        <!-- Basic Form Start -->
        
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline12-list">
                            <div class="sparkline12-hd">
                                <div class="main-sparkline12-hd">
                                    <h1>Category Form</h1>
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
                                                                <label class="login2 pull-right pull-right-pro">Category Name</label>
                                                            </div>
                                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                                <input type="text" class="form-control" name="cname" />
                                                            </div>
														</div>
                                                    </div>
                                                    <div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                <label class="login2 pull-right pull-right-pro">Category Description</label>
                                                            </div>
                                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                                <textarea rows="5" cols="100" name="desc"></textarea>
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