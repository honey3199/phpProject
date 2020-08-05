<!DOCTYPE html>
<?php include ("header.php"); ?>
<?php require_once('../config/connection.php');
session_start();
$id = $_SESSION['User_Id'];
$sql = "SELECT u.U_Name as houseowner , (SELECT U_Name from user1 where User_Id = c.User_Id ) as customer , c.Description , c.Com_Date , c.Com_Status FROM complaint c join user1 u where c.House_Owner_Id = u.User_Id and u.Role_Id=3 and c.User_Id='".$id."'";
$result = mysqli_query($conn,$sql);
 ?>
					<?php						
$emailErr=$houseErr="";
						   if ($_SERVER["REQUEST_METHOD"] =="POST")
						    {
							    if(empty($_POST["complaint"]))
								{
									$emailErr= "Complaint is required";
								}
								else
								{
									$desc = $_POST["complaint"];
								}
								if(empty($_POST["tiffin"]))
								{
									$houseErr= "Tiffin Service Provider Name is required";
								}
								else
								{
									$tiffin = $_POST["tiffin"];
								}
												
							    if (isset($_POST["complaint"]) && isset($_POST["tiffin"]))
								{
										   $uid=$_SESSION["User_Id"];
										   $tiffin=$_POST["tiffin"];
										   $desc=$_POST["complaint"];
										   $date=date('y-m-d');
										   
									
										   
										   if($uid!='' && $tiffin!='' && $desc!='' && $date!='')
										    {
											   $sql = "insert into complaint(User_Id,TSProvider_Id,Description,Com_Date,Com_Status)
											   values('".$uid."','".$tiffin."','".$desc."','".$date."','Pending')";
											  //echo $sql;
											  // die;
											   $result=mysqli_query($conn,$sql);
											   
											   
											   if($result)
											   {
												   echo "<meta http-equiv='refresh' content='3;url=tiffincomplaint.php'>";
											   }
										    }
											
							    }
							    else
							    {
								   echo "value not set";
							    }								
							}    
					   ?>
		<!-- Banner Section Start -->
		<section id="banner">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="banner_area">
							<h3 class="page_title">Tiffin Service Complaint</h3>
							<div class="page_location">
								<a href="">Home</a> 
								<i class="fa fa-angle-right" aria-hidden="true"></i>
								<a href="">Pages</a> 
								<i class="fa fa-angle-right" aria-hidden="true"></i>
								<span>Tiffin Service Complaint</span>
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
				
					<div class="col-md-12 col-sm-12">
						
						<div class="row">
							<div class="col-md-12">
									<div class="row">
										<div class="col-md-12">
											<div>
												<table class="list_table" cellpadding="0" cellspacing="0">
													<thead>
														<tr>
															<td>User Name</td>
															<td>Tiffin Service Provider Name</td>
															<td>Description</td>
															<td>Complaint Date</td>
															<td>Complaint Status</td>
														</tr>
													</thead>
													<tbody>
														
													<?php
													while($row=mysqli_fetch_array($result))
													{
												
													echo "<tr>";
													
													echo "<td>".$row['customer']."</td>";
													echo "<td>".$row['houseowner']."</td>";
													echo "<td>".$row['Description']."</td>";
													echo "<td>".$row['Com_Date']."</td>";
													echo "<td>".$row['Com_Status']."</td>";
													
													echo "</tr>";
													
												
												}
												?>

													</tbody>
													
												</table>
												
												
											</div>
										</div>
									</div>
								
								
							</div>
						</div>
					</div>
					<div class="col-md-12 col-sm-12">
						<ul class="user-comments">
								<li>
									<div class="comment_description">
										<div class="author_text">
											
											<div class="comment_description replied">
												<form class="replay-form" action="" method="POST">
													<div class="row">
														<div class="form-group col-md-12 col-sm-12">
																	<div class="col-md-6 col-sm-12">
																		<label class="profile_label">Tiffin Service Provider :</label>
																			<select class="selectpicker form-control" data-live-search="true" name="tiffin">
																				<option> </option>
																			<?php $sql3="select * from User1 where Role_Id='4'";
																				$result3=mysqli_query($conn,$sql3);
																				while($row3=mysqli_fetch_array($result3))
																				{
																				?>
																			<option value='<?php echo $row3['User_Id'];?>'>
																			<?php echo $row3['U_Name']; ?>
																			</option>
																			<?php															
																				}
																			?>
																		</select>
																		<span class="error"><?php echo $houseErr;?></span>
																	</div>
															<div class="col-md-12">
																<label class="profile_label">Your Complaint :</label>
																<textarea class="form-control" name="complaint" rows="4" cols="100"></textarea>
																<span class="error"><?php echo $emailErr;?></span>
															</div>
															<div class="col-md-12">
																<button type="submit" name="submit" class="btn btn-default">Replay</button>
															</div>
														</div>
													</div>
												</form>
											</div>
										</div>
									</div>
								</li>
								
							</ul>
						</div>
				</div>
			</div>
		</section>
		<!-- Profile Setting End -->
		
	<?php include ("footer.php"); ?>