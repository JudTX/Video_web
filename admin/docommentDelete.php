<?php
  require_once('tpl/header.php');
?>

   <?php 
   		connect();

   		$cid = $_GET['cid'];
   		$sql = "select * from comments where cid=$cid";
   		$result = mysql_query($sql);
   		$num = mysql_num_rows($result);

   		if ($num == 1) {
   			$sqldel = "delete from comments where cid=$cid";
   			$resultdel = mysql_query($sqldel);
   			if ($resultdel == 1) {
   				echo "删除成功,2s后跳转";
   				header("refresh:3;url='commentList.php'");
   			}else{
   				echo "删除失败";
   			}
   		}
    ?>


<?php
  require_once('tpl/footer.php');
?>