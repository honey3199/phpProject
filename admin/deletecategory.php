<?php

require_once("../config/connection.php");
if(isset($_GET['id']))
{
	$id=$_GET['id'];
	$sql="update category set IsActive = 0 where Cat_Id='".$id."'";
	$result=mysqli_query($conn,$sql);
}
header("Location:category.php");
?>