<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>处理用户注册信息页</title>
</head>
<body>
	<h1>跳转成功</h1>
	<?php 
		//增insert 删delete 改update 查select
		// var_dump($_POST);
		// var_dump($_FILES);//文件上传的预定义数组
		$username = $_POST["username"];
		$password = $_POST["password"];
		$gender = $_POST["gender"];
		$email = $_POST["email"];
		$birthdate = $_POST["birthdate"];

		//php连接数据库
		// $con = mysql_connect("localhost","root","root");//连接成功返回true 失败false mysql_connect(数据库地址，用户名，用户密码)
		// if(!$con){
		// 	die("数据库连接失败".mysql_error());
		// }
		// $db = mysql_selectdb("neuvideo");//选择数据库
		// if (!$db) {
		// 	die("数据库选择失败".mysql_error());
		// }
		// mysql_set_charset("utf8");//设定字符集
		require('./system/dbConn.php');
		connect();

		//判定用户是否重名
		$sql0 = "select uname from users where uname='$username'";
		$result0 = mysql_query($sql0);//查询操作成功返回一个资源类型(结果集)
		$num = mysql_num_rows($result0);//统计结果集中记录的条数 返回值为整型
		if($num > 0){
			echo "用户名重名，3秒后返回注册页重新注册";
			//exit;
			//页面跳转回注册页
			header("refresh:3;url='userReg.html'");//header(跳转时间，跳到的位置)
		}else{//重名判定
			// $pic = $_POST["pic"];
			// echo "您的密码是:$username"."<br>";
			// //echo "您的姓名是:".$_POST["username"]."<br>";
			// echo "您的密码是:".$_POST["password"]."<br>";
			// //echo "您的性别是:".$_POST["gender"]."<br>";
			// if ($gender == 0) {
			// 	echo "您的性别是：男"."<br>";
			// }
			// else{
			// 	echo "您的性别是：女"."<br>";
			// }
			// echo "您的生日是:$birthdate"."<br>";
			// echo "您的电子邮件是:$email"."<br>";
			// // echo "您的头像是:$pic"."<br>";


			//文件上传失败判定
			if ($_FILES["pic"]["error"] > 0) {
				switch ($_FILES["pic"]["error"]) {
					case '1':
						echo "文件尺寸超过配置文件的最大值";
						break;
					case '3':
						echo "部分文件上传";
						break;
					case '4':
						echo "没有文件上传";
						break;
					default:
						echo "未知错误";
						break;
				}
				exit;
			}


			//文件上传
			$arr = explode(".",$_FILES["pic"]["name"]);//拆分字符串(以什么为断点，需要拆的数组)
			$suffix = $arr[count($arr)-1];//count 计数数组内元素个数
			//判定文件上传的类型
			$allowtype = array("jpg","jpeg","png","JPG","gif","Bmp","PNG");
			if (!in_array($suffix,$allowtype)) {//判定某个元素是否在一个数组里
				die("你输入的文件不是图片类型");
			}
			$randname = date("YmdHis").rand(100,999).".".$suffix;
			move_uploaded_file($_FILES["pic"]["tmp_name"],"./images/".$randname);//移动上传文件(从临时目录->需要放置的文件夹)


			$sql = "insert into users values(null,'$username',md5('$password'),$gender,'$birthdate','$randname','$email')";
			// echo $sql."<br>";
			//执行sql语句
			$result = mysql_query($sql);//记录mysql_query返回值
			if($result == 1){//添加成功 返回值为整形1
				echo "注册成功,2秒后跳转";
				header("refresh:2;url='index.php");
			}else{//返回值为boole型 值为false
				echo "注册失败";
			}
		}//end of 重名判断的else
	 ?>
</body>
</html>