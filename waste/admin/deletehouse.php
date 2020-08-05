<?php

require_once("../config/connection.php");
if(isset($_GET['id']))
{
	$id=$_GET['id'];
	$sql="update house set IsActive = 0 where House_Id='".$id."'";
	$result=mysqli_query($conn,$sql);
}
header("Location:house.php");
?>