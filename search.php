<?php
require_once('tpl/head.php');
include_once('./system/dbConn.php');
?>


<div class="container">

    <div class="row row-offcanvas row-offcanvas-right">

        <div class="col-xs-12 col-sm-12">


            <div class="row">

            
                <div class="col-xs-12 col-lg-12 mlist">
                    <h2>查询结果</h2>
                    <ul class="list-inline row text-center">
                        <?php //连接数据库，获取数据
                            // mysql_connect("localhost","root","root");
                            // mysql_select_db("neuvideo");
                            // mysql_set_charset("utf8");
                            // require('../system/dbConn.php');
                            // connect(); 

                            $sql = "select * from videos";

                            if (isset($_GET["key"])) {//如果$_get[key]存在
                                $key = trim($_GET["key"]);//trim去空格
                                $sql = "select * from videos where videoname like '%{$key}%'";
                            }

                            $result = mysql_query($sql);
                            $row = mysql_num_rows($result);
                            if ($row==0) {
                                echo "没有查询结果！";
                                // header("refresh:3;url='userList.php'");
                                // die("没有查询结果！");
                            }
                            else{
                            //取结果集中的记录
                            $row = mysql_fetch_assoc($result);
                        ?>
                        <li class="col-xs-6 col-lg-3">
                            <img src="posters/<?php echo $row['pic'] ?>" class="responsive img-thumbnail"/>

                            <p><a href="show.php?vid=<?php echo $row['vid']; ?>"><?php echo $row['videoname']; ?></a>
                            </p>
                        </li>
                    </ul>
                    <nav class="text-center">
                        <ul class="pagination">
                            <li>
                                <a href="#" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                            <li><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li>
                                <a href="#" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <?php } ?>
                </div>
                <!--/.col-xs-6.col-lg-4-->

            </div>
            <!--/row-->
        </div>
        <!--/.col-xs-12.col-sm-9-->
    </div>
    <!--/row-->

    

</div>
<!--/.container-->
<?php
require_once('tpl/foot.php');
?>