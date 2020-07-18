
<?php

require "../../sysfunction/connect.php";
require "../../option/option.php";
$word=$_GET["term"];
$result=$pdo->query("SELECT ".CHITITLE.",".ENGTITLE." FROM ".ARTICLE." WHERE ".CHITITLE." LIKE '%$word%' or ".ENGTITLE." LIKE '%$word%'");

$result1= $result->fetchAll(PDO::FETCH_NUM);
foreach($result1 as $row){
  
  if($row[1]==''){
  //echo '<tr><td><font color="green">'.$row['chiTitle'].'</font></td></tr>';
  
    $final[]=array('label' => $row[0]);
  }elseif($row[0] == ''){
  //echo '<tr><td><font color="green">'.$row['engTitle'].'</font></td></tr>';
    $final[]=array('label' => $row[1]);
  }else{
  
    $final[]=array('label' => $row[0]);
  
  }
  
}

 echo json_encode($final);
 


?>


