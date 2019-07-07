<?php
  require_once('tpl/header.php');
?>

	<?php 
		connect();
		$vid = $_GET['vid'];
		$sql = "select * from videotype";
		$result = mysql_query($sql);
		$sqlvideo = "select * from videos where vid=$vid";
		$resultvideo = mysql_query($sqlvideo);//结果集中只有一条记录
		$rowvideo = mysql_fetch_assoc($resultvideo);
		// var_dump($rowvideo);
		// exit;
	?>
   <form class="form-horizontal" action="doVideoUpdate.php" method="post" enctype="multipart/form-data">
   			<input type="hidden" value="<?php echo $vid; ?>" name="vid">
            <div class="form-group">
              <label for="inputName" class="col-sm-2 control-label">视频名称</label>
              <div class="col-sm-5">
                <input type="text" class="form-control" id="inputName" value="<?php echo $rowvideo['videoname']; ?>" name="videoname">
              </div>
            </div>
            <div class="form-group">
              <label for="inputPassword" class="col-sm-2 control-label">视频类型</label>
              <div class="col-sm-5">
                <select class="form-control" name="videotype">
                	<?php 
                		while ($row = mysql_fetch_assoc($result)) {
                			if ($row['tid'] == $rowvideo['tid']) {
                	?>
                				<option value="<?php echo $row['tid'] ?>" selected><?php echo $row['typename'] ?></option>
                	<?php 
                			}else{
                	?>
						<option value="<?php echo $row['tid'] ?>"><?php echo $row['typename'] ?></option>
					<?php
							}
                		}
                	 ?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label for="inputPic" class="col-sm-2 control-label">海报图片</label>
              <div class="col-sm-6">
                <input type="file" id="inputPic" name="pic">
                原海报：
                <img src="../posters/<?php echo $rowvideo['pic']; ?>" class="img-circle" width="80" height="100">
              </div>
            </div>
            <div class="form-group">
              <label for="inputintro" class="col-sm-2 control-label">视频简介</label>
              <div class="col-sm-5">
                <textarea class="form-control" rows="3" name="intro" id="imputintro"><?php echo $rowvideo['intro']; ?></textarea>
              </div>
            </div>
            <div class="form-group">
              <label for="inputaddress" class="col-sm-2 control-label">下载地址</label>
              <div class="col-sm-5">
                <input type="text" class="form-control" id="inputAddress" name="address" value="<?php echo $rowvideo['address']; ?>">
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-5">
                <button type="submit" class="btn btn-default">修改</button>
              </div>
            </div>
          </form>


<?php
  require_once('tpl/footer.php');
?>