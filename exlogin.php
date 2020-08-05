<?php
	session_start();
?>
<html>
<a href="logout.php">logout</a>
<nav>
<?php
	if(!isset($_SESSION['username']))
	{
		echo"<a href='p1.html'>first</a>";
	}
?>
	<a href="p2.html">second</a>
</nav>
</html>
	