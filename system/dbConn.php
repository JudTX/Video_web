<?php  
  define('DB_HOST', 'localhost');
  define('DB_USER', 'root');
  define('DB_PWD', 'root');
  define('DB_CHARSET', 'UTF8');
  define('DB_DBNAME', 'neuvideo');
  function connect (){ 
    //连接mysql
    $link=@mysql_connect(DB_HOST,DB_USER,DB_PWD) or die ('数据库连接失败<br/>ERROR '.mysql_errno().':'.mysql_error());
    //设置字符集
    mysql_set_charset(DB_CHARSET);
    //打开指定的数据库
    mysql_select_db(DB_DBNAME) or die('指定的数据库打开失败'.mysql_error());
    return $link;
 }  
 ?>
