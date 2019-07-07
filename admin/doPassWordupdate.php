<?php
  require_once('tpl/header.php');
?>

   <?php 
		// require("../system/dbConn.php");
		connect();
		require("../system/loginCheck.php");

		$old = md5($_POST["oldpass"]);
		$new = md5($_POST["newpass"]);
		$password = md5($_POST["password"]);
		$adminname = $_SESSION['adminname'];

		// var_dump($_POST);
		// var_dump($old);

		if (strcmp($old,$_SESSION["password"]) == 0) {
			if (strcmp($new,$password) == 0) {
				$sql = "update admins set password='$new' where adminname='$adminname'";
				if ($result = mysql_query($sql)) {
					session_destroy();
					echo "密码修改成功！2秒后跳转到管理员登陆";
					header("refresh:2;url='./index.php'");
				}else{
					echo "修改失败,2秒后跳转";
					header("refresh:2;url='./passwordupdate.php'");
				}

			}else{
				echo "两次输入新密码不同,请重新输入,两秒后跳转！";
				header("refresh:2;url='./passwordupdate.php'");
			}
		}else{
			echo "输入密码不正确！2秒后跳回";
			header("refresh:2;url='./passwordupdate.php'");
		}

	 ?>


<?php
  require_once('tpl/footer.php');
?>