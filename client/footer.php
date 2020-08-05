<!-- Footer Section Start -->
		<section id="footer">
			<div class="container">
				<div class="row">
					<div class="col-md-3 col-sm-6">
						<div class="footer_widget"> 
							<div class="footer-logo"><a href=""><img class="logo-bottom" src="img/logofooter.png" alt=""></a></div>
							<div class="footer_contact">
								<p>This is an online Web Application that is used to find a house for out siders and also 
								used to find a PGs for boys and girls.
								</p>
								<p>This is one Platform where User can post his House for Rent.</p>
								<p>This Web Application also provides different tiffin service provider so User can Book
								Tiffin in different Packages.
								</p>
							</div>
							<div class="socail_area">
								<ul>
									<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
									<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
									<li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
									<li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
									<li><a href="#"><i class="fa fa-vimeo" aria-hidden="true"></i></a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-sm-6">
						<div class="footer_widget">
							<div class="footer-title">
								<h4>Get In Touch</h4>
							</div>
							<div class="footer_contact">
								<ul>
									<li> <i class="fa fa-phone" aria-hidden="true"></i>
										<div class="ftr-list">
											<h6 class="touch-title">Call Us 24/7</h6>
											<span>8320650091</span>
										</div>
									</li>
									<li> <i class="fa fa-envelope-o" aria-hidden="true"></i>
										<div class="ftr-list">
											<h6 class="touch-title">Email Address</h6>
											<span>dwedis759@gmail.com</span> 
										</div>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-sm-6">
						<div class="footer_widget">
							<div class="footer-title">
								<h4>Quick Links</h4>
							</div>
							<div class="footer_contact">
								<ul>
									<li><a href="index.php">Home</a></li>
									<li><a href="property.php">Properties</a></li>
									<li><a href="tiffinservice.php">Tiffin Service</a></li>
									<li><a href="contact.php">Contact</a></li>
									<li><a href="index.php#feedback">Feedback</a></li>
									<?php if(!isset($_SESSION['User_Id']))
									{
									?>
									<li><a href="registerc.php">Become A Member</a></li>
									<?php } ?>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-sm-6">
						<div class="footer_area">
							<div class="footer-title">
								<h4>Newslatter</h4>
							</div>
							<div class="footer_contact">
								<p>Subscribe to our newsletter and we will inform your about newset projects.</p>
								<div class="news_letter">


									<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
										<input type="email" name="email" placeholder="Enter Your Email" class="news_email">
										<button type="submit" name="submit" class="btn btn-default">subscribe</button>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- Footer Section End --> 
		
		<!-- Bottom Footer Start -->
		<div id="bottom_footer">
			<div class="reserve_text"> <span>Copyright &copy; 2019 Dwelling Discoverer All Right Reserve</span> </div>
		</div>
		<!-- Bottom Footer End -->
		
		<!-- Scroll to top -->
		<div class="scroll-to-top">
			<a href="#" class="scroll-btn" data-target=".pagewrap"><i class="fa fa-angle-up" aria-hidden="true"></i></a>
		</div>
		<!-- End Scroll To top -->
			
		<!-- All Javascript Plugin File here -->
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/bootstrap-select.js"></script>
		<script src="js/YouTubePopUp.jquery.js"></script>
		<script src="js/jquery.fancybox.pack.js"></script>
		<script src="js/jquery.fancybox-media.js"></script>
		<script src="js/owl.js"></script>
		<script src="js/mixitup.js"></script>
		<script src="js/wow.js"></script>
		<script src="js/jshashtable-2.1_src.js"></script>
		<script src="js/jquery.numberformatter-1.2.3.js"></script>
		<script src="js/tmpl.js"></script>
		<script src="js/jquery.dependClass-0.1.js"></script>
		<script src="js/draggable-0.1.js"></script> 
		<script src="js/jquery.slider.js"></script> 
		<script src="js/custom.js"></script>
		<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','../../../../www.google-analytics.com/analytics.js','ga');

		  ga('create', 'UA-106986305-1', 'auto');
		  ga('send', 'pageview');
		</script>
	</body>

<!-- Mirrored from unicoderbd.com/theme/html/uniland/index_1.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 04 Jan 2019 19:29:43 GMT -->
</html>

<?php

require_once("lib/function.php");
include('PHPMailer/PHPMailerAutoload.php');

if ($_SERVER["REQUEST_METHOD"]=="POST") 
{
	
	if(isset($_POST['email']) && !empty($_POST['email']))
	{
		
		$email = mysqli_real_escape_string($conn,$_POST['email']);
		
		$query = "select * from user1 where Email = '".$email."'";
		
		$result = mysqli_query($conn, $query);
		$arr = array();
		if (mysqli_num_rows($result) == 1) 
		{
		
			
			$row1 = mysqli_fetch_array($result);
		
				
	
					
			
				$message = "<h3>thank you for subscribing our site "."</br>"."you will be notified about our latest update"."</h3>";
				$subject = "Subscription";		
				$mailSent = send_mail($email, $message, $subject);
				if ($mailSent) 
				{
					session_start();
					$_SESSION['User_Id'] = $id;
					echo "<script>
								window.location='index.php';
					      </script>";
				}
				else
				{
					
				}
				$array = array('status' => '200' , 'details' => $arr);
		}	
			
	}
	else
	{
		echo "asdasasdad"; die;
	}	 
}
?>