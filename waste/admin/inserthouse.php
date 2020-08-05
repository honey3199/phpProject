<?php include("header.php");
require_once("connection.php");	
$sql="select * from house a join category b join user1 c join area d where a.Cat_Id=b.Cat_Id and a.User_Id=c.User_Id and a.A_Code=d.A_Code ";
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
                                                <form action="#" method="POST">
                                                    
														<div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                <label class="login2 pull-right pull-right-pro">Category Name</label>
                                                            </div>
                                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
															
																<select class="form-control" name="n1">
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
                                                                <label class="login2 pull-right pull-right-pro">User Name</label>
                                                            </div>
                                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                                <input type="text" class="form-control" name="no"/>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    	<div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                <label class="login2 pull-right pull-right-pro">Area Name</label>
                                                            </div>
                                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
															
															
															
                                                                <select class="form-control" name="n4">
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
                                                                <label class="login2 pull-right pull-right-pro">Profile Image</label>
                                                            </div>
                                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                                <input type="text" class="form-control" name="image" />
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
                                                                <label class="login2 pull-right pull-right-pro">Uploaded_Date</label>
                                                            </div>
                                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                                <input type="text" class="form-control" name="uploaddt"/>
                                                            </div>
                                                        </div>
                                                    </div>
													 <div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                <label class="login2 pull-right pull-right-pro">Square_Foot</label>
                                                            </div>
                                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                                <input type="text" class="form-control" name="square" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                <label class="login2 pull-right pull-right-pro">No_Of_Rooms</label>
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
									   if (isset($_POST["n4"]) && isset($_POST["n2"]) && isset($_POST["n3"]) && isset($_POST["add"]) && 
									   isset($_POST["image"]) && isset($_POST["desc"]) && isset($_post["rent"]) && isset($_POST["uploaddt"]) 
									   && isset($_POST["square"]) && isset($_POST["room"]) && isset($_POST["floor"]))
									   {
										   $cat=$_POST["n4"];
										   $user=$_POST["n2"];
										   $area=$_POST["n3"];
										   $address=$_POST["add"];
										   $img=$_POST["image"];
										   $description=$_POST["desc"];
										   $rent1=$_POST["rent"];
										   $upload=$_POST["uploaddt"];
										   $squarefoot=$_POST["square"];
										   $noroom=$_POST["room"];
										   $floors=$_POST["floor"];
										    
									
										   
										   if($cat!=' ' && $user!='' && $area!='' && $address!='' && $img!='' && $description!=''
										   && $rent1!='' && $upload!='' && $squarefoot!='' && $noroom!='' && $floors!='')
										   {
											   $sql = "insert into house(Cat_Id,User_Id,A_Code,Address,Profile_Image,Description,Rent,Uploaded_Date,
											   Square_Foot,No_of_Rooms,Floor)values('".$cat."','".$user."','".$area."','".$address."','".$img."',
											   '".$description."','".$rent1."','".$upload."','".$squarefoot."','".$noroom."','".$floors."')";
											   
											   $result=mysqli_query($conn,$sql);
											   
											   if($result)
											   {
												   echo "<meta http-equiv='refresh' content='3;url=house.php'>";
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