<!DOCTYPE html>
<?php 
session_start();
include ("header.php"); ?>	
<?php
require_once('../config/connection.php');
?>
<?php						
						   $emailErr="";
						   if ($_SERVER["REQUEST_METHOD"] =="POST")
						    {
								if(empty($_POST["feedback"]))
								{
									$emailErr= "feedback is required";
								}
								else
								{
									$user = $_POST["feedback"];
								}
		
							    if (isset($_POST["feedback"]))
								{
										   $uid=$_SESSION["User_Id"];
										   $user=$_POST["feedback"];
										   $date=date('y-m-d');
										   
										  // $pass1=$_POST["confirm_password"]; 
									
										   
										   if( $user!='')
										    {
											   $sql = "insert into feedback(User_Id,Feedback,Feed_Date)values('".$uid."','".$user."','".$date."')";
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

	
		<!-- Banner Section Start -->
		<section id="banner">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="banner_area">
							<h3 class="page_title">Feedback</h3>
							<div class="page_location">
								<a href="">Home</a> 
								<i class="fa fa-angle-right" aria-hidden="true"></i>
								<a href="">Pages</a> 
								<i class="fa fa-angle-right" aria-hidden="true"></i>
								<span>Feedback</span>
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
						
					</div>
							<ul class="user-comments">
								<li>
									<div class="comment_description">
										<div class="author_text">
											
											<div class="comment_description replied">
												<form class="replay-form" action="" method="POST">
													<div class="row">
														<div class="form-group col-md-12 col-sm-12">
															<textarea class="form-control" name="feedback" placeholder="Your Feedback" rows="4" cols="100"></textarea>
															<span class="error"><?php echo $emailErr;?></span>
															<button type="submit" name="submit" class="btn btn-default">Replay</button>
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
			</div>
		</section>
		<!-- Profile Setting End -->
		
<?php include ("footer.php");