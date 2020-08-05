<?php
	require_once("config\connection.php");
	$sql = "select * from area";
	$result = mysqli_query($conn,$sql);
?>
<html>
<body>
<form action="" method="POST" name="user">
<table>
<tr>
	<td> User Name :- </td>
	<td> <input type="text" name="txtname"/> </td>
</tr>
<tr>
	<td> Contact_No :- </td>
	<td> <input type="text" name="txtcontact"/> </td>
</tr>
<tr>
	<td> Area Name:- </td>
	<td>
	<select name="droparea">
	<?php
		while($row=mysqli_fetch_array($result))
		{
	?>
		<option value="<?php echo $row["Area_Code"];?>">
				<?php echo $row["Area_Name"];?>
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
			$fname=$_POST["txtname"];
			$area=$_POST["droparea"];
			$contact=$_POST["txtcontact"];
			
			if($fname!='' && $contact!='')
			{
				$sql="insert into user1(user_name,contact_no,Area_code)
				values('".$fname."','".$contact."','".$area."')";
				
				$result=mysqli_query($conn,$sql);
				
				if($result)
				{
					header("Location:myselect.php");
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