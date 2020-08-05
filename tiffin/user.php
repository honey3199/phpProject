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
	<?php
			include("header.php");
			//include("../config/connection.php");
			//session_start();
			$id=$_SESSION['User'];
			$sql = "select r.Role_Name,a.A_name,p.Package_Name,u.User_Id,u.U_Name,u.Address,u.ContectNo,u.Email,u.Password,u.Reg_Date
			from role r,area a,membership_package p,user1 u where u.Role_Id=r.Role_Id 
			and u.A_Code=a.A_Code and u.MPackage_Id=p.MPackage_Id and u.User_Id = '".$id."'";
			///echo $sql;
	
	//die;
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
                                    <h1>User <span class="table-project-n"></span> Table</h1>
                                </div>
						    </div>
                            <div class="sparkline13-graph">
                                <div class="datatable-dashv1-list custom-datatable-overright">
                                    <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                        data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                        <thead>
                                            <tr>
                                                
                                                
                                                <th>Role Name</th> 
                                                <th>Package Name</th>
												<th>User Name</th>
												<th>Address</th>
												<th>Area name</th>
												
												<th>ContactNo</th>
												<th>Email</th>
												<th>Registration Date</th>
												<th>Action</th>

                                            </tr>
                                        </thead>
                                        <tbody>
												<?php
												while($row=mysqli_fetch_array($result))
												{
													echo "<tr>";
													
													echo "<td>".$row['Role_Name']."</td>";
													echo "<td>".$row['Package_Name']."</td>";
													echo "<td>".$row['U_Name']."</td>";
													echo "<td>".$row['Address']."</td>";
													echo "<td>".$row['A_name']."</td>";
													//echo "<td>".$row['City_Name']."</td>";
													echo "<td>".$row['ContectNo']."</td>";
													echo "<td>".$row['Email']."</td>";
													echo "<td>".$row['Reg_Date']."</td>";
													echo "<td><a href=\"myprofile.php?id=$row[User_Id]\">
												<img src=\"edit.png\" height='20' width='20'/></a> &nbsp &nbsp;
												</td>";
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