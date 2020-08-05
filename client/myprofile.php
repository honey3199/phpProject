<!DOCTYPE html>
<?php include ("header.php");
require_once('../config/connection.php');
session_start();
$id=$_SESSION['User_Id'];
$sql="select * from user1 u join area a join role r 
 where u.A_Code=a.A_Code and u.Role_Id=r.Role_Id  and User_Id='".$id."'";

$result = mysqli_query($conn,$sql);
$row=mysqli_fetch_array($result);
//$uid = $row['User_Id'];
?>
		
		<!-- Banner Section Start -->
		<section id="banner">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="banner_area">
							<h3 class="page_title">My Profile</h3>
							<div class="page_location">
								<a href="">Home</a> 
								<i class="fa fa-angle-right" aria-hidden="true"></i>
								<a href="">Pages</a> 
								<i class="fa fa-angle-right" aria-hidden="true"></i>
								<span>My Profile</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- Banner Section End -->
		
		<!-- Profile Setting Start -->
		<section id="profile_setting">
			<div class="container">
				<div class="row">
					<div class="col-md-3 col-sm-12">
					</div>
					<div class="col-md-8 col-sm-12">
						<div class="row">
							<div class="col-md-8 col-sm-12">
								<form class="profile_area" method="post">
									<div class="personal_infor">
									<h4 class="inner-title">personal information</h4>
										<div class="information_form">
											<div class="row">
												
												<div class="col-md-12">
													<label class="profile_label">Your Name</label>
													<input type="text" name="name" class="form-control" value="<?php echo $row['U_Name']?>">
												</div>
												
												<div class="col-md-12">
													<label class="profile_label">Email Address :</label>
													<input type="text" class="form-control" value="<?php echo $row['Email']?>" name="email">
												</div>
												
												<div class="col-md-12">
													
													<label class="profile_label">Role :</label>
													<input type="text" readonly name="role" class="form-control" value="<?php echo $row['Role_Name']?>">
												</div>
												<div class="col-md-12">
													<label class="profile_label">Address :</label>
													<input type="text" name="address" class="form-control" value="<?php echo $row['Address']?>">
												</div>
												
												
												<div class="col-md-12">
													
													<label class="profile_label">Area :</label>
													<select class="selectpicker form-control" data-live-search="true" name="area">
											
															<?php $sql3="select * from area";
																$result3=mysqli_query($conn,$sql3);
																while($row3=mysqli_fetch_array($result3))
																{
															?>
																<option value='<?php echo $row3['A_Code']; ?>'
																<?php if($row['A_Code']==$row3['A_Code'])
																{echo "selected";} ?>>
																<?php echo $row3['A_Name']; ?>
																</option>
															<?php
															}
															?>
														
														
													</select>
												</div>
												<div class="col-md-12">
													<label class="profile_label">Phone :</label>
													<input type="text" name="contact" class="form-control"  value="<?php echo $row['ContectNo']?>">
												</div>
												
												
											</div>
										</div>
									</div>
									<div class="save_change">
										<button class="btn btn-default" type="submit">Save Changes</button>
									</div>
								</form>
								
								<?php
						           
								   if ($_SERVER["REQUEST_METHOD"] =="POST")
								   {
									   if (isset($_POST["name"]) && isset ($_POST["email"]) && isset ($_POST["address"])
										   && isset($_POST["area"]) && isset ($_POST["contact"]))
									   {
											$name=$_POST["name"];
											$email=$_POST["email"];
											$address=$_POST["address"];
											$area=$_POST["area"];
											$contact=$_POST["contact"];
											
											if($name!='' && $email!='' && $address!='' && $area!='' && $contact!='')
										   {
											   $sql2 = "update user1 set U_Name='".$name."',Email='".$email."',
												Address='".$address."',A_Code='".$area."',
												ContectNo='".$contact."' where User_Id='".$id."'";
											   $result2=mysqli_query($conn,$sql2);
											   if($result2)
											   {
												   echo "<meta http-equiv='refresh' content='3;url=myprofile.php'>";
											   }
										   }
										   else
										   {
											   echo "value is null.";
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
		</section>
		<!-- Profile Setting End -->
<?php include ("footer.php"); ?>