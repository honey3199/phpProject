<?php

require_once("../config/connection.php");
if(isset($_GET['id']))
{
	$id=$_GET['id'];
	$sql="delete from Tiffin_Service_Package where TSPackage_Id='".$id."'";
	$result=mysqli_query($conn,$sql);
}
header("Location:tspackage.php");
?>