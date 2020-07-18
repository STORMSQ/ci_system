<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="../../model/ajax/ci_ajax.js"></script>
<script src="../../model/ajax/ci_function.js"></script>
<link rel="StyleSheet" href="../../model/css/small.css" type="text/css" />
</head>
<body>
 
    <div id="card">
     <div id="tit">
         <div onclick="show(0)" class="titin">APA格式</div>
         <div onclick="show(1)">Chicago格式</div>
         <div onclick="show(2)">手動填入</div>
        <!-- <div onclick="show(3)">手動填入2</div> -->
        <!-- <div onclick="">Excel匯入</div>   -->
      
         
    </div>
     <div class="nav">&nbsp;</div>     
     <div id="content">
      <div style="display:block">
          
          <iframe src="./apa/index.php" style="border:0px" width="100%" height="850px" scrolling="no"></iframe>
         

      </div>
     
       <div style="display:none">
          
          <iframe src="./chicago/index.php" style="border:0px" width="100%" height="850px" scrolling="no"></iframe>
         

      </div>
      <div style="display:none">
          
          <iframe src="./nonparser/index.php" style="border:0px" width="100%" height="850px" scrolling="yes"></iframe>
         

      </div>
       <!--<div style="display:none">
          
          <iframe src="./manual/index.php" style="border:0px" width="100%" height="850px" scrolling="no"></iframe>
         

      </div> -->
      
     
	   </div> 
</div>
  
  


  <script>


var h3obj=document.getElementById("tit").getElementsByTagName("div");
var cobj=document.getElementById("content").getElementsByTagName("div");


</script>
</body>
</html>
