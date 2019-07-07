<?php
  require_once('tpl/header.php');
?>

   <?php 
   		//连接数据库
   		connect();
   		//如果传来新图片，删除旧图片，上传新图片
   		$vid = $_POST['vid'];
   		$videoname = $_POST['videoname'];
   		$videotype = $_POST['videotype'];
   		$intro = $_POST['intro'];
   		$address = $_POST['address'];
   		$pic = $_FILES['pic'];

		//文件上传
		if ($_FILES["pic"]["error"] > 0) {
			switch ($_FILES["pic"]["error"]) {
				case '1':
					echo "文件尺寸超过配置文件的最大值";
					break;
				case '3':
					echo "部分文件上传";
					break;
				case '4':
					echo "没有新海报上传"."<br>";
					$sql = "update videos set videoname='$videoname',tid=$videotype,intro='$intro',address='$address' where vid=$vid";
					break;
				default:
					echo "未知错误";
					break;
			}
		}else{//如果用户选择了新头像则进行文件上传
			//删除旧头像
			$sqlpic = "select pic from videos where vid=$vid";
			$reslutpic = mysql_query($sqlpic);
			$row = mysql_fetch_assoc($reslutpic);
			$filename = "../posters/".$row["pic"];//要删除的文件名
			if (file_exists($filename)) {
				unlink($filename);
			}else{
				echo "文件不存在！";
			}
			$arr = explode(".",$_FILES["pic"]["name"]);//拆分字符串(以什么为断点，需要拆的数组)
			$suffix = $arr[count($arr)-1];//count 计数数组内元素个数
			//判定文件上传的类型
			$allowtype = array("jpg","jpeg","png","JPG","gif","Bmp","PNG");
			if (!in_array($suffix,$allowtype)) {//判定某个元素是否在一个数组里
				die("你输入的文件不是图片类型");
			}
			$randname = date("YmdHis").rand(100,999).".".$suffix;
			if(move_uploaded_file($_FILES["pic"]["tmp_name"],"../posters/".$randname)){
				echo "图片上传成功"."<br>";
			}//移动上传文件(从临时目录->需要放置的文件夹)
			$sql = "update videos set videoname='$videoname',tid=$videotype,intro='$intro',address='$address',pic='$randname' where vid=$vid";
		}//end of else
	//更改用户信息，根据uid更新
		$result = mysql_query($sql);//返回值为整形，值为成功修改的条数
		if ($result == 1) {
			echo "更新成功2秒后跳转";
			//更新成功，跳转到userEdit.html
			header("refresh:2;url='videoList.php'");
		}else{
			echo "更新失败！";
		}
   ?>


<?php
  require_once('tpl/footer.php');
?>