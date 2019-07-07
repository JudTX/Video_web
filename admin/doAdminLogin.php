<?php
  require_once('tpl/header.php');
?>

<?php 
	//获取数据
	$name = $_POST["adminname"];
	$password = $_POST["password"];
	//连接数据库
	// mysql_connect("localhost","root","root");
	// mysql_select_db("neuvideo");
	// mysql_set_charset("utf8");
	// require('../system/dbConn.php'); 在header中已经包含不必再次包含
	connect();
	//写sql语句查询管理员用户名，密码
	$sql = "select * from admins where adminname='$name' and password=md5('$password')";
	// echo $sql."<br>";
	$result = mysql_query($sql);//$result是结果集
	//登陆成功跳转欢迎页
	if (mysql_numrows($result)>0) {//记录条数，判断是否有查询结果
		//启动session
		session_start();
		//添加session值
		$_SESSION["adminname"] = $name;//在session中存储管理员名字
		$_SESSION["password"] = md5($password);//在session中储存密码
		echo "登陆成功！3秒后跳转到欢迎页。"."<br>";
		header("refresh:3;url='welcome.php'");
	}
	//登陆失败页面返回登录页
	else{
		echo "登陆失败！3秒后返回登录页。"."<br>";
		header("refresh:3;url='index.php");
	}
?>


<?php
  require_once('tpl/footer.php');
?>