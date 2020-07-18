<?php

 $database_item=array('ARTICLEID'=>'articleId','ENGTITLE'=>'engTitle','CHITITLE'=>'chiTitle','ENGNAME'=>'engName','CHINAME'=>'chiName','VOLUMEANDISSUEID'=>'volumeAndIssueId');
 $database_table_name=array('ARTICLE'=>'records', 'AUTHOR'=>'authors');
 
 foreach($database_item as $row=>$key){
 
    define($row, $key);
 
 
 
 }
  foreach($database_table_name as $row=>$key){
 
    define($row, $key);
 
 
 
 }
 
 
 define('APP','/ci_system');

