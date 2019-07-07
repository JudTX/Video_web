<?php
require_once('tpl/head.php');
include_once('./system/dbConn.php');


$sql1 = "select * from videos where tid=(select tid from videotype where typename='电影') limit 6";
$sql2 = "select * from videos where tid=(select tid from videotype where typename='电视剧') limit 6";
$sql3 = "select * from videos where tid=(select tid from videotype where typename='动画片') limit 6";
$sql4 = "select * from videos where tid=(select tid from videotype where typename='科幻') limit 6";
$sqlrank = "select * from videos order by hittimes desc limit 4";
$sqlsearch = "";
$result1 = mysql_query($sql1);
$result2 = mysql_query($sql2);
$result3 = mysql_query($sql3);
$result4 = mysql_query($sql4);
$resultrank = mysql_query($sqlrank);

?>

<div class="container">
<!--幻灯片开始-->
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
        <div class="item active">
            <img src="assets/images/img4.jpg" class="img-responsive" alt="img4">

           
        </div>
        <div class="item">
            <img src="assets/images/img2.jpg" class="img-responsive" alt="img2">

           
        </div>
        <div class="item">
            <img src="assets/images/img3.jpg" class="img-responsive" alt="img3">

            
        </div>
    </div>

    <!-- Controls -->
    <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
    </a>
    <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
    </a>
</div>
<!--幻灯片结束-->



    <div class="row row-offcanvas row-offcanvas-right">

        <div class="col-xs-12 col-sm-9">
            <div class="row text-center">
                <div class="col-xs-12 col-lg-12 mlist">
                    <h2>电影</h2>
                    <ul class="list-inline row text-center">
                        <?php while ($row1 = mysql_fetch_assoc($result1)) { ?>
                        <li class="col-xs-4 col-sm-3 col-lg-2">
                            <img src="posters/<?php echo $row1['pic']; ?>" class="responsive img-thumbnail"/>

                            <p><a href="show.php?vid=<?php echo $row1['vid']; ?>"><?php echo $row1['videoname']; ?></a>
                            </p>
                        </li>
                        <?php } ?>
                    </ul>
                    <?php 
                        // 执行完while循环后 row内为空若不执行sql则无法取到row中的tid
                        $result1 = mysql_query($sql1);
                        $row1 = mysql_fetch_assoc($result1);
                     ?>
                    <p><a class="btn btn-default" href="list.php?tid=<?php echo $row1['tid']; ?>" role="button">更多 &raquo;</a></p>
                </div>
                <!--/.col-xs-6.col-lg-4-->
            </div>
            <!--/row-->
            <div class="row text-center">
                <div class="col-xs-12 col-lg-12 mlist">
                    <h2>电视剧</h2>
                    <ul class="list-inline row text-center">
                        <?php while ($row2 = mysql_fetch_assoc($result2)) { ?>
                        <li class="col-xs-4 col-sm-3 col-lg-2">
                            <img src="posters/<?php echo $row2['pic']; ?>" class="responsive img-thumbnail"/>

                            <p><a href="show.php?vid=<?php echo $row2['vid']; ?>"><?php echo $row2['videoname']; ?></a>
                            </p>
                        </li>
                        <?php } ?>
                    </ul>
                    <?php 
                        $result2 = mysql_query($sql2);
                        $row2 = mysql_fetch_assoc($result2);
                     ?>
                    <p><a class="btn btn-default" href="list.php?tid=<?php echo $row2['tid']; ?>" role="button">更多 &raquo;</a></p>
                </div>
                <!--/.col-xs-6.col-lg-4-->
            </div>
            <!--/row-->
            <div class="row text-center">
                <div class="col-xs-12 col-lg-12 mlist">
                    <h2>动画片</h2>
                    <ul class="list-inline row text-center">
                        <?php while ($row3 = mysql_fetch_assoc($result3)) { ?>
                        <li class="col-xs-4 col-sm-3 col-lg-2">
                            <img src="posters/<?php echo $row3['pic']; ?>" class="responsive img-thumbnail"/>

                            <p><a href="show.php?vid=<?php echo $row3['vid']; ?>"><?php echo $row3['videoname']; ?></a>
                            </p>
                        </li>
                        <?php } ?>
                    </ul>
                    <?php 
                        $result3 = mysql_query($sql3);
                        $row3 = mysql_fetch_assoc($result3);
                     ?>
                    <p><a class="btn btn-default" href="list.php?tid=<?php echo $row3['tid']; ?>" role="button">更多 &raquo;</a></p>
                </div>
                <!--/.col-xs-6.col-lg-4-->
            </div>
            <!--/row-->
            <div class="row text-center">
                <div class="col-xs-12 col-lg-12 mlist">
                    <h2>科幻</h2>
                    <ul class="list-inline row text-center">
                        <?php while ($row4 = mysql_fetch_assoc($result4)) { ?>
                        <li class="col-xs-4 col-sm-3 col-lg-2">
                            <img src="posters/<?php echo $row4['pic']; ?>" class="responsive img-thumbnail"/>

                            <p><a href="show.php?vid=<?php echo $row4['vid']; ?>"><?php echo $row4['videoname']; ?></a>
                            </p>
                        </li>
                        <?php } ?>
                    </ul>
                    <?php 
                        $result4 = mysql_query($sql4);
                        $row4 = mysql_fetch_assoc($result4);
                     ?>
                    <p><a class="btn btn-default" href="list.php?tid=<?php echo $row4['tid']; ?>" role="button">更多 &raquo;</a></p>
                </div>
                <!--/.col-xs-6.col-lg-4-->
            </div>
            <!--/row-->
        </div>
        <!--/.col-xs-12.col-sm-9-->

        <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar">
            <div class="list-group text-center">
                <h2 style="color:white;" >点击量排行</h2>
                <ul class="list-inline row text-center">
                    <?php while ($rowrank = mysql_fetch_assoc($resultrank)) { ?>
                    <li class="col-xs-12 col-lg-6">
                        <img src="posters/<?php echo $rowrank['pic']; ?>" class="responsive img-thumbnail"/>

                        <p><a href="show.php?tid=<?php echo $rowrank['tid'] ?>"><?php echo $rowrank['videoname']; ?></a>
                        </p>
                    </li>
                    <?php } ?>
                </ul>
            </div>

        </div>
        <!--/.sidebar-offcanvas-->
    </div>
    <!--/row-->

   

</div>
<!--/.container-->
 <?php
require_once('tpl/foot.php');
?>