<!-- loginCheck.php -->
<?php
session_start();
if(!isset($_SESSION["adminname"]))
	header("location:index.php?msg=您没有权限!");
?>

