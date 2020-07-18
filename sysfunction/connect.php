<?php



try{
 $pdo= new PDO("mysql:host=localhost;dbname=joemls","root","tkudilsgmysql",array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
 $target= new PDO("mysql:host=localhost;dbname=ci_system","root","tkudilsgmysql",array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
 }catch (PDOException $e){
       echo '資料庫連接失敗';
       exit;
 
 }
 
 ?>
