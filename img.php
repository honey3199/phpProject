<?php
require_once("config/connection.php");

if(isset($_FILES['image'])){
	$file_name = $_FILES['image']['name'];
	$file_size = $_FILES['image']['size'];
	$file_tmp = $_FILES['image']['tmp_name'];
	$file_type = $_FILES['image']['type'];
	
$file_ext=explode('.',$_FILES['image']['name']);

if(move_uploaded_file($file_tmp,"imagess/".$file_name)==1)
{
	$query="INSERT INTO image(img_path) values
	('".$file_name."')";
	echo "Success";
	mysqli_query($conn,$query);
	
}
else{
	echo "errors";
}
}
?>
<html>
<body>
	<form action="" method="POST" enctype="multipart/form-data">
	<img id="output" height="100"/>
	<br>
	<input type="file" name="image" accept="image/*"
	onchange="loadFile(event)">
	<input type="submit"/>
<script>
	function loadFile(event){
		document.getElementById('output').src =
		URL.createObjectURL(event.target.files[0]);
	};
</script>
</form>
</body>
</html> 