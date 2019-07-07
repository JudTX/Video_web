<?php 
	require("./system/dbConn.php");
	connect();

	session_start();

	$vid = $_POST['vid'];
	$comment = $_POST['comment'];
	$uid = $_SESSION['uid'];
	// var_dump($comment);

	$sql = "insert into comments values(null,'$comment',now(),$uid,$vid)";
	$result = mysql_query($sql);

	if ($result == 1) {
		echo "留言成功";
		header("refresh:2;url='show.php?vid=$vid'");
	}else{
		echo "留言失败";
	}

 ?>