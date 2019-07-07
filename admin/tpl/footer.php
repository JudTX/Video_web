</DIV></DIV></DIV><!-- Bootstrap core JavaScript
    ================================================== --> 
    <!-- Placed at the end of the document so the pages load faster -->    
<SCRIPT src="assets/jquery.min.js" type="text/javascript"></SCRIPT>
     
<SCRIPT src="assets/bootstrap.min.js" type="text/javascript"></SCRIPT>
         <!-- Just to make our placeholder images work. Don't actually copy the next line! --> 
    
<SCRIPT src=""></SCRIPT>
     <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->     
<SCRIPT src=""></SCRIPT>
   
<SCRIPT type="text/javascript">
$(document).ready(function(){
   $('[data-toggle="offcanvas"]').click(function () {
        $('.row-offcanvas').toggleClass('active')
    });
  $("#selAll").click(function(){
  $(".lists :checkbox").not(':disabled').prop("checked", true);
  });
  $("#unSelAll").click(function () {

        $(".lists :checkbox").not(':disabled').prop("checked", false);

    });

    $("#reverSel").click(function () {

        //遍历.lists下的 checkbox;

        $(".lists :checkbox").not(':disabled').each(function () {

            $(this).prop("checked", !$(this).prop("checked"));

        });

    });
  
  $("#doDel").click(function () {

        //遍历.lists下的 checkbox;

        if($(".lists :checked").length==0){
    alert("至少选择一项！");
    return false;
    }
    $("#action").val("dels");

    });
  $("#doCheck").click(function () {
    $("#action").val("checks");
    });
  $("#listorder").click(function () {
    $(".lists :checkbox").not(':disabled').prop("checked", true);
    $("#action").val("listorder");
    
    });
  
  $("#rec_pos").click(function () {

        $("#action").val("rec_pos");

    });
  
  $("#ug").click(function () {

        $("#action").val("ug");

    });
});
</SCRIPT>

   </BODY></HTML>
