<?php
 require_once("../config/connection.php");
 if(isset($_GET['id']))
 {
    $id=$_GET['id'];
	$sql="update complaint set Com_Status='Solved' where Com_Id='".$id."'";
	$result=mysqli_query($conn,$sql);
	header("Location:complaint.php");
	}?>