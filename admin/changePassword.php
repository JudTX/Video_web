<?php
  require_once('tpl/header.php');
?>

   	<?php 
		require("../system/loginCheck.php");
	 ?>
	 <h2>修改管理员密码</h2>
	 <!-- <form action="doPassWordupdate.php" method="post">
	 	<table class="table table-striped">
	 		<tr>
	 			<td>原密码</td>
	 			<td><input type="password" name="oldpass"></td>
	 		</tr>
	 		<tr>
	 			<td>新密码</td>
	 			<td><input type="password" name="newpass"></td>
	 		</tr>
	 		<tr>
	 			<td>确认密码</td>
	 			<td><input type="password" name="password"></td>
	 		</tr>
	 		<tr>
	 			<td></td>
	 			<td>
	 				<input type="submit" value="更新">
	 				<input type="reset" value="取消">
	 			</td>
	 		</tr>
	 	</table>
	 </form> -->
		<form class="form-horizontal" action="doPassWordupdate.php" method="post">
            <div class="form-group">
              <label for="inputOld" class="col-sm-2 control-label">原密码</label>
              <div class="col-sm-5">
                <input type="text" class="form-control" id="inputOld" placeholder="原密码" name="oldpass">
              </div>
            </div>
            <div class="form-group">
              <label for="inputNew" class="col-sm-2 control-label">新密码</label>
              <div class="col-sm-5">
                <input type="text" id="inputNew" name="newpass" placeholder="新密码" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label for="inputpass" class="col-sm-2 control-label">确认密码</label>
              <div class="col-sm-5">
                <input type="text" class="form-control" id="inputpass" placeholder="确认密码" name="password">
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