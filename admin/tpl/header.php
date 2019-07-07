<?php
  require_once('inc_admin.php');
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<!-- saved from url=(0050)http://139.129.208.64/admin.php/index/modpass.html -->
<!DOCTYPE html PUBLIC "" ""><HTML lang="zh-cn"><HEAD><META content="IE=10.000" 
http-equiv="X-UA-Compatible">
     
<META charset="utf-8">     
<META http-equiv="X-UA-Compatible" content="IE=edge">     
<META name="viewport" content="width=device-width, initial-scale=1">     <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags --> 
    
<META name="description" content="">     
<META name="author" content="郡笑笙">        
<TITLE>视频信息管理系统</TITLE>     <!-- Bootstrap core CSS -->
<LINK href="assets/bootstrap.min.css" rel="stylesheet" type="text/css"> 
        <!-- Custom styles for this template -->     
<LINK href="assets/dashboard.css" rel="stylesheet" type="text/css">     
<LINK href="assets/offcanvas.css" rel="stylesheet">     
<!-- Just for debugging purposes. Don't actually copy these 2 lines! --> 
    <!--[if lt IE 9]><script src="assets/js/ie8-responsive-file-warning.js"></script><![endif]--> 
    

     <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries --> 
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]--> 
  

<BODY><NAV class="navbar navbar-inverse navbar-fixed-top">
<DIV class="container-fluid">
<DIV class="navbar-header"><BUTTON class="navbar-toggle collapsed" 
aria-expanded="false" aria-controls="navbar" type="button" data-toggle="collapse" 
data-target="#navbar"><SPAN class="sr-only">Toggle navigation</SPAN>             
<SPAN class="icon-bar"></SPAN><SPAN class="icon-bar"></SPAN><SPAN class="icon-bar"></SPAN></BUTTON> 
          <A class="navbar-brand" href="#" target="_blank">视频信息管理系统</A> 
        </DIV>
<DIV class="navbar-collapse collapse" id="navbar">
<UL class="nav navbar-nav navbar-right">
  <LI><A 
href="logout.php">注销</A></LI></UL></DIV></DIV></NAV>
<DIV class="container-fluid">
<DIV class="row row-offcanvas row-offcanvas-left">
<DIV class="col-xs-6 col-sm-3 col-md-2 sidebar sidebar-offcanvas" id="sidebar">
<UL class="nav nav-sidebar">
    
  <LI><A class="accordion-toggle collapsed" href="#" data-toggle="collapse" data-target="#mastersubmenu">视频类型维护</A>
  <UL class="nav collapse" id="mastersubmenu" style="padding-left: 20px;">
    <LI><A href="typeAdd.php">添加视频类型</A></LI>
    <LI><A href="typeList.php">查询视频类型</A></LI>
  </UL>
  </LI>

   <LI><A class="accordion-toggle collapsed" href="#" data-toggle="collapse" data-target="#mastersubmenu1">视频信息维护</A>
  <UL class="nav collapse" id="mastersubmenu1" style="padding-left: 20px;">
    <LI><A href="videoAdd.php">添加视频信息</A></LI>
    <LI><A href="videoList.php">查询视频信息</A></LI>
  </UL>
  </LI>


  <LI><A href="commentList.php">留言维护</A></LI>

  <LI><A href="userList.php">用户维护</A></LI>

  <LI><A href="changePassword.php">密码维护</A></LI>

  
</UL>
</DIV>



<DIV class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main ">
<P class="pull-left visible-xs"><BUTTON class="btn btn-primary btn-xs" type="button" 
data-toggle="offcanvas">Toggle</BUTTON>  </P>              <br> <br>