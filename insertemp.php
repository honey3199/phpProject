<?php
	require_once("config\connection.php");
	$sql = "select * from department";
	$result = mysqli_query($conn,$sql);
?>
<html>
<body>
<form action="" method="POST" name="emp">
<table>
<tr>
	<td> Employee Id :- </td>
	<td> <input type="text" name="txtid"/> </td>
</tr>
<tr>
	<td> Employee Name:- </td>
	<td> <input type="text" name="txtname"/> </td>
</tr>
<tr>
	<td> Salary:- </td>
	<td> <input type="text" name="txtsalary"/> </td>
</tr>
<tr>
	<td> dob:- </td>
	<td> <input type="text" name="txtdob"/> </td>
</tr>
<tr>
	<td>department</td>
	<td>
	<select name="dropemp">
	<?php
		while($row=mysqli_fetch_array($result))
		{
	?>
		<option value="<?php echo $row["empid"];?>">
				<?php echo $row["empname"];?>
		</option>
	<?php
		}
	?>
	</select>
	</td>
</tr>
<tr>
	<td colspan="2"> <input type="submit" value="INSERT" name="submit"/> </td>
</table>
</form>
<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
		if(isset($_POST["txtname"]) && isset($_POST["txtcontact"])) 
		{
			$fid=$_POST["txtid"];
			$fname=$_POST["txtname"];
			$fsalary=$_POST["txtsalary"];
			$fdob=$_POST["txtdob"];
			$dep=$_POST["dropemp"];
			
			if($fname!='' && $fsalary!='')
			{
				$sql="insert into user1(empid,empname,empsalary,empdob,empdept)
				values('".$fid."','".$fname."','".$fsalary."','".$fdob."','".$dep."')";
				
				$result=mysqli_query($conn,$sql);
				
				if($result)
				{
					header("Location:myselectemp.php");
				}
			}
		}
		else
		{
			echo "value not set";
		}
	}
?>
</body>
</html>