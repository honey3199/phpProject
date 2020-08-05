<!DOCTYPE html>
<?php include ("header.php"); ?>
<?php require_once('../config/connection.php');
session_start();
$id = $_SESSION['User_Id'];
$sql = "SELECT * FROM complaint c JOIN user1 u WHERE c.User_Id=u.User_Id and u.User_Id='".$id."'";
$result = mysqli_query($conn,$sql);
 ?>
		<!-- Banner Section Start -->
		<section id="banner">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="banner_area">
							<h3 class="page_title">Complaint</h3>
							<div class="page_location">
								<a href="">Home</a> 
								<i class="fa fa-angle-right" aria-hidden="true"></i>
								<a href="">Pages</a> 
								<i class="fa fa-angle-right" aria-hidden="true"></i>
								<span>Complaint</span>
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
															<td>House Owner Name</td>
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
													
													echo "<td>".$row['U_Name']."</td>";
													echo "<td>".$row['U_Name']."</td>";
													echo "<td>".$row['U_Name']."</td>";
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
																		<label class="profile_label">House Owner :</label>
																			<select class="selectpicker form-control" data-live-search="true" name="house">
																				<option> </option>
																			<?php $sql3="select * from User1 where Role_Id='3'";
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
																	</div>
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
																	</div>
															<div class="col-md-12">
																<label class="profile_label">Your Complaint :</label>
																<textarea class="form-control" name="complaint" rows="4" cols="100"></textarea>
															</div>
															<div class="col-md-12">
																<button type="submit" name="submit" class="btn btn-default">Replay</button>
															</div>
														</div>
													</div>
												</form>
												<?php						
						   if ($_SERVER["REQUEST_METHOD"] =="POST")
						    {
							    if (isset($_POST["complaint"]))
								{
										   $uid=$_SESSION["User_Id"];
										   $house=$_POST["house"];
										   $tiffin=$_POST["tiffin"];
										   $desc=$_POST["complaint"];
										   $date=date('y-m-d');
										   
									
										   
										   if($uid!='' && $desc!='' && $date!='')
										    {
											   $sql = "insert into complaint(User_Id,House_Owner_Id,TSProvider_Id,Description,Com_Date,Com_Status)
											   values('".$uid."','".$house."','".$tiffin."','".$desc."','".$date."','Pending')";
											  //echo $sql;
											  // die;
											   $result=mysqli_query($conn,$sql);
											   
											   
											   if($result)
											   {
												   echo "<meta http-equiv='refresh' content='3;url=index.php'>";
											   }
										    }
											
							    }
							    else
							    {
								   echo "value not set";
							    }								
							}    
					   ?>
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