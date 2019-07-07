<?php
  require_once('tpl/header.php');
?>

	<?php 
		connect();
		$sql = "select * from videotype";
		$result = mysql_query($sql);
	 ?>
   <form class="form-horizontal" action="doVideoAdd.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <label for="inputName" class="col-sm-2 control-label">视频名称</label>
              <div class="col-sm-5">
                <input type="text" class="form-control" id="inputName" placeholder="视频名称" name="videoname">
              </div>
            </div>
            <div class="form-group">
              <label for="inputPassword" class="col-sm-2 control-label">视频类型</label>
              <div class="col-sm-5">
                <select class="form-control" name="videotype">
                	<option placeholder>----请选择类型----</option>
                	<?php 
                		while ($row = mysql_fetch_assoc($result)) {
                	?>
						<option value="<?php echo $row['tid'] ?>"><?php echo $row['typename'] ?></option>
					<?php
                		}
                	 ?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label for="inputPic" class="col-sm-2 control-label">海报图片</label>
              <div class="col-sm-6">
                <input type="file" id="inputPic" name="pic">
              </div>
            </div>
            <div class="form-group">
              <label for="inputintro" class="col-sm-2 control-label">视频简介</label>
              <div class="col-sm-5">
                <textarea class="form-control" rows="3" name="intro" id="imputintro"></textarea>
              </div>
            </div>
            <div class="form-group">
              <label for="inputaddress" class="col-sm-2 control-label">下载地址</label>
              <div class="col-sm-5">
                <input type="text" class="form-control" id="inputAddress" name="address" placeholder="下载地址">
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-5">
                <button type="submit" class="btn btn-default">添加</button>
                <button type="reset" class="btn btn-default">取消</button>
              </div>
            </div>
          </form>


<?php
  require_once('tpl/footer.php');
?>