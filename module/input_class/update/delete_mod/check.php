<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<title>操作結果</title>
<?php

require "../../../sysfunction/connect.php";
require "../../../option/option.php";



$value=$_POST['value'];

$result=$target->query("SELECT * FROM `ci_reference_entry` WHERE REF='$value'");


if($result->rowCount()==0){

      echo '尚未找到該篇文章引文資料';

}else{
     
     $target->exec("DELETE FROM `ci_author` WHERE REF= '$value'");     
     $target->exec("DELETE FROM `ci_date` WHERE REF= '$value'");
     $target->exec("DELETE FROM `ci_title` WHERE REF= '$value'");
     $target->exec("DELETE FROM `ci_source` WHERE REF= '$value'");
     $target->exec("DELETE FROM `ci_type` WHERE REF= '$value'");
     $target->exec("DELETE FROM `ci_language` WHERE REF= '$value'");
     $target->exec("DELETE FROM `ci_number` WHERE REF= '$value'");
     $target->exec("DELETE FROM `ci_style` WHERE REF= '$value'");
     $target->exec("DELETE FROM `ci_reference_entry` WHERE REF = '$value' ");
echo '操作成功';
}