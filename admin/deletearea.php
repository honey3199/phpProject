<?php

require_once("../config/connection.php");
if(isset($_GET['id']))
{
	$id=$_GET['id'];
	$sql="update area set IsActive = 0 where A_Code='".$id."'";
	$result=mysqli_query($conn,$sql);
}
header("Location:area.php");
?>