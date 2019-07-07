<?php
  require_once('tpl/header.php');
?>

   <?php 
		//连接数据库
		// mysql_connect("localhost","root","root");
		// mysql_select_db("neuvideo");
		// mysql_set_charset("utf8");
		// require('../system/dbConn.php');
		connect();
		//接收uid参数
		$uid = $_GET["uid"];//接收超链接传递过来的参数时一定要用GET 且下标要与传递时给的参数相同
		//删除用户上传的图片
		$sqlpic = "select pic from users where uid=$uid";
		$reslutpic = mysql_query($sqlpic);
		$row = mysql_fetch_assoc($reslutpic);
		$filename = "../images/".$row["pic"];//要删除的文件名
		if (file_exists($filename)) {
			unlink($filename);
		}else{
			echo "文件不存在！";
		}
		
		//sql语句删除用户信息
		$sql = "delete from users where uid=$uid";
		$result = mysql_query($sql);
		if ($result==1) {
			echo "删除成功,三秒后跳转。";
			header("refresh:3;url='userList.php'");
		}else{
			echo "删除失败,三秒后跳转";
			header("refresh:3;url='userList.php'");
		}
	 ?>


<?php
  require_once('tpl/footer.php');
?>