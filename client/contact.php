<!DOCTYPE html>
<?php include ("header.php"); ?>	
<?php require_once('../config/connection.php'); ?>	
							<?php						
							$fnameErr=$lnameErr=$emailErr=$subErr=$msgErr="";
						   if ($_SERVER["REQUEST_METHOD"] =="POST")
						    {
								if(empty($_POST["firstname"]))
								{
									$fnameErr= "Firstname is required";
								}
								else
								{
									$fname = $_POST["firstname"];
								}
								if(empty($_POST["lastname"]))
								{
									$lnameErr= "Lastname is required";
								}
								else
								{
									$lname = $_POST["lastname"];
								}
								if(empty($_POST["email"]))
								{
									$emailErr= "Email Address is required";
								}
								else
								{
									$email = $_POST["email"];
								}
								if(empty($_POST["subject"]))
								{
									$subErr= "Subject is required";
								}
								else
								{
									$subject = $_POST["subject"];
								}
								if(empty($_POST["message"]))
								{
									$msgErr= "Message is required";
								}
								else
								{
									$message = $_POST["message"];
								}
								
							    if (isset($_POST["firstname"]) && isset($_POST["lastname"]) && isset($_POST["email"])
							     && isset($_POST["subject"]) && isset($_POST["message"]))
								{
										   $fname=$_POST["firstname"];
										   $lname=$_POST["lastname"];
										   $email=$_POST["email"];
										   $subject=$_POST["subject"];
										   $message=$_POST["message"];
										   
										   
										   if( $fname!=''&& $lname!=''&& $email!='' && $subject!='' && 
										   $message!='')
										    {
											   
											   $sql = "insert into contact(Contact_Fname,Contact_Lname,Contact_Email,Contact_Subject,Contact_Message)
											   values('".$fname."','".$lname."','".$email."','".$subject."','".$message."')";
											  //echo $sql;
											   //die;
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
							<h3 class="page_title">Contact</h3>
							<div class="page_location">
								<a href="">Home</a> 
								<i class="fa fa-angle-right" aria-hidden="true"></i>
								<span>Contact</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- Banner Section End -->
		
		<!-- Contact Section Start -->
		<section id="contact">
			<div class="container">
				<h2 class="section_title_blue">Get <span>In Touch</span></h2>
				<div class="row">
					<div class="col-md-6">
						<div class="contact_area">
							<form id="contact-form" method="post">
								<div class="row">
									<div class="form-group col-md-6 col-sm-6">
										<input class="form-control" id="firstname" type="text" name="firstname" placeholder="First Name">
										<span class="error"><?php echo $fnameErr;?></span>
									</div>
									<div class="form-group col-md-6 col-sm-6">
										<input class="form-control" id="lastname" type="text" name="lastname" placeholder="Last Name">
										<span class="error"><?php echo $lnameErr;?></span>
									</div>
									<div class="form-group col-md-6 col-sm-6">
										<input class="form-control" id="email" type="text" name="email" placeholder="Email Address">
										<span class="error"><?php echo $emailErr;?></span>
									</div>
									<div class="form-group col-md-6 col-sm-6">
										<input class="form-control" id="subject" type="text" name="subject" placeholder="Enter Subject">
										<span class="error"><?php echo $subErr;?></span>
									</div>
									<div class="form-group col-md-12 col-sm-12">
										<textarea class="form-control" id="message" name="message" placeholder="Message"></textarea>
										<span class="error"><?php echo $msgErr;?></span>
									</div>
									<div class="form-group col-md-12 col-sm-12">
										<input id="send" class="btn btn-default" type="submit" value="Send">
									</div>
									<div class="col-md-12">
										<div class="error-handel">
											<div id="success">Your email sent Successfully, Thank you.</div>
											<div id="error"> Error occurred while sending email. Please try again later.</div>
										</div>
									</div>
								</div>
							</form>
							
						
							
						</div>
					</div>
					<div class="col-md-6">
						<div class="row">
							<div class="col-md-6">
								<div class="contact_right">
									<h5 class="inner-title">Contact Info</h5>
									<p>dwedis759@gmail.com</p>
								</div>
							</div>
						</div>
						<div class="contact_map">
							<div id="map" class="map-canvas"> </div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- Contact Section End -->
		
	<?php include ("footer.php"); ?>