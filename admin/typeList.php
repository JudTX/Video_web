<?php
  require_once('tpl/header.php');
?>

   <?php 
		connect();

		if (!isset($_GET['page'])) {
			$page = 1;//默认当前为第一页
		}else{
			$page = $_GET['page'];
		}

		$sql = "select * from videotype";
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
	 ?>
	<form>
		<table class="table table-border">
			<tr>
				<td>序号</td>
				<td>视频类别名称</td>
				<td>操作</td>
			</tr>
			<?php 
				while ($row = mysql_fetch_assoc($result1)) {
			 ?>
			 <tr>
			 	<td><?php echo $row['tid']; ?></td>
			 	<td><?php echo $row['typename'] ?></td>
			 	<td>
			 		<a href="./typeEdit.php?tid=<?php echo $row['tid'] ?>">修改</a>|
			 		<a href="./doTypeDelete.php?tid=<?php echo $row['tid'] ?>" onclick="return confirm('确认删除？')">删除</a>
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
	</form>


<?php
  require_once('tpl/footer.php');
?>