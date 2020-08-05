<?php
 require_once("../config/connection.php");
 if(isset($_GET['id']))
 {
    $id=$_GET['id'];
	$sql="update tiffin_service_booking set SB_Status='Unbooked' where TSBook_Id='".$id."'";
	$result=mysqli_query($conn,$sql);
	header("Location:tsbooking.php");
 }
?>