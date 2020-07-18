<?php
require "../../sysfunction/connect.php";
require "../../option/option.php";
if($_POST['article']){

$result=$pdo->query("SELECT ".ARTICLEID.", ".VOLUMEANDISSUEID.", ".CHITITLE." , ".ENGTITLE." FROM ".ARTICLE." WHERE ".CHITITLE." = '".$_POST['article']."' or ".ENGTITLE." = '".$_POST['article']."'");

if($result->rowCount() == 0){

   $word.= '<font color="red">找不到文章，請先確認</font>';
   
   
}else{

  
$word.='<table border="1" width="100%">';
$result1=$result->fetchAll(PDO::FETCH_NUM);

foreach($result1 as $row){
  
  $volume=substr($row[1],0,2);
  $issueId=substr($row[1],2,1);
  
  $authorresult=$pdo->query("SELECT ".CHINAME.", ".ENGNAME." FROM ".AUTHOR." WHERE ".ARTICLEID." = '".$row[0]."'");
  
  $authorresult1=$authorresult->fetchAll(PDO::FETCH_NUM);
       if($row['engTitle']==''){
              $word.= '<tr><td>篇名</td><td><font color="green">'.$row[2].'</td></tr><td>卷期</td><td>'.$volume.'卷'.$issueId.'期</font></td></tr>';
  
    
              }elseif($row['chiTitle'] == ''){
              $word.= '<tr><td>篇名</td><td><font color="green">'.$row[3].'</td></tr><td>卷期</td><td>'.$volume.'卷'.$issueId.'期</font></td></tr>';
    
              }else{
  
              $word.= '<tr><td>篇名</td><td><font color="green">'.$row[2].'</td></tr><td>卷期</td><td>'.$volume.'卷'.$issueId.'期</font></td></tr>';
  
            }
            
            
            
          $word.='<tr><td rowspan="'.$authorresult->rowCount().'">作者</td>';
    foreach($authorresult1 as $authorrow){
       
       
       
         if($authorrow[0] == ''){
         
             $word.='<td>'.$authorrow[1].'</td></tr>';
         
         }elseif($authorrow['engName'] == ''){
         
             $word.='<td>'.$authorrow[0].'</td></tr>';
         
         }else{
         
             $word.='<td>'.$authorrow[0].'</td></tr>';
         
         } 
       
    }
  
  
  $word.='</table>';
 
}

 }
 
  echo $word;
}




 ?>