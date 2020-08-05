<?php include("header.php");
require_once("../config/connection.php");
if(isset($_GET['id']))
{
	$id=$_GET['id'];
	
	$sql="Select * from tiffin_service_package where IsActive = 1 and TSPackage_Id = '".$id."'";
	
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
                                    <h1>Tiffin Service Package Form</h1>
                                </div>
                            </div>
                            <div class="sparkline12-graph">
                                <div class="basic-login-form-ad">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="all-form-element-inner">
                                                <form method="post" enctype="multipart/form-data">
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
                                                                <input type="text" class="form-control" name="desc" value='<?php echo $row['Description']?>'/>
                                                            </div>
                                                        </div>
                                                    </div>
													<div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                <label class="login2 pull-right pull-right-pro">Price</label>
                                                            </div>
                                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                                <input type="text" class="form-control" name="price" value='<?php echo $row['Price']?>' />
                                                            </div>
                                                        </div>
                                                    </div>
													<div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                <label class="login2 pull-right pull-right-pro">Images</label>
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
                                                                <label class="login2 pull-right pull-right-pro">Food Type</label>
                                                            </div>
                                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                                 <select class="form-control" name="ftype">
																<?php $sql3="select * from food";
																$result3=mysqli_query($conn,$sql3);
																while($row3=mysqli_fetch_array($result3))
																{
															?>
															<option value="<?php echo $row3['Food_Id']; ?>"
															<?php if($id==$row3['Food_Type']) echo "selected"?>>
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
                                                                    <div class="login-horizental cancel-wp pull-left">
                                                                        
                                                                        <button class="btn btn-sm btn-primary login-submit-cs" name="submit" type="submit">Submit</button>
                                                                    </div>
                                                                </div>
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
					$sql = "update tiffin_service_package set Package_Name='".$pname."',Description='".$desc."',
					Price='".$price."',Profile_Image='".$file_name."',Food_Id='".$ftype."',Duration='".$dur."' where TSPackage_Id = '".$id."'";
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