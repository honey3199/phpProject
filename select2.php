<?php

require_once("connection.php");


?>

<html>
<head>
	<style>
		
	</style>
</head>
<body><br><br>
	<a href="insert.php">Add Record</a><br><br>
	<form action="" method="POST" >
	<table border="1">
	<tr>
		<th>USER_ID</th>
		<th>USER_NAME</th>
		<th>USER_ADDRESS</th>
		<th>AREA_NAME</th>
		<th>ACTION</th>
	</tr>
	
	<?php
	$sql="select u.User_Id,u.User_Name,u.User_Address,a. Area_Name from user u join area a where u.Area_Id=a.Area_Id";
    $result=mysqli_query($conn,$sql);
	

	while($row=mysqli_fetch_array($result))
	{
	echo "<tr>";
	echo "<td>". $row['User_Id'] ."</td>";
	echo "<td>". $row['User_Name'] ."</td>";
	echo "<td>". $row['User_Address'] ."</td>";
	echo "<td>". $row['Area_Name'] ."</td>";
	echo "<td><a href='delete.php?id=$row[User_Id]'><img src='delete.png' height='40' width='40'/></a>
	<a href='update.php?id=$row[User_Id]&area=$row[Area_Name]'><img src='update.png' height='40' width='40'/></a></td>";
	echo "</tr>";
	}
	
	?>
	
	
	</table>
	</form>
</body>
</html>