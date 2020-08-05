<?php

require_once("../config/connection.php");
if(isset($_GET['id']))
{
	$id=$_GET['id'];
	$sql="update user1 set IsActive = 0 where User_Id='".$id."'";
	$result=mysqli_query($conn,$sql);
}
header("Location:user.php");
?>