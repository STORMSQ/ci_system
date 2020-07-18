<html>
<head>
<title>引文列表</title>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<script type="text/javascript" src="../../../sysfunction/pageJS.js"></script>
<link href="../../../model/bootstrap/twitter-bootstrap-v2/docs/assets/css/bootstrap.css" rel="stylesheet" type="text/css" />

</head>
<body>
<p>引文出現於下列文章中</p>
<div class="container-fluid">
<?php
require "../../../sysfunction/connect.php";
require "../../../option/option.php";


if($_POST['sub']){


 $value=explode(';',$_POST['detail']);
   echo '<table border="1">';
   $num=0; 
   foreach($value as $row){
        $result=$target->query("SELECT reference,REF,ID FROM `ci_reference_entry` WHERE REFID='$row'");
        
        $row=$result->fetchAll(PDO::FETCH_NUM);
        foreach($row as $data){
        
           $final[$num]=$data[1];
           $final_id[$num]=$data[0];
        }
       
    $num=$num+1;   
      
    }
    
    $total=array_unique($final);
    $article_Num=count($total);
   
        $num=0; 
         foreach($total as $data){
        ?>
        <div class="container-fluid">
        <div class="accordion" id="<?php echo 'accordion['.$num.']'; ?>">
        <div class="accordion-group">
        <div class="accordion-heading">
        <?php         
            $result_1 = $pdo->query("SELECT ".ARTICLEID.",".CHITITLE.", ".ENGTITLE." FROM ".ARTICLE." WHERE ".ARTICLEID." = '".$data."'");
                 $row_1=$result_1->fetch(PDO::FETCH_NUM);
             echo '<ul>';    
             echo '<li><b><font size="3">'.$row_1[1].$row_1[2].'</font></b></li>';
             echo '</ul>';    
             echo '<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapse'.$num.'">';
             echo '<font size="3">點擊展開該篇文章符合條件之引文</font>';
             echo '</a>';    
        ?></div>
          <div id="<?php echo 'collapse'.$num; ?>" class="accordion-body collapse" style="height: 0px; "> 
          <div class="accordion-inner">
          <?php    
             echo '<ul>';
               foreach($value as $data_1){
               
                    if(strstr($data_1,$row_1[0])!=false){
                    
                         $result_2= $target->query("SELECT reference FROM `ci_reference_entry` WHERE REF = '".$row_1[0]."' AND REFID = '$data_1' ");
                          $row_2= $result_2->fetch(PDO::FETCH_NUM);
                          echo '<li><p>'.$row_2[0].'</p></li>';
                    
                    } 
               
               }
              echo '</ul>';
                               
            ?>   
             </div></div></div></div></div>
             
         <?php    
        $num=$num+1;     
        }
    }
    
    
    if($_POST['submit_2']){
    
   
    
    
    
    }
  
?>
</div>
<hr>
<p>共有<?php echo $article_Num;  ?>篇文章</p>
<input type="button" onclick="history.go(-1)" value="返回上一頁">
</body>
</html>

    

<script type="text/javascript" src="../../../model/bootstrap/twitter-bootstrap-v2/docs/assets/js/jquery.js"></script>
<script type="text/javascript" src="../../../model/bootstrap/twitter-bootstrap-v2/docs/assets/js/bootstrap-collapse.js"></script>