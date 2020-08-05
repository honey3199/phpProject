<?php

require_once("../config/connection.php");
if(isset($_GET['id']))
{
	$id=$_GET['id'];
	$sql="update house_booking set IsActive = 0 where HBook_Id='".$id."'";
	$result=mysqli_query($conn,$sql);
}
header("Location:housebooking.php");
?>