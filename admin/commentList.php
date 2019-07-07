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

		$sql = "select * from comments";
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
				<td>视频名称</td>
				<td>评论内容</td>
				<td>留言日期</td>
				<td>留言人</td>
				<td>操作</td>
			</tr>
			<?php 
				while ($row = mysql_fetch_assoc($result1)) {
			 ?>
			 <tr>
			 	<td><?php echo $row['cid']; ?></td>
			 	<td><?php 
			 	 	$vname = $row['vid'];
			 	 	$sqlvname = "select videoname from videos where vid=$vname";
			 	 	$resultvname = mysql_query($sqlvname);
			 	 	$rowvname = mysql_fetch_assoc($resultvname);
			 	 	echo $rowvname['videoname'];
			 	?>
			 	</td>
			 	<td><?php echo $row['content']; ?></td>
			 	<td><?php echo $row['cdate']; ?></td>
			 	<td><?php 
			 		$uidname = $row['uid'];
			 		$sqlname = "select uname from users where uid=$uidname";
			 		$resultname = mysql_query($sqlname);
			 		$rowname = mysql_fetch_assoc($resultname);
			 		echo $rowname['uname'];
			 	 ?>	
			 	</td>
			 	<td>
			 		<a href="docommentDelete.php?cid=<?php echo $row['cid'] ?>" onclick="return confirm('确认删除？')">删除</a>
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