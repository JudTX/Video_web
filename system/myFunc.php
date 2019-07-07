<!-- myFunc.php -->
<?php  
  //自定义函数，输入提示信息，并在3秒后自动跳转到指定页面
  function redirect($url, $msg)
 {	  
	   echo $msg.'<a href="'.$url.'">如果没有跳转，请点这里跳转</a>';
	   header("refresh:3;url=$url");      
 }
?>