<?php
 require "../../../sysfunction/connect.php";
 
 $name=$_POST['name'];
 
  $real=$pdo->query("SELECT realName FROM `ci_author_control_main` WHERE realName = '$name'");
  $redir=$pdo->query("SELECT name FROM `ci_author_control_redir` WHERE name ='$name'");


  if($real->rowCount()>0){
 
   $row = $real->fetch(PDO::FETCH_ASSOC);
   
   return '<font color="green">'.$row['realName'].'</font>';
 
 
 }elseif($redir->rowCount()>0){
 
   $row = $redir->fetch(PDO::FETCH_ASSOC);
   $real1=$pdo->query("SELECT realName FROM `ci_author_control_main` WHERE id='".$row['redir']."'");
   
   $row1=$real1->fetch(PDO::FETCH_ASSOC);
   return '<font color="orange">'.$row1['realName'].'</font>';
 
 }else{
 
   return '<font color="red">X</font>';
 
 }







?>