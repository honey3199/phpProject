<?php

require_once("../config/connection.php");
if(isset($_GET['id']))
{
	$id=$_GET['id'];
	$sql="update membership_package set IsActive = 0 where MPackage_Id='".$id."'";
	$result=mysqli_query($conn,$sql);
}
header("Location:membershippackage.php");
?>