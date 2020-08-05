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
    <?php
	include("header.php");
		//include("../config/connection.php");
		$id = $_SESSION['U_Id'];
		$sql = "SELECT * FROM house h JOIN category c JOIN area a WHERE h.Cat_Id=c.Cat_Id and
			h.A_Code=a.A_Code and h.IsActive=1 and h.User_Id='".$id."'";
		$result = mysqli_query($conn,$sql);
	?>
        <!-- Static Table Start -->
		<div class="product-status mg-tb-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-status-wrap">
                            <h4>House Table</h4>
                            <div class="add-product">
                                <a href="inserthouse.php">Add House</a>
                            </div>
                            <div class="sparkline13-graph">
                                <div class="datatable-dashv1-list custom-datatable-overright">
                                    <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                        data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                        <thead>
                                            <tr>
                                                <th>Category Name</th> 
                                                <th>Area Name</th>
												<th>Address</th>
												<th>House Name</th>
												<th>Profile Image</th>
												<th>Description</th>
												<th>Rent Per Month</th>
												<th>Uploaded_Date</th>
												<th>Square_Foot</th>
												<th>No_of_Rooms</th>
												<th>Floor</th>
												<!--<th>View Facility</th>-->
												<th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
												<?php
												while($row=mysqli_fetch_array($result))
												{
												echo "<tr>";
													echo "<td>".$row['Cat_Name']."</td>";
													echo "<td>".$row['A_Name']."</td>";
													echo "<td>".$row['Address']."</td>";
													echo "<td>".$row['H_Name']."</td>";
													echo "<td>";
													?>
													<img src ="../profileimages/<?php echo $row['Profile_Image']?>"/>
													<?php
													echo "</td>";
													echo "<td>".$row['Description']."</td>";
													echo "<td>".$row['Rent']."</td>";
													echo "<td>".$row['Uploaded_Date']."</td>";
													echo "<td>".$row['Square_Foot']."</td>";
													echo "<td>".$row['No_of_Rooms']."</td>";
													echo "<td>".$row['Floor']."</td>";
													echo "<td><a href=\"deletehousebooking.php?id=$row[House_Id]\">
													<img src=\"delete.png\" height='10' width='20'/></a> &nbsp &nbsp;
													<a href=\"updatehouse.php?id=$row[House_Id]\">
													<img src=\"edit.png\" height='10' width='20'/></a>
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