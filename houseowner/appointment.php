
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Dwelling Discoverer</title>
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
    <!-- meanmenu icon CSS
		============================================ -->
    <link rel="stylesheet" href="css/meanmenu.min.css">
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
    <!-- x-editor CSS
		============================================ -->
    <link rel="stylesheet" href="css/editor/select2.css">
    <link rel="stylesheet" href="css/editor/datetimepicker.css">
    <link rel="stylesheet" href="css/editor/bootstrap-editable.css">
    <link rel="stylesheet" href="css/editor/x-editor-style.css">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="css/data-table/bootstrap-table.css">
    <link rel="stylesheet" href="css/data-table/bootstrap-editable.css">
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

    <?php include("header.php");?>
	
	<?php
			//include("../config/connection.php");
			$id=$_SESSION['U_Id'];
			$sql = "SELECT * FROM appointment a join house h JOIN user1 u 
            where a.House_Id = h.House_Id and a.User_Id = u.User_Id and h.User_Id='".$id."' and a.IsActive=1";
			$result = mysqli_query($conn,$sql);
	?>
    <!-- Start Welcome area -->
    
            <!-- Mobile Menu end -->
          
        <!-- Static Table Start -->
        <div class="data-table-area mg-tb-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline13-list">
                            <div class="sparkline13-hd">
                                <div class="main-sparkline13-hd">
                                    <h1>Appointment <span class="table-project-n"></span> Table</h1>
									<div class="add-product">
										<a href="Reports/app.php?id=<?php echo $id;?>">Generate Report</a>
									</div>
                                </div>
                            </div>
                            <div class="sparkline13-graph">
                                <div class="datatable-dashv1-list custom-datatable-overright">
                                    
                                    <table id="table" data-toggle="table">
                                        <thead>
                                            <tr>
                                                
                                                
                                                <th>House Name</th> 
                                                <th>User Name</th>
												<th>App_Date</th>
												<th>App_Time</th>
												<th>Status</th>
												<th>Action</th>
										</tr>
                                        </thead>
                                        <tbody>
												 <?php
													while($row=mysqli_fetch_array($result))
													{
														
												echo "<tr>";
													
													
													echo "<td>".$row['H_Name']."</td>";
													echo "<td>".$row['U_Name']."</td>";
													echo "<td>".$row['App_Date']."</td>";
													echo "<td>".$row['App_Time']."</td>";
													echo "<td>".$row['Status']."</td>";

																			
														if($row['Status'] == 'Approved')
														{
															echo "<td>
																<a href=\"confirmbooking.php?aid=$row[App_Id]&&hid=$row[House_Id]&&id=$row[User_Id]\">
																<input type='button' value='Confirm Booking'/></a>
															</td>";
														}
														else if($row['Status'] == 'Pending')
														{
															echo "<td>
															<a href=\"accept.php?id=$row[App_Id]\">
															<img src=\"like.png\" height='20' width='20'/></a> &nbsp &nbsp;
												
															<a href=\"reject.php?id=$row[App_Id]\">
															<img src=\"dislike.png\" height='20' width='20'/></a>
															</td>";
													
														}
														else if($row['Status'] == 'Booked')
														{
															echo "<td>
																<a href=\"canclebooking.php?aid=$row[App_Id]&&hid=$row[House_Id]&&id=$row[User_Id]\">
																<input type='button' value='Cancle Booking'/></a>
															</td>";
														}
														else
														{
															echo "<td></td>";
														}
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
        </div>
        <!-- Static Table End -->
        <?php include("footer.php");?>