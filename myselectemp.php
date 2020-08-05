<?php
	require_once("config\connection.php");
	$sql = "SELECT * FROM `employee` e JOIN area d WHERE e.empid = d.empid";
	$result = mysqli_query($conn,$sql);
?>
<html>
<body>
<br/><br/><a href="insertemp.php" > Add Record </a> <br/> <br/>
	<table border="1">
		<tr>
			<th> Employee Id </th>
			<th> Employee Name</th>
			<th> Employee Salary </th>
			<th> Employee DOB</th>
			<th> Department</th>
			<th> Action </th>
		</tr>
		<?php
			while($row=mysqli_fetch_array($result))
			{
				echo "<tr>";
				echo "<td>" . $row["empid"] . "</td>";
				echo "<td>" . $row["empname"] . "</td>";
				echo "<td>" . $row["salary"] . "</td>";
				echo "<td>" . $row["dob"] . "</td>";
				echo "<td><a href=\"deleteemp.php?id=$row[empid]\"><img src=\"delete.jpg\" height='30'></a><a href=\"updateemp.php?id=$row[empid]&department=$row[deptname]\"><img src=\"edit.jpg\" height='30'></a></td>";
				echo "</tr>";
			}
		?>	
	</table>
</body>
</html>