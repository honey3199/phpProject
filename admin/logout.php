<?php
session_start();
unset($_SESSION['U_name']);
session_destroy();

header("location:login.php");
exit;
?>