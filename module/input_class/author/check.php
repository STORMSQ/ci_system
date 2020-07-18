<?php 

require "../../../sysfunction/connect.php";

$value=$_POST['value'];


$real=$pdo->query("SELECT id,name FROM `ci_author_control` WHERE name = '$value'");
$redir=$pdo->query("SELECT redir FROM `ci_author_control_redirect` WHERE name ='$value'");
  

  
  if($real->rowCount()>0){
 
   $row = $real->fetch(PDO::FETCH_ASSOC);
   
   echo $row['name'].':'.$row['id'];
 
 
 }elseif($redir->rowCount()>0){
 
   $row = $redir->fetch(PDO::FETCH_ASSOC);
   $real1=$pdo->query("SELECT id,name FROM `ci_author_control` WHERE id='".$row['redir']."'");
   
   $row1=$real1->fetch(PDO::FETCH_ASSOC);
   echo $row1['name'].':'.$row1['id'];
 
 }else{
 
   echo  'X:NULL';
 
 }
