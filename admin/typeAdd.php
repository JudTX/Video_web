<?php
  require_once('tpl/header.php');
?>

   <h3>请填写视频类别信息</h3>
	<form action="doTypeAdd.php" >
		<table>
			<tr>
				<td>视频类型名称</td>
				<td><input type="text" name="type"></td>
			</tr>
			<tr>
				<td></td>
				<td>
					<input type="submit" value="添加">
					<input type="button" value="返回" onclick=javascrapt:jump()>
				</td>
			</tr>
		</table>
	</form>
	<script type="text/javascript">
		function jump(){
			window.location.href="welcome.php";
		}
	</script>


<?php
  require_once('tpl/footer.php');
?>