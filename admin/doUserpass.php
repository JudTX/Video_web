<?php
  require_once('tpl/header.php');
?>

   <?php 
		// require("../system/dbConn.php");
		connect();

		$uid = $_GET["uid"];
		$password = md5(123);

		$sql = "update users set password='$password' where uid=$uid ";
		if ($result = mysql_query($sql)) {
			echo "修改成功，2秒后跳转";
			header("refresh:2;url='userList.php'");
		}else{
			echo "修改失败";
		}
	 ?>


<?php
  require_once('tpl/footer.php');
?>