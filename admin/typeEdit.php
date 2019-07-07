<?php
  require_once('tpl/header.php');
?>

   <?php 
		connect();

		$tid = $_GET['tid'];

		$sql = "select * from videotype where tid=$tid";
		$result = mysql_query($sql);
		$row = mysql_fetch_assoc($result);

	 ?>
	<form action="doTypeUpdate.php">
		<input type="hidden" name="tid" value="<?php echo $tid; ?>"><!-- 隐藏提交 隐藏域 -->
		<table class="table table-border">
			<tr>
				<td>视频类型名称</td>
				<td><input type="text" name="typename" value="<?php echo $row['typename'] ?>"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="修改">
				</td>
			</tr>
		</table>
	</form>


<?php
  require_once('tpl/footer.php');
?>