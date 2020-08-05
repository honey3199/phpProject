<?php
 require_once("../config/connection.php");
 if(isset($_GET['id']))
 {
    $id=$_GET['id'];
	$sql="update appointment set Status='Disapproved' where App_Id='".$id."'";
	$result=mysqli_query($conn,$sql);
	header("Location:appointment.php");
}?>