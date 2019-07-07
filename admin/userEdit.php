<?php
  require_once('tpl/header.php');
?>

   <?php 
			// mysql_connect("localhost","root","root");
			// mysql_select_db("neuvideo");
			// mysql_set_charset("utf8");
			// require('../system/dbConn.php');
			connect();

			//接收UID参数
			$uid = $_GET['uid'];

			$sql = "select * from users where uid=$uid";
			$result = mysql_query($sql);//一条记录的结果集
			$row = mysql_fetch_assoc($result);//$row类型为关联数组

			// var_dump($row);
		 ?>
		 <h3>请修改用户信息</h3>
	<form action="doUserUpdate.php" method="post" enctype="multipart/form-data"><!-- 有文件上传一定用post方法,且应该加enctype值 -->
		<input type="hidden" name="uid" value="<?php echo $uid; ?>"><!-- 隐藏提交 隐藏域 -->
		<table border="1" align="center" class="table table-border">
			<tr>
				<td>用户名</td>
				<td><input type="text" name="username" value="<?php echo $row['uname']; ?>" readonly></td>
			</tr>
			<tr>
				<td>性别</td>
				<td>
						<input type="radio" name="gender" value="0"<?php if ($row['gender']==0) {
							echo "checked";
						} ?>>男
						<input type="radio" name="gender" value="1" <?php if ($row['gender']==1) {
							echo "checked";
						} ?>>女
				</td>
			</tr>
			<tr>
				<td>生日</td>
				<td><input type="date" name="birthdate"
					value="<?php echo $row['birthdate']; ?>"></td>
			</tr>
			<tr>
				<td>头像</td>
				<td>
					<input type="file" name="pic">
					原头像:<img src="../images/<?php echo $row['pic']; ?>" width="80" height="80" class="img-circle">
				</td>
			</tr>
			<tr>
				<td>邮箱</td>
				<td><input type="email" name="email"
					value="<?php echo $row['email']; ?>"></td>
			</tr>
			<tr>
				<td colspan="2">
					<input type="submit" value="更新">
				</td>
			</tr>
		</table>
	</form>


<?php
  require_once('tpl/footer.php');
?>