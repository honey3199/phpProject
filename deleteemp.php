<?php

//including the datebase connection fie
require_once("config\connection.php");

//getting id of the data from url

if(isset($_GET['id']))
{
	$id = $_GET['id'];
	//deleting the row from table
	$sql = "DELETE FROM EMPLOYEE WHERE empid = $id";
	
	$result = mysqli_query($conn,$sql);
}
header("Location:myselectemp.php");
?>
