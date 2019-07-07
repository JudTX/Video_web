<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>用户登陆页</title>
</head>
<body>
	<?php 
		//获取数据
		$username = $_POST["username"];
		$password = $_POST["password"];
		//连接数据库
		// mysql_connect("localhost","root","root");
		// mysql_select_db("neuvideo");
		// mysql_set_charset("utf8");
		require('./system/dbConn.php');
		connect();
		//写sql语句查询管理员用户名，密码
		$sql = "select * from users where uname='$username' and password=md5('$password')";
		// echo $sql."<br>";
		$result = mysql_query($sql);//$result是结果集
		$row = mysql_fetch_assoc($result);
		//登陆成功跳转欢迎页
		if (mysql_numrows($result)>0) {//记录条数，判断是否有查询结果
			//启动session
			session_start();
			//添加session值
			$_SESSION["username"] = $username;//在session中存储用户名字
			$_SESSION["uid"] = $row['uid'];
			echo "登陆成功！3秒后跳转到首页。"."<br>";
			header("refresh:3;url='index.php'");
		}
		//登陆失败页面返回登录页
		else{
			echo "登陆失败！3秒后返回登录页。"."<br>";
			header("refresh:3;url='index.php");
		}
	 ?>
</body>
</html>