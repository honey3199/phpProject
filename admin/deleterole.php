<?php

require_once("../config/connection.php");
if(isset($_GET['id']))
{
	$id=$_GET['id'];
	$sql="update role set IsActive = 0 where Role_Id='".$id."'";
	$result=mysqli_query($conn,$sql);
}
header("Location:role.php");
?>