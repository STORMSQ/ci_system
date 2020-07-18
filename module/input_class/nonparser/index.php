<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="../../../model/ajax/ci_ajax.js"></script>
<script src="../../../model/ajax/ci_function.js"></script>
<link rel="StyleSheet" href="../../../model/css/small.css" type="text/css" />
</head>
<body>
  <div id="card">
     <div id="tit">
         <p><input type="radio" name="radio" onclick="show(0)" class="titin" checked>模式一：引文可透過複製獲取（批量拆解條目，人工填值）</p>
         <p><input type="radio" name="radio" onclick="show(1)">模式二：引文無法透過複製獲取（人工單筆新增資料）</p><br>
         <p>&nbsp;</p>

          
    </div>
     <div class="nav"><hr></div> 
     <div id="content">
      <div style="display:block">
          
          <iframe src="./other/index.php" style="border:0px" width="100%" height="850px" scrolling="yes"></iframe>
         

      </div>
     
       <div style="display:none">
          
          <iframe src="./manual/index.php" style="border:0px" width="100%" height="850px" scrolling="yes"></iframe>
         

      </div>
      

      
     
	   </div> 
</div>
  
  


  <script>


var h3obj=document.getElementById("tit").getElementsByTagName("input");
var cobj=document.getElementById("content").getElementsByTagName("div");


</script>
</body>
</html>
