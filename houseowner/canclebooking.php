<?php
 require_once("../config/connection.php");
 Session_start();
 $uid = $_SESSION['U_Id'];
 if(isset($_GET['aid']) && isset($_GET['hid']) && isset($_GET['id']))
 {
	$user = $_GET['id'];
    $aid=$_GET['aid'];
	$hid=$_GET['hid'];
	$sql1 = "update appointment set Status='Unbooked' where App_Id='".$aid."'";
	$result1=mysqli_query($conn,$sql1);
	$sql1 = "update house_booking set HB_Status='Unbooked' where House_Id='".$hid."' and User_Id='".$user."'";
	$result1=mysqli_query($conn,$sql1);
	$sql = "update house set IsAvailable=1 where House_Id='".$hid."'";
	$result=mysqli_query($conn,$sql);
	header("Location:housebooking.php");
 }
?>