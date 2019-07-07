<?php
  require_once('tpl/header.php');
?>

   <?php 
   		//连接数据库，从数据库获取信息
   		connect();

   		if (!isset($_GET['page'])) {
			$page = 1;//默认当前为第一页
		}else{
			$page = $_GET['page'];
		}

   		$sql = "select * from videos join videotype on videos.tid=videotype.tid";
   		$result = mysql_query($sql);
   		//
   		$num = mysql_num_rows($result);

   		if (isset($_GET["key"])) {//如果$_get[key]存在
			$key = trim($_GET["key"]);//trim去空格
			$sql = "select * from videos join videotype on videos.tid=videotype.tid where videoname like '%{$key}%'";
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
		if ($totalpages == 0) {
			echo "没有查询结果！";
			// header("refresh:3;url='userList.php'");
			// die("没有查询结果！");
		}
		else{
    ?>
    <form action="" class="form-inline">
		<p class="form-control-static">请输入视频信息:</p>
		<input type="text" name="key" class="form-control">
		<input type="submit" value="搜索" class="btn btn-default">
	</form>
	<table class="table table-hover">
		<caption>当前共有<?php echo $num; ?>个视频</caption>
		<tr>
			<th>序号</th>
			<th>视频名称</th>
			<th>视频类型</th>
			<th>海报图片</th>
			<th>添加时间</th>
			<th>操作</th>
		</tr>
		<?php 
			while($row = mysql_fetch_assoc($result1)){
			?>
			<tr>
				<td><?php echo $row['vid']; ?></td>
				<td><?php echo $row['videoname']; ?></td>
				<td><?php echo $row['typename']; ?></td>
				<td><img src="../posters/<?php echo $row['pic']; ?>" width="80" height="100" title="<?php echo $row['intro']; ?>"></td>
				<td><?php echo $row['uploaddate'] ?></td>
				<td>
					<a href="./videoEdit.php?vid=<?php echo $row['vid']; ?>">修改 |</a>
					<a href="./doVideoDelete.php?vid=<?php echo $row['vid']; ?>" onclick="return confirm('确定删除？')"> 删除</a>
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