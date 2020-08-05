<?php
 require_once("../config/connection.php");
 Session_start();
 $uid = $_SESSION['U_Id'];
 if(isset($_GET['tid']))
 {
	$tid=$_GET['tid'];
	$sql1 = "update tiffin_service_booking set SB_Status='Unbooked' 
		where TSBook_Id='".$tid."'";
	$result1=mysqli_query($conn,$sql1);
	header("Location:tsbooking.php");
 }
?>