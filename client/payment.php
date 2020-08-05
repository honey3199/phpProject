<?php
//include("header.php");
require_once("../config/connection.php");
//Set useful variables for paypal form
$paypalURL = 'https://www.sandbox.paypal.com/cgi-bin/webscr'; //Test PayPal API URL
$paypalID = 'dwedis759@gmail.com'; //Business Email


if(isset($_GET['id']))
{
	$id=$_GET['id'];
	$sql = "Select u.U_Name , m.Price from user1 u join membership_package m 
	where u.MPackage_Id=m.MPackage_Id and u.User_Id='".$id."'";
	//echo $sql;
	//die;
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_array($result);
}
?>
<html lang="en">
	
<!-- Mirrored from unicoderbd.com/theme/html/uniland/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 04 Jan 2019 19:31:17 GMT -->
<head>
		<!-- Meta Tag -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="Uniland - Real Estate HTML5 Template">
		<meta name="keywords" content="real estate, property, property search, agent, apartments, booking, business, idx, housing, real estate agency, rental">
		<meta name="author" content="unicoder">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<title>Dwelling Discoverer</title>
		<!-- Favicon -->
		<link rel="shortcut icon" href="img/favicon.ico">
		
		<!-- Bootstrap -->
		<link rel="stylesheet" href="css/bootstrap.css">
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/font-awesome.css">
		<link rel="stylesheet" href="css/color.css" id="color-change">
		<link rel="stylesheet" href="css/jslider.css">
		<link rel="stylesheet" href="css/responsive.css">
		<link rel="stylesheet" href="css/loader.css">
	
	</head>
	<body class="pagewrap login_and_Signup">
		<section class="login-box">
			<!-- Modal -->
			<div id="myModal_two">
			<br/>
			<br/>
				<div class="modal-dialog toggle_area" role="document">
					<div class="modal-header toggle_header">
						<h4 class="inner-title">Payment</h4>
					</div>
					<div class="modal-body login_body">
						<p>Welcome to Dwelling Discoverer..!</p>
						<div class="login_option">
						    <form class="signin" action="<?php echo $paypalURL; ?>" method="post">

								<div class="form-group">
								<label>User Name</label>
									<input type="text" readonly class="form-control" value="<?php echo $row['U_Name']?>" name="username">
								</div>
								<div class="form-group">
								<label>Ammount</label>
									<input type="text" readonly class="form-control" value="<?php echo $row['Price']?>" name="password">
								</div>
								
        <input type="hidden" name="business" value="<?php echo $paypalID; ?>">
        
        <!-- Specify a Buy Now button. -->
        <input type="hidden" name="cmd" value="_xclick">
        
        <!-- Specify details about the item that buyers will purchase. -->
        <input type="hidden" name="item_name" value="<?php echo $row['U_Name']; ?>">
		<input type="hidden" name="amount" value="<?php echo $row['Price']/70; ?>">
          <input type="hidden" name="currency_code" value="USD">
        
        <!-- Specify URLs -->
        <input type='hidden' name='cancel_return' value='http://localhost/DD/client/cancel.php'>
		
        <input type='hidden' name='return' value='http://localhost/DD/client/logint.php?id=<?php echo $id?>'>
        
								
								<div class="text-center">
									        <!-- Display the payment button. -->
        <input type="image" name="submit" border="0"
        src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif" alt="PayPal - The safer, easier way to pay online">
        <img alt="" border="0" width="1" height="1" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" >
		
								</div>
							</form>
						</div>
					</div>
			</div>
		</section>
</html>
<?php include("footer.php");?>