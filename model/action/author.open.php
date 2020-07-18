<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<?php

if($_GET['ns']!=null){

   $member=$_GET['member'];
   $content=$_GET['value'];
   $result=explode('<==>',$member);
    
    $i=1;
    foreach($result as $row){
  
   
    ?>
    <input type="button" value="第<?php echo $i; ?>位置" onclick="returnValue('<?php echo $row; ?>','<?php echo $content; ?>')"><br>
    <?php
    $i++;
   } 
  

}

?>



<script>


function returnValue(value,content){

  window.opener.document.getElementById(value).value=content;
  window.close();

}



</script>



