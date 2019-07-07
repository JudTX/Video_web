<?php
  require_once('tpl/header.php');
  require_once('../system/loginCheck.php');
?>

   <?php 
   		connect();
   		//接收表单数据
   		$videoname = $_POST['videoname'];
   		$videotype = $_POST['videotype'];
   		$intro = $_POST['intro'];
   		$address = $_POST['address'];
   		$adminname = $_SESSION['adminname'];//取管理员名

   		$sqladmin = "select adminid from admins where adminname='$adminname'";
   		$resultadmin = mysql_query($sqladmin);
   		$rowadmin = mysql_fetch_assoc($resultadmin);
   		$uploadadmin = $rowadmin['adminid'];
   		//上传海报图片
   		if ($_FILES["pic"]["error"] > 0) {
				switch ($_FILES["pic"]["error"]) {
					case '1':
						echo "文件尺寸超过配置文件的最大值";
						break;
					case '3':
						echo "部分文件上传";
						break;
					case '4':
						echo "没有文件上传";
						break;
					default:
						echo "未知错误";
						break;
				}
				exit;
			}


			//文件上传
			$arr = explode(".",$_FILES["pic"]["name"]);//拆分字符串(以什么为断点，需要拆的数组)
			$suffix = $arr[count($arr)-1];//count 计数数组内元素个数
			//判定文件上传的类型
			$allowtype = array("jpg","jpeg","png","JPG","gif","Bmp","PNG");
			if (!in_array($suffix,$allowtype)) {//判定某个元素是否在一个数组里
				die("你输入的文件不是图片类型");
			}
			$randname = date("YmdHis").rand(100,999).".".$suffix;
			move_uploaded_file($_FILES["pic"]["tmp_name"],"../posters/".$randname);//移动上传文件(从临时目录->需要放置的文件夹)
   		//写sql语句

			$sql = "insert into videos values(null,'$videoname',$videotype,'$randname','$intro',now(),$uploadadmin,0,0,'$address')";
			if (mysql_query($sql)) {
				echo "2s回到添加页";
				header("refresh:2;url='videoAdd.php");
			}else{
				echo "添加失败！";
				// header("refresh:2;url='videoAdd.php");
			}


    ?>


<?php
  require_once('tpl/footer.php');
?>