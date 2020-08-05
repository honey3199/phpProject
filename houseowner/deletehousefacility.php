<?php

require_once("../config/connection.php");
if(isset($_GET['id']))
{
	$id=$_GET['id'];
	$sql="update house_facility set IsActive = 0 where House_Facility_Id='".$id."'";
	$result=mysqli_query($conn,$sql);
}
header("Location:housefacility.php");
?>