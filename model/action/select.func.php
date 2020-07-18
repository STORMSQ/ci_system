<?php

function work($target,$where,$num){


$tmp_result=$target->query("SELECT type as 資源總類, title as 標題, date as 日期, language as 語言, GROUP_CONCAT(author) as 作者 FROM `ci_alldata_4` {$where}  GROUP BY REFID");
$total=$tmp_result->rowCount();

$page= new page($total,$num);
$result=$target->query("SELECT type as 資源總類, title as 標題, date as 日期, language as 語言, GROUP_CONCAT(author) as 作者 FROM `ci_alldata_4` {$where} GROUP BY REFID {$page->limit}");

$result=$result->fetchAll(PDO::FETCH_NUM);
echo '<table border="1" width="100%">';
echo '<tr><td>資源種類</td><td>標題</td><td>日期</td><td>語言</td><td>作者</td></tr>';
foreach($result as $row){

 switch ($row[0]){
 
   case 'book':
   $row[0]='圖書';
   break; 
   
   case 'journal':
   $row[0]='期刊論文';
   break;
   
   case 'web':
   $row[0]='網路資源';
   break;
   
   case 'tool':
   $row[0]='工具書';
   break;
   
   case 'report':
   $row[0]='技術報告';
   break;
   
   case 'newspaper':
   $row[0]='報紙';
   break;
   
   case 'conference':
   $row[0]='會議論文';
   break;
   
   case 'thesis':
   $row[0]='學位論文';
   break;
   
   default:
   
   $row[0]='其它';
 
 }
 switch($row[3]){
  case 'english':
  $row[3]='西文';
  break;
  default:
  $row[3]='中文';
 }
 
  echo '<tr><td>'.$row[0].'</td><td>'.$row[1].'</td><td>'.$row[2].'</td><td>'.$row[3].'</td><td>'.$row[4].'</td></tr>';


}
echo '<tr><td colspan="5">'.$page->displayPage().'</td></tr>';
echo '</table>';

}

function authorCheck($name,$target){


  $real=$target->query("SELECT id,name FROM `ci_author_control` WHERE name = '$name'");
  $redir=$target->query("SELECT redir,name FROM `ci_author_control_redirect` WHERE name ='$name'");
  

  
  if($real->rowCount()>0){
 
   $row = $real->fetch(PDO::FETCH_ASSOC);
   
   return $row['name'].':'.$row['id'];
 
 
 }elseif($redir->rowCount()>0){
 
   $row = $redir->fetch(PDO::FETCH_ASSOC);
   $real1=$target->query("SELECT id,name FROM `ci_author_control` WHERE id='".$row['redir']."'");
   
   $row1=$real1->fetch(PDO::FETCH_ASSOC);
   return $row1['name'].':'.$row1['id'];
 
 }else{
 
   return 'X:NULL';
 
 }



}




?>
