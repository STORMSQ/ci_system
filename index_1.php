<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>引文管理系統</title>
<script src="./model/ajax/ci_ajax.js"></script>
<script src="./model/ajax/ci_function.js"></script>
<link rel="StyleSheet" href="./model/css/item.css" type="text/css" />
</head>
<body>



    <div id="card">
     <div id="tit">
         <div onclick="show(0)" class="titin">資料輸入</div>
         <div onclick="show(1)">資料修改</div>

      
         
    </div>
     <div class="nav">&nbsp;</div>     
     <div id="content">
      <div style="display:block">
          
          <iframe src="./module/input_class/index.php" style="border:0px" width="100%" height="850px" scrolling="no"></iframe>
         

      </div>
     
             
       <div style="display:none">
          
          <iframe src="./module/input_class/update/index.php" style="border:0px" width="100%" height="850px" scrolling="no"></iframe>
         

      </div>
     
	   </div> 
</div>
  
  



<script>


var h3obj=document.getElementById("tit").getElementsByTagName("div");
var cobj=document.getElementById("content").getElementsByTagName("div");


</script>
</body>
</html>