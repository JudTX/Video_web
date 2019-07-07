<?php
  require_once('tpl/header.php');
?>

   <?php 
		
		connect();

		$tid = $_GET['tid'];
		$typename = $_GET['typename'];

		$sql = "select typename from videotype where typename='$typename'";
		$result = mysql_query($sql);
		$row = mysql_num_rows($result);

		if ($row > 0) {
			echo "修改类型已存在，请重新修改,2秒后跳回";
			header("refresh:2;url='typeList.php'");
		}else{

			$sqlupdate = "update videotype set typename='$typename' where tid=$tid";
			$resultupdate = mysql_query($sqlupdate);

			if ($resultupdate == 1) {
				echo "修改成功,2秒后返回！";
				header("refresh:2;url='typeList.php'");
			}else{
				echo "修改失败";
			}
		}
	?>


<?php
  require_once('tpl/footer.php');
?>