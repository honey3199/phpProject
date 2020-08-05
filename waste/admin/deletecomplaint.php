<?php

require_once("../config/connection.php");
if(isset($_GET['id']))
{
	$id=$_GET['id'];
	$sql="delete from complaint where Com_Id='".$id."'";
	$result=mysqli_query($conn,$sql);
}
header("Location:Complaint.php");
?>