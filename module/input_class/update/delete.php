<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<?php
  require "../../../sysfunction/connect.php";
  
   $value=$_POST['value'];
   $subvalue=$_POST['subvalue'];
   
     
     
        
     $target->exec("DELETE FROM `ci_date` WHERE REF= '$value' and ID = '$subvalue'");
     $target->exec("DELETE FROM `ci_title` WHERE REF= '$value' and ID = '$subvalue'");
     $target->exec("DELETE FROM `ci_source` WHERE REF= '$value' and ID = '$subvalue'");
     $target->exec("DELETE FROM `ci_type` WHERE REF= '$value' and ID = '$subvalue'");
     $target->exec("DELETE FROM `ci_language` WHERE REF= '$value' and ID = '$subvalue'");
     $target->exec("DELETE FROM `ci_author` WHERE REF= '$value' and ID = '$subvalue'");  
     $target->exec("DELETE FROM `ci_reference_entry` WHERE REF = '$value' and ID = '$subvalue'");
   
   



?>