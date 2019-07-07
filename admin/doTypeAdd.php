<?php
  require_once('tpl/header.php');
?>

   <?php 
		connect();

		$typename = $_GET['type'];

		$sql = "select typename from videotype where typename='$typename'";
		$result = mysql_query($sql);
		$num = mysql_num_rows($result);

		if ($num > 0) {
			echo "该类型已存在！2秒后返回";
			header("refresh:2;url='typeAdd.php'");
		}else{

			$sqltype = "insert into videotype values(null,'$typename')";
			$resulttype = mysql_query($sqltype);

			if($resulttype == 1){//添加成功 返回值为整形1
				echo "添加成功!2秒后返回";
				header("refresh:2;url='typeAdd.php'");
			}else{//返回值为boole型 值为false
				echo "添加失败";
			}
		}
	 ?>


<?php
  require_once('tpl/footer.php');
?>