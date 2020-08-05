<?php include("header.php");
require_once("../config/connection.php");
$id = $_SESSION['U_Id'];
$sql="select * from house_images a join house b where a.House_Id=b.House_Id and b.User_Id='".$id."'";
$result= mysqli_query($conn,$sql);
?>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline12-list">
                            <div class="sparkline12-hd">
                                <div class="main-sparkline12-hd">
                                    <h1>House Image Form</h1>
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
                                                                <label class="login2 pull-right pull-right-pro">House Name</label>
                                                            </div>
                                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
															
															
															
                                                            <select class="form-control" name="hid">
															<?php
															$sql1="select * from house b where b.User_Id='".$id."'";
															$result1 = mysqli_query($conn,$sql1);
																while($row1=mysqli_fetch_array($result1))
																{
															?>
															<option value="<?php echo $row1['House_Id']; ?>">
															<?php echo $row1['H_Name']; ?></option>
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
                                                                <label class="login2 pull-right pull-right-pro">House Image</label>
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
	  if (isset($_POST["hid"]))
		{
			$hid=$_POST["hid"];
			//$img=$_POST["image"];
			if(isset($_FILES['image']))
			{
    
				$file_name = $_FILES['image']['name'];
				$file_tmp =$_FILES['image']['tmp_name'];
	  
				if(move_uploaded_file($file_tmp,"../images/".$file_name)==1)
				{
								   								    
					if($hid!='')
					{
				 
						$sql2 = "insert into house_images (House_Id,Image_Path)
						values('".$hid."','".$file_name."')";
						$result2=mysqli_query($conn,$sql2);
											   
						if($result2)
						{
							echo "<meta http-equiv='refresh' content='3;url=houseimage.php'>";
						}
					}
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