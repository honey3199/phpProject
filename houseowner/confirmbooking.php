<?php
 require_once("../config/connection.php");
 Session_start();
 $uid = $_SESSION['U_Id'];
 if(isset($_GET['aid']) && isset($_GET['hid']) && isset($_GET['id']))
 {
    $aid=$_GET['aid'];
	$user=$_GET['id'];
	$hid=$_GET['hid'];
	$date=date('Y-m-d');
	$sql1 = "update appointment set Status='Booked' where App_Id='".$aid."'";
	$result1=mysqli_query($conn,$sql1);
	$sql2 = "update house set IsAvailable=0 where House_Id='".$hid."'";
	$result2=mysqli_query($conn,$sql2);
	$sql="insert into house_booking(User_Id,House_Id,HB_Date,HB_Status)values
	('".$user."','".$hid."','".$date."','Booked')";
	$result=mysqli_query($conn,$sql);
	header("Location:housebooking.php");
}?>