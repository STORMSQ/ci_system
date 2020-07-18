<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="../../../model/ajax/ci_ajax.js"></script>
<script src="../../..//model/ajax/ci_function.js"></script>
<link rel="StyleSheet" href="../../../model/css/small.css" type="text/css" />
</head>
<body>
 
    <div id="card">
     <div id="tit">
         <div onclick="show(0)" class="titin">引文資料修改</div>         
         <!--<div onclick="show(1)">引文資料清空</div> -->
         
         
      
         
    </div>
     <div class="nav">&nbsp;</div>     
     <div id="content">
      
     
       <div style="display:block">
          
          <iframe src="update.php" style="border:0px" width="100%" height="800px" scrolling=""></iframe>
         

      </div>
       <!--<div style="display:none">
                
         <iframe src="./delete_mod/index.php" style="border:0px" width="100%" height="500px" scrolling="no"></iframe> 
          
                    
      </div> -->
             

	   </div> 
</div>
  
  
  
  
  
  
  
   

<!--</table>  -->
<?php

/*
require "citation.php";
  require "connect.php";
  $ci=new Citation;
  
  
  if($_POST['submit']){
  $content=$_POST['content'];
  $article=$_POST['article'];
  
  
  $result= str_replace("\n","<br/>",$content);
  
  
  echo $article;
  $ci->dataInput($article, $result);
   
 }
 
 */
 ?>
  <script>


var h3obj=document.getElementById("tit").getElementsByTagName("div");
var cobj=document.getElementById("content").getElementsByTagName("div");


</script>
</body>
</html>