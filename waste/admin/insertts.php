<?php include("header.php");
require_once("../config/connection.php");
?>

        <!-- Basic Form Start -->
      
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline12-list">
                            <div class="sparkline12-hd">
                                <div class="main-sparkline12-hd">
                                    <h1>Tiffin Service Form</h1>
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
                                                                <label class="login2 pull-right pull-right-pro">Food Type</label>
                                                            </div>
                                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                               <select class="form-control" name="fname">
															   <option>Gujarati</option>
															   <option>Punjabi</option>
															   <option>South Indian</option>
															   </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                <label class="login2 pull-right pull-right-pro">City Name</label>
                                                            </div>
                                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
															
															
															
                                                                <select class="form-control" name="city">
																<?php $sql1="select * from city";
																$result1=mysqli_query($conn,$sql1);
																while($row1=mysqli_fetch_array($result1))
																{
															?>
															<option value="<?php echo $row3['City_Id']; ?>">
															<?php echo $row1['City_Name']; ?></option>
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
                                                                <label class="login2 pull-right pull-right-pro">Area Name</label>
                                                            </div>
                                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
															
															
															
                                                                <select class="form-control" name="area">
																<?php $sql3="select * from area";
																$result3=mysqli_query($conn,$sql3);
																while($row3=mysqli_fetch_array($result3))
																{
															?>
															<option value="<?php echo $row3['A_Code']; ?>">
															<?php echo $row3['A_Name']; ?></option>
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
                                                                <label class="login2 pull-right pull-right-pro">Price</label>
                                                            </div>
                                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                                <input type="text" class="form-control" name="price"/>
                                                            </div>
                                                        </div>
                                                    </div>
													<div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                <label class="login2 pull-right pull-right-pro">Owner Name</label>
                                                            </div>
                                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                                <input type="text" class="form-control" name="oname"/>
                                                            </div>
                                                        </div>
                                                    </div>
													<div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                <label class="login2 pull-right pull-right-pro">ContactNo</label>
                                                            </div>
                                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                                <input type="text" class="form-control" name="contact"/>
                                                            </div>
                                                        </div>
                                                    </div>
													<div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                <label class="login2 pull-right pull-right-pro">Email</label>
                                                            </div>
                                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                                <input type="text" class="form-control" name="email"/>
                                                            </div>
                                                        </div>
                                                    </div>
													<div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                <label class="login2 pull-right pull-right-pro">Date</label>
                                                            </div>
                                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                                <input type="text" class="form-control" name="date"/>
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
	if($_SERVER["REQUEST_METHOD"]=="POST")
	{
		if(isset($_POST["fname"]) && isset($_POST["city"]) && isset($_POST["area"])
			&& isset($_POST["price"]) && isset($_POST["oname"]) && isset($_POST["contact"])
		&& isset($_POST["email"]) && isset($_POST["date"]))
			$fname=$_POST["fname"];
			$city=$_POST["city"];
			$area=$_POST["area"];
			$price=$_POST["price"];
			$oname=$_POST["oname"];
			$contact=$_POST["contact"];
			$email=$_POST["email"];
			$date=$_POST["date"];		
		
		
		if($fname!='' && $city!='' && $area!='' && $price!='' && $oname!='' && $contact!='' && $email!='' && $date!='')
		{
			$sql="INSERT INTO area (Food_Type,A_Code,Owner_Name,ContactNo,Email,Price,Created_On)
			VALUES('".$fname."','".$city."','".$area."','".$price."','".$oname."','".$contact."','".$email."','".$date."')";
			$result=mysqli_query($conn,$sql);
			if($result)
			{
				echo "<meta http-equiv='refresh' content='3;url=tiffinservice.php'>";
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