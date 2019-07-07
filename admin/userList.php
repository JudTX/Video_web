<?php
  require_once('tpl/header.php');
?>

   <?php 
		// session_start(); 
		// if (!isset($_SESSION["adminname"])) {
		// 	header("Location:index.php?msg=请先登录在进行访问");
		// }
		require("../system/loginCheck.php");
	?>
	<h1 align="center">欢迎 <?php echo $_SESSION["adminname"]; ?>访问用户信息列表页</h1>
	<?php //连接数据库，获取数据
		// mysql_connect("localhost","root","root");
		// mysql_select_db("neuvideo");
		// mysql_set_charset("utf8");
		// require('../system/dbConn.php');
		connect(); 

		if (!isset($_GET['page'])) {
			$page = 1;//默认当前为第一页
		}else{
			$page = $_GET['page'];
		}

		$sql = "select * from users";

		if (isset($_GET["key"])) {//如果$_get[key]存在
			$key = trim($_GET["key"]);//trim去空格
			$sql = "select * from users where uname like '%{$key}%'";
		}

		$result = mysql_query($sql);
		$totalrows = mysql_num_rows($result);
		$rowsperpage = 5;
		if ($totalrows%$rowsperpage == 0) {
			$totalpages = $totalrows/$rowsperpage;
		}else{
			$totalpages = ceil($totalrows/$rowsperpage);//向上取整
		}
		$start = ($page-1)*$rowsperpage;
		$sql1 = $sql." limit $start,$rowsperpage";
		$result1 = mysql_query($sql1);
		if ($totalrows == 0) {
			echo "没有查询结果！";
			// header("refresh:3;url='userList.php'");
			// die("没有查询结果！");
		}
		else{
		//取结果集中的记录
		// $row = mysql_fetch_assoc($result);
	?>
	<!-- 搜索功能 -->
	<form action="">
		请输入用户信息:<input type="text" name="key">
		<input type="submit" value="搜索">
	</form>
	<table border="1" align="center" class="table table-hover">
		<caption>注册用户信息列表(共<?php echo $totalrows ?>名用户)</caption>
		<tr>
			<td>用户编号</td>
			<td>用户名</td>
			<td>性别</td>
			<td>生日</td>
			<td>头像</td>
			<td>邮箱</td>
			<td>操作</td>
		</tr>
		<?php 
			while ($row = mysql_fetch_assoc($result1)) {
		?>
		<tr>
			<td><?php echo $row["uid"];?></td>
			<td><?php echo $row["uname"]; ?></td>
			<td><?php 
				if ($row["gender"] == 0) {
					echo "男";
				}
				else{
					echo "女";
				}
			 ?></td>
			<td><?php echo $row["birthdate"]; ?></td>
			<td><img src="../images/<?php echo $row["pic"]; ?>" width="80" height="80" title="我是头像" class="img-circle"></td>
			<td><?php echo $row["email"]; ?></td>
			<td>
				<a href="userEdit.php?uid=<?php echo $row['uid'] ?>">修改</a> | 
				<a href="doUserDelete.php?uid=<?php echo $row["uid"]?>" onclick="return confirm('确定删除？')">删除</a> |<!-- 传参时前面为文件名 ？分隔 传输的参数 -->
				<a href="doUserpass.php?uid=<?php echo $row["uid"]?>" onclick="return confirm('确认重置？')">初始化密码</a>
			</td>
		</tr>
		<?php
			}
		 ?>
	</table>
	<h3 align="center">
		<?php 
			echo "共有".$totalrows."条记录,共分了".$totalpages."页"."&nbsp;";
			for ($i=1; $i <= $totalpages; $i++) { 
				echo "<a href=?page=$i>第{$i}页</a>"."&nbsp;";
			}
		 ?>
	</h3>
<?php } ?>


<?php
  require_once('tpl/footer.php');
?>