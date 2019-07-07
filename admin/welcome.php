<?php
  require_once('tpl/header.php');
?>

	
	<h1>欢迎<?php
	
	require("../system/loginCheck.php");
	echo $_SESSION["adminname"];

	 ?>

	访问视频信息管理系统</h1>



<?php
  require_once('tpl/footer.php');
?>