<?php

require_once("../config/connection.php");
if(isset($_GET['id']))
{
	$id=$_GET['id'];
	$sql="update feedback set IsActive = 0 where Feed_Id='".$id."'";
	$result=mysqli_query($conn,$sql);
}
header("Location:feedback.php");
?>