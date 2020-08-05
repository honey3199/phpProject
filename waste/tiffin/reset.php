<!doctype html>
<?php require_once("../config/connection.php");
	
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		if(isset($_POST["username"]) && isset($_POST["oldpwd"]) && isset($_POST["newpwd"]) && isset($_POST["newpwd1"]))
		{
			$Email = $_POST["username"];
			$Password = $_POST["oldpwd"];
			
			
			if($Email != '' && $Password != '')
			{
				$query = "select * from user1 u join role r where u.Role_Id = r.Role_Id  and u.Email = '".$Email."'
				and u.password='".$Password."' and u.Role_Id=4";
				
				$result = mysqli_Query($conn,$query);
				
				if (mysqli_num_rows($result) == 1)
				{
					$newpwd = $_POST["newpwd"];
					$newpwd1 = $_POST["newpwd1"];
					
					if ( $newpwd == $newpwd1 )
					{
						$query1="update user1 set Password = '".$newpwd."' where Email = '".$Email."'";
					
				
						$result1 = mysqli_query($conn,$query1);
						
						if($result1)
						{
							header("Location:login.php?msg=Success");
						}
					}
				}
				else
				{
					header("Location:login.php?error=Invalid username or password");
				}
			}
			else
			{
				echo "value is null";
							
			}
		}
		else
		{
			echo "null value";
		}
	}		
	?>
	
	
	
	
	<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Login | Dwelling Discoverer</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Play:400,700" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/owl.theme.css">
    <link rel="stylesheet" href="css/owl.transitions.css">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="css/normalize.css">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="css/main.css">
    <!-- morrisjs CSS
		============================================ -->
    <link rel="stylesheet" href="css/morrisjs/morris.css">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="css/scrollbar/jquery.mCustomScrollbar.min.css">
    <!-- metisMenu CSS
		============================================ -->
    <link rel="stylesheet" href="css/metisMenu/metisMenu.min.css">
    <link rel="stylesheet" href="css/metisMenu/metisMenu-vertical.css">
    <!-- calendar CSS
		============================================ -->
    <link rel="stylesheet" href="css/calendar/fullcalendar.min.css">
    <link rel="stylesheet" href="css/calendar/fullcalendar.print.min.css">
    <!-- forms CSS
		============================================ -->
    <link rel="stylesheet" href="css/form/all-type-forms.css">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="style.css">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- modernizr JS
		============================================ -->
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

    <div class="color-line"></div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="back-link back-backend">
                    <a href="index.html" class="btn btn-primary">Back to Dashboard</a>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"></div>
            <div class="col-md-4 col-md-4 col-sm-4 col-xs-12">
                <div class="text-center m-b-md custom-login">
                    <h3>ADMIN</h3>
					<h5>Reset Password</h5>
                    
                </div>
                <div class="hpanel">
                    <div class="panel-body">
                        <form action="" id="loginForm" method="post">
                            <div class="form-group">
                                <label class="control-label" for="username">User Name</label>
                                <input type="text" placeholder="example@gmail.com" title="Please enter you username" required="" value="" 
								name="username" id="username" class="form-control">
                                <span class="help-block small">Your unique username</span>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="password">Old Password</label>
                                <input type="password" title="Please enter your password" placeholder="******" required="" value="" 
								name="oldpwd" id="password" class="form-control">
                                <span class="help-block small">Your strong password</span>
                            </div>
							 <div class="form-group">
                                <label class="control-label" for="password">New Password</label>
                                <input type="password" title="Please enter your password" placeholder="******" required="" value=""
								name="newpwd" id="password" class="form-control">
                                <span class="help-block small">Your strong password</span>
                            </div>
							 <div class="form-group">
                                <label class="control-label" for="password">Retye New Password</label>
                                <input type="password" title="Please enter your password" placeholder="******" required="" value=""
								name="newpwd1" id="password" class="form-control">
                                <span class="help-block small">Your strong password</span>
                            </div>

							
							
							<?php
							if(isset($_GET['error']))
							{
							echo "<span style='color:red'>".$_GET['error']."</span>";
							
							}
							?>
							
							
                            <div class="checkbox login-checkbox">
                                <label>
										<input type="checkbox" class="i-checks"> Remember me 
								</label>
                               
                            </div>
							
							
                            <button class="btn btn-success btn-block loginbtn">Request New Password</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"></div>
        </div>
      
    </div>

    <!-- jquery
		============================================ -->
    <script src="js/vendor/jquery-1.11.3.min.js"></script>
    <!-- bootstrap JS
		============================================ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- wow JS
		============================================ -->
    <script src="js/wow.min.js"></script>
    <!-- price-slider JS
		============================================ -->
    <script src="js/jquery-price-slider.js"></script>
    <!-- meanmenu JS
		============================================ -->
    <script src="js/jquery.meanmenu.js"></script>
    <!-- owl.carousel JS
		============================================ -->
    <script src="js/owl.carousel.min.js"></script>
    <!-- sticky JS
		============================================ -->
    <script src="js/jquery.sticky.js"></script>
    <!-- scrollUp JS
		============================================ -->
    <script src="js/jquery.scrollUp.min.js"></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src="js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="js/scrollbar/mCustomScrollbar-active.js"></script>
    <!-- metisMenu JS
		============================================ -->
    <script src="js/metisMenu/metisMenu.min.js"></script>
    <script src="js/metisMenu/metisMenu-active.js"></script>
    <!-- tab JS
		============================================ -->
    <script src="js/tab.js"></script>
    <!-- icheck JS
		============================================ -->
    <script src="js/icheck/icheck.min.js"></script>
    <script src="js/icheck/icheck-active.js"></script>
    <!-- plugins JS
		============================================ -->
    <script src="js/plugins.js"></script>
    <!-- main JS
		============================================ -->
    <script src="js/main.js"></script>
</body>

</html>
	
	

