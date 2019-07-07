<?php
  require_once('tpl/header.php');
?>

   <?php 
   		connect();
		//接收uid参数
		$vid = $_GET["vid"];//接收超链接传递过来的参数时一定要用GET 且下标要与传递时给的参数相同
		//删除用户上传的图片
		$sqlpic = "select pic from videos where vid=$vid";
		$reslutpic = mysql_query($sqlpic);
		$row = mysql_fetch_assoc($reslutpic);
		$filename = "../posters/".$row["pic"];//要删除的文件名
		if (file_exists($filename)) {
			unlink($filename);
			// echo "图片删除成功!"."<br>";
		}else{
			echo "文件不存在！"."<br>";
		}
		
		//sql语句删除用户信息
		$sql = "delete from videos where vid=$vid";
		$result = mysql_query($sql);
		if ($result==1) {
			echo "删除成功,2秒后跳转。";
			header("refresh:2;url='videoList.php'");
		}else{
			echo "删除失败,三秒后跳转";
			header("refresh:3;url='videoList.php'");
		}
    ?>


<?php
  require_once('tpl/footer.php');
?>