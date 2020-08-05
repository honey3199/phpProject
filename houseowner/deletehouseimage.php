<?php

require_once("../config/connection.php");
if(isset($_GET['id']))
{
	$id=$_GET['id'];
	$sql="update house_image set IsActive = 0 where Img_Id='".$id."'";
	$result=mysqli_query($conn,$sql);
}
header("Location:houseimage.php");
?>