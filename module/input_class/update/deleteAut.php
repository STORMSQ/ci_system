<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<?php
  require "../../../sysfunction/connect.php";
  
   $value=$_POST['value'];
   
     
   
     $result=$target->exec("DELETE FROM `ci_author` WHERE num= '$value'");
    
     

   
   



?>