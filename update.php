<?php
if(isset($_GET['id']))
{
require_once("connection.php");
$sql="select * from area";
$result=mysqli_query($conn,$sql);

if(isset($_GET['id']) && isset($_GET['area']))
{
	$id=$_GET['id'];
	$a=$_GET['area'];
	$s="select * from user where User_Id='".$id."'";
	$r=mysqli_query($conn,$s);
	$row=mysqli_fetch_array($r);
}
}
?>
<html>
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
			<td><input type="text" value="<?php echo $id;?>"></td>
		</tr>
		<tr>
			<td>User_Name</td>
			<td><input type="text" name="name" value="<?php echo $row['User_Name'];?>"></td>
		</tr>
		<tr>
			<td>User_Address</td>
			<td><input type="text" name="address" value="<?php echo $row['User_Address'];?>"></td>
		</tr>
		<tr>
			<td>Area_Id</td>
			<td><select name="a_id">
				<?php
				
				while($row=mysqli_fetch_array($result))
				{
				?>
				<option value='<?php echo $row['Area_Id'];?>' <?php if($a==$row['Area_Name']) echo "selected";?>>
				<?php echo $row['Area_Name'];?>
				</option>
				<?php
				}
				?>
			</select></td>
		</tr>
		<tr>
			<td colspan="2"><input type="submit" value="Update"></td>
		</tr>
	</form>
	</table>
</body>
</html>
<?php
if($_SERVER["REQUEST_METHOD"]=="POST")
{
		if(isset($_POST['name']) && isset($_POST['address']))
		{
			$uname=$_POST["name"];
			$uaddress=$_POST["address"];
			$area=$_POST["a_id"];
			
				$sql="update user set User_Id='".$_GET['id']."',User_Name='".$uname."',User_Address='".$uaddress."',Area_Id='".$area."' where User_Id='".$_GET['id']."'";
				$result=mysqli_query($conn,$sql);
	
			
			if($result)
			{
				header("Location:select2.php");
			}
		}

		
	
}
?>