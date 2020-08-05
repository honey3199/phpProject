<?php include("header.php");
require_once("../config/connection.php");
//session_start();
$id=$_SESSION["User"];
?>

        <!-- Basic Form Start -->
        
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline12-list">
                            <div class="sparkline12-hd">
                                <div class="main-sparkline12-hd">
                                    <h1>Tiffin Service Package Form</h1>
                                </div>
                            </div>
                            <div class="sparkline12-graph">
                                <div class="basic-login-form-ad">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="all-form-element-inner">
                                                <form action="" method="POST" enctype="multipart/form-data">
                                                      <div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                <label class="login2 pull-right pull-right-pro">Food Type</label>
                                                            </div>
                                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                               <select class="form-control" name="ftype">
																<?php $sql3="select * from food";
																$result3=mysqli_query($conn,$sql3);
																while($row3=mysqli_fetch_array($result3))
																{
															?>
															<option value="<?php echo $row3['Food_Id']; ?>">
															<?php echo $row3['Food_Type']; ?></option>
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
                                                                <label class="login2 pull-right pull-right-pro">package Name</label>
                                                            </div>
                                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
															 <input type="text" class="form-control" name="pname"/>
                                                            </div>
                                                        </div>
                                                    </div>
													<div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                <label class="login2 pull-right pull-right-pro">Image</label>
                                                            </div>
                                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
															 <img id="output" height="100"/>
																<br/>
																<input type="file" name="image" accept="image/*"  
																	onchange="loadFile(event)">
										

																<script>
																	function loadFile(event) {
																	document.getElementById('output').src = 
																	URL.createObjectURL(event.target.files[0]);
																	};
																</script>
																<br/>
                                                            </div>
                                                        </div>
                                                    </div>
													 
													
                                                    <div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                <label class="login2 pull-right pull-right-pro">Description</label>
                                                            </div>
                                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                                <input type="text" class="form-control" name="desc"/>
                                                            </div>
                                                        </div>
                                                    </div>
													<div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                <label class="login2 pull-right pull-right-pro">Price</label>
                                                            </div>
                                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                                <input type="text" class="form-control" name="price" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                  
													<div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                <label class="login2 pull-right pull-right-pro">Duration</label>
                                                            </div>
                                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                                <input type="text" class="form-control" name="dur"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                            <div class="row">
                                                                <div class="col-lg-3"></div>
                                                                <div class="col-lg-9">
																	<div class="form-group review-pro-edt">
																		<button type="submit" class="btn btn-primary waves-effect waves-light">Submit
																		</button>
																	</div>                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
												<?php
	if($_SERVER["REQUEST_METHOD"]=="POST")
	{
		if(isset($_POST["pname"]) && isset($_POST["desc"]) && isset($_POST["price"])
			&& isset($_POST["ftype"]) && isset($_POST["dur"]))
			{
			$pname=$_POST["pname"];
			$desc=$_POST["desc"];
			$price=$_POST["price"];
			$ftype=$_POST["ftype"];
			$dur=$_POST["dur"];
		
		if(isset($_FILES['image']))
		{
    
			$file_name = $_FILES['image']['name'];
			$file_tmp =$_FILES['image']['tmp_name'];
	  
			if(move_uploaded_file($file_tmp,"../profileimages/".$file_name)==1)
			{
		
				if($pname!='' && $desc!='' && $price!='' && $ftype!='' && $dur!='')
				{
					$sql="INSERT INTO tiffin_service_package(Package_Name,User_Id,Profile_Image,Description,Price,Food_Id,Duration)VALUES
					('".$pname."','".$id."','".$file_name."','".$desc."','".$price."','".$ftype."','".$dur."')";
					//echo $sql;
					//die;
					$result=mysqli_query($conn,$sql);
					if($result)
					{
						echo "<meta http-equiv='refresh' content='3;url=tspackage.php'>";
					}
				}
			}
		} 
		}
		else
		{
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