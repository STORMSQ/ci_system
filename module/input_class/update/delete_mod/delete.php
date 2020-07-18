<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<?php

require "../../../../sysfunction/connect.php";

$value=$_POST['value'];


     
     $target->exec("DELETE FROM `ci_author` WHERE REF= '$value'");     
     $target->exec("DELETE FROM `ci_date` WHERE REF= '$value'");
     $target->exec("DELETE FROM `ci_title` WHERE REF= '$value'");
     $target->exec("DELETE FROM `ci_source` WHERE REF= '$value'");
     $target->exec("DELETE FROM `ci_type` WHERE REF= '$value'");
     $target->exec("DELETE FROM `ci_language` WHERE REF= '$value'");
     $target->exec("DELETE FROM `ci_number` WHERE REF= '$value'");
     $target->exec("DELETE FROM `ci_style` WHERE REF= '$value'");
     $target->exec("DELETE FROM `ci_reference_entry` WHERE REF = '$value' ");

