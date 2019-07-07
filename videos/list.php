<?php
require_once('tpl/head.php');
include_once('./system/dbConn.php');

$tid = $_GET['tid'];

$sql = "select * from videos where tid=$tid";
$sqlrank = "select * from videos where tid=$tid order by hittimes desc limit 4";
$result = mysql_query($sql);
$resultrank = mysql_query($sqlrank);
?>


<div class="container">

    <div class="row row-offcanvas row-offcanvas-right">

        <div class="col-xs-12 col-sm-9">


            <div class="row">


                <div class="col-xs-12 col-lg-12 mlist">
                    <h2><?php 
                        $sqlname = "select * from videotype where tid=$tid";
                        $resultname = mysql_query($sqlname);
                        $rowname = mysql_fetch_assoc($resultname);
                        echo $rowname['typename'];
                     ?></h2>
                    <ul class="list-inline row text-center">
                        <?php while ($row = mysql_fetch_assoc($result)) { ?>
                        <li class="col-xs-6 col-lg-3">
                            <img src="posters/<?php echo $row['pic'] ?>" class="responsive img-thumbnail"/>

                            <p><a href="show.php?vid=<?php echo $row['vid']; ?>"><?php echo $row['videoname']; ?></a>
                            </p>
                        </li>
                        <?php } ?>
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


                </div>
                <!--/.col-xs-6.col-lg-4-->

            </div>
            <!--/row-->
        </div>
        <!--/.col-xs-12.col-sm-9-->

        <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar">
            <div class="list-group text-center" >
                <h2 style="color:white;">点击排行</h2>
                <ul class="list-inline row text-center">
                    <?php while ($rowrank = mysql_fetch_assoc($resultrank)) { ?>
                    <li class="col-xs-12 col-lg-6">
                        <img src="posters/<?php echo $rowrank['pic'] ?>" class="responsive img-thumbnail"/>

                        <p><a href="show.php?vid=<?php echo $rowrank['vid']; ?>"><?php echo $rowrank['videoname']; ?></a>
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