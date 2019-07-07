<?php 
	//管理员注销
	session_start();
	session_destroy();//清空session
	header("location:index.php");
 ?>