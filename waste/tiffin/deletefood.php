<?php

require_once("../config/connection.php");
if(isset($_GET['id']))
{
	$id=$_GET['id'];
	$sql="update food set IsActive = 0 where Food_Id='".$id."'";
	$result=mysqli_query($conn,$sql);
}
header("Location:food.php");
?>