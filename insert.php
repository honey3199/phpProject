<?php

require_once("connection.php");
$sql="select * from area";
$result=mysqli_query($conn,$sql);
?>
<head>
	<style>
		input,select
		{
			height:100%;
			width:100%;
			font-size:20px;
		}
		th
		{
			font-size:30px;
		}
		td
		{
			font-size:20px;
		}
	</style>
</head>
<body>
	<table border="3" height=400 width=600 cellspacing=0>
	<form method="POST" action="">
		<tr>
			<th>Field</th>
			<th>Value</th>
		</tr>
		<tr>
			<td>User_Id</td>
			<td><input type="text" name="id"></td>
		</tr>
		<tr>
			<td>User_Name</td>
			<td><input type="text" name="name"></td>
		</tr>
		<tr>
			<td>User_Address</td>
			<td><input type="text" name="address"></td>
		</tr>
		<tr>
			<td>Area_Id</td>
			<td><select name="a_id">
				<?php
				while($row=mysqli_fetch_array($result))
				{
				?>
				<option value="<?php echo $row['Area_Id'];?>"><?php echo $row['Area_Name'];?></option>
				<?php
				}
				?>
			</select></td>
		</tr>
		<tr>
			<td colspan="2"><input type="submit" value="Insert"></td>
		</tr>
	</form>
	</table>
</body>
</html>

<?php
if($_SERVER["REQUEST_METHOD"]=="POST")
{

if(isset($_POST['id']) && isset($_POST['name']) && isset($_POST['address']) && isset($_POST['a_id']))
{
	        $uid=$_POST["id"];
			$uname=$_POST["name"];
			$uaddress=$_POST["address"];
			$area=$_POST["a_id"];
			
			if($uname!='' && $uaddress!='' && $area!='')
			{
				$sql="insert into user(User_Id,User_Name,User_Address,Area_Id) values ('".$uid."','".$uname."','".$uaddress."','".$area."')";
				$result=mysqli_query($conn,$sql);
			if($result)
			{
				header("Location:select2.php");
			}
			}
			
			
}
}
?>