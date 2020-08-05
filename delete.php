<?php

require_once("connection.php");
if(isset($_GET['id']))
{
	$id=$_GET['id'];
	$sql="delete from role where Role_Id='".$id."'";
	$result=mysqli_query($conn,$sql);
}
header("Location:role.php");
?>