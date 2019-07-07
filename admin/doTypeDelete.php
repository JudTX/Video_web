<?php
  require_once('tpl/header.php');
?>

   <?php 
		connect();

		$tid = $_GET['tid'];

		$sql = "select * from videos where tid=$tid";
		$result = mysql_query($sql);
		if (mysql_num_rows($result) == 0) {
			$sql = "delete from videotype where tid=$tid";
			if(mysql_query($sql)){
				echo "删除成功,2秒后跳转";
				header("refresh:2;url='typeList.php'");
			}else{
				echo "删除失败,2秒后跳转";
				header("refresh:2;url='typeList.php'");
			}
		}else{
			echo "该类型下有视频！请勿删除！";
			header("refresh:2;url='typeList.php'");
		}

		
	 ?>


<?php
  require_once('tpl/footer.php');
?>