<?php
require_once('tpl/head.php');
include_once('./system/dbConn.php');
connect();

$vid = $_GET['vid'];

$sql = "select * from videos join videotype on videos.tid=videotype.tid join admins on videos.uploadadmin=admins.adminid where vid=$vid";
$sqlhit = "update videos set hittimes=hittimes+1 where vid=$vid ";
$sqlcomment = "select * from comments join users on comments.uid=users.uid where vid=$vid";
$resultcomment = mysql_query($sqlcomment);
$resutlthit = mysql_query($sqlhit);
$result = mysql_query($sql);
$row = mysql_fetch_assoc($result);
$num = mysql_num_rows($resultcomment);

?>


<div class="container">

    <div class="row row-offcanvas row-offcanvas-right">

        <div class="col-xs-12 col-sm-12">


            <div class="row box">
                <div class="col-lg-4 text-center">
                   <video src="<?php echo $row['address']; ?>" controls="controls" width="300" height="270" poster="./posters/<?php echo $row['pic']; ?>"></video>
                    
                    <p><?php echo $row['videoname']; ?></p>

                </div><!--放视频海报和标题-->
                <div class="col-lg-8 text-center">
                    <table class="table table-striped">
                        <tr>
                            <td>专栏</td>
                            <td><?php echo $row['typename']; ?></td>
                        </tr>
                        <tr>
                            <td>上传时间</td>
                            <td><?php echo $row['uploaddate']; ?></td>
                        </tr>
                        <tr>
                            <td>上传人</td>
                            <td><?php echo $row['adminname']; ?></td>
                        </tr>
                        <tr>
                            <td>点击量</td>
                            <td><?php echo $row['hittimes']; ?></td>
                        </tr>
                        <tr>
                            <td>有事找站长</td>
                            <td><a href="mailto:2586417932@qq.com">意见箱</a></td>
                        </tr>
                    </table>
                </div><!--表格显示视频详细信息-->


            </div>
            <!--/row-->
            <div class="row box">

                <div class="col-lg-12">
                    <h2 class="intro-text text-center">内容简介

                    </h2>
                    <?php echo $row['intro']; ?>

                </div>
            </div>  <!--/row-->

            <div class="row box">

                <div class="col-lg-12">
                    <h2 class="intro-text text-center">留言列表

                    </h2>
                <table class="table table-striped">
                        <?php 
                            if ($num == 0) {
                                echo "暂无留言";
                            }else{
                         ?>
                         <tr>
                             <td>编号</td>
                             <td>留言内容</td>
                             <td>留言时间</td>
                             <td>留言人</td>
                         </tr>
                         <?php 
                            while ($rowcomment = mysql_fetch_assoc($resultcomment)) {
                            ?>
                            <tr>
                            <td><?php echo $rowcomment['cid']; ?></td>
                            <td><?php echo $rowcomment['content']; ?></td>
                            <td><?php echo $rowcomment['cdate']; ?></td>
                            <td><?php echo $rowcomment['uname']; ?></td>
                            </tr>
                        <?php
                                }
                            }
                          ?>
                    </table>

                </div>
            </div>  <!--/row-->
            <div class="row box">

                <div class="col-lg-12">
                    <h2 class="intro-text text-center">请留言</h2>
                    <?php 
                    // session_start();
                    if (isset($_SESSION['username'])) {
                     ?>
                    <form action="doComment.php" method="post" class="form-horizontal">
                        <input type="hidden" value="<?php echo $vid; ?>" name="vid">
                        <textarea name="comment" rows="10" class="form-control"></textarea>
                        <input type="submit" value="发表" class="btn btn-default">
                    </form>
                    <?php }else{ ?>
                        <a href="#" data-toggle="modal" data-target="#login">登陆</a>后可以留言
                    <?php } ?>
                </div>
            </div>  <!--/row-->


        </div>
        <!--/.col-xs-12.col-sm-12-->

       
    </div>
    <!--/row-->

    

</div>
<!--/.container-->
<?php
require_once('tpl/foot.php');
include_once('./system/dbConn.php');
?>
