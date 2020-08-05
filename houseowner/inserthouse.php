<?php include("header.php");
//require_once("connection.php");	
$id = $_SESSION["U_Id"];
$sql="select * from house a join category b join user1 c join area d 
where a.Cat_Id=b.Cat_Id and a.User_Id=c.User_Id and a.A_Code=d.A_Code and a.User_Id='".$id."'";
$result= mysqli_query($conn,$sql);
?>

        <!-- Basic Form Start -->
        
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline12-list">
                            <div class="sparkline12-hd">
                                <div class="main-sparkline12-hd">
                                    <h1>House Form</h1>
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
                                                                <label class="login2 pull-right pull-right-pro">Category Name</label>
                                                            </div>
                                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
															
																<select class="form-control" name="category">
																<?php $sql3="select * from category";
																$result3=mysqli_query($conn,$sql3);
																while($row3=mysqli_fetch_array($result3))
																{
															?>
															<option value="<?php echo $row3['Cat_Id']; ?>">
															<?php echo $row3['Cat_Name']; ?></option>
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
                                                                <label class="login2 pull-right pull-right-pro">House Name</label>
                                                            </div>
                                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                                <input type="text" class="form-control" name="hname"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                     
                                                    <div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                <label class="login2 pull-right pull-right-pro">Address</label>
                                                            </div>
                                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                                <input type="text" class="form-control" name="add"/>
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
                                                                <label class="login2 pull-right pull-right-pro">Profile Image</label>
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
                                                                <label class="login2 pull-right pull-right-pro">Rent</label>
                                                            </div>
                                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                                <input type="text" class="form-control" name="rent" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                <label class="login2 pull-right pull-right-pro">Area(Square Foot)</label>
                                                            </div>
                                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                                <input type="text" class="form-control" name="square" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                <label class="login2 pull-right pull-right-pro">No. of Rooms</label>
                                                            </div>
                                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                                <input type="text" class="form-control" name="room"/>
                                                            </div>
                                                        </div>
                                                    </div>
													<div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                <label class="login2 pull-right pull-right-pro">Floor</label>
                                                            </div>
                                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                                <input type="text" class="form-control" name="floor"/>
                                                            </div>
                                                        </div>
                                                    </div>
															<div class="row">
                                                                <div class="col-lg-3"></div>
                                                                <div class="col-lg-9">
                                                                    <div class="login-horizental cancel-wp pull-left">
                                                                        
                                                                        <button class="btn btn-sm btn-primary login-submit-cs" type="submit" name="submit">Submit</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
												<?php
						           
								   if ($_SERVER["REQUEST_METHOD"] == "POST")
								   {
									   if (isset($_POST["category"]) && isset($_POST["hname"]) && isset($_POST["add"]) && 
									   isset($_POST["area"]) && isset($_POST["desc"]) && isset($_POST["rent"])
									   && isset($_POST["square"]) && isset($_POST["room"]) && isset($_POST["floor"]))
									   {
										   $cat=$_POST["category"];
										   $name=$_POST["hname"];
										   $add=$_POST["add"];
										   $area=$_POST["area"];
										   $desc=$_POST["desc"];
										   $rent=$_POST["rent"];
										   $upload=date('Y-m-d');
										   $square=$_POST["square"];
										   $rooms=$_POST["room"];
										   $floors=$_POST["floor"];
										    
										   if(isset($_FILES['image']))
										   {
    
												$file_name = $_FILES['image']['name'];
												$file_tmp =$_FILES['image']['tmp_name'];
	  
												if(move_uploaded_file($file_tmp,"../profileimages/".$file_name)==1)
												{
								   				   if($cat!='' && $name!='' && $add!='' && $area!='' && $desc!=''
													&& $rent!='' && $upload!='' && $square!='' && $rooms!='' && $floors!='')
													{
														$sql2 = "insert into house(Cat_Id,User_Id,A_Code,H_Name,Address,Profile_Image,Description,Rent,Uploaded_Date,
														Square_Foot,No_of_Rooms,Floor)values('".$cat."','".$id."','".$area."','".$name."','".$add."','".$file_name."',
														'".$desc."','".$rent."','".$upload."','".$square."','".$rooms."','".$floors."')";
														$result2=mysqli_query($conn,$sql2);
											   
														if($result2)
														{
															echo "<meta http-equiv='refresh' content='3;url=house.php'>";
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