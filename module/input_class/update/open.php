<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
<title>引文資料列表</title>
<script src="../../../model/editor/Result/ckeditor.js"></script>
<script src="../../../model/ajax/ci_ajax.js"></script>
<script src="../../../model/ajax/ci_function.js"></script>
<script type="text/javascript" src="../../../model/js/config.js"></script>

<?php 

    require "../../../sysfunction/connect.php";
    require "../../../model/form/func_form.php";
    require "../../../model/action/select.func.php";
    require "../../../option/option.php";
    
    function endKey($arr){

      @end($arr);

      return @key($arr);

    }
    
    
    if($_GET['action']=='update'){ 
    $query=$_GET['REF'];
    $subquery=$_GET['ID'];
    $callNumber=$query.$subquery; 
    $result=$target->query("SELECT date FROM  `ci_date` WHERE REF = '$query' AND ID= '$subquery'");
    $result1=$target->query("SELECT reference FROM  `ci_reference_entry` WHERE REF = '$query' AND ID = '$subquery'");
    $result2=$target->query("SELECT type FROM `ci_type` WHERE REF = '$query' AND ID= '$subquery'");
    $result3=$target->query("SELECT title FROM  `ci_title` WHERE REF = '$query' AND ID= '$subquery'");
    $result4=$target->query("SELECT lang FROM  `ci_language` WHERE REF = '$query' AND ID= '$subquery'");
   
    $row=$result->fetch(PDO::FETCH_ASSOC);
    $row1=$result1->fetch(PDO::FETCH_ASSOC);
    $row2=$result2->fetch(PDO::FETCH_ASSOC);
    $row3=$result3->fetch(PDO::FETCH_ASSOC);
    $row4=$result4->fetch(PDO::FETCH_ASSOC);
    
          
          
          
                 $date=$row['date'];      
                 $reference=$row1['reference'];
                 $type=$row2['type'];             
                 $title=$row3['title'];
                 $lang=$row4['lang'];
                 
                 
                 
                 
                 
                 
                 
                 
                 if($lang =='english'){
                 
                   $language='english';
                 }else{
                 
                    $language='nonenglish';
                 
                 } 
      
               
            
            
           if($type == 'journal' or $type =='thesis' or $type == 'web' ){
                 
                 
                 $result=$target->query("SELECT sourceName FROM `ci_source` WHERE REF = '$query' and ID = '$subquery'");
                 
                 $row=$result->fetchAll(PDO::FETCH_NUM);
                 $number=$result->rowCount();
                 
                 for($i=0;$i<=$number-1;$i++){
                 
                  $source[$i]=$row[$i][0];
                 
                 }
                 
               
                 /*echo '<pre>';
                 print_r($source);
                 echo '</pre>';*/  
                  
                            
             }else{
             
                    $source='';
             }      
             
                  
           $result=$target->query("SELECT num, authorid,redirect FROM ci_author WHERE REF ='$query' and ID = '$subquery'");
           
            if($result->rowCount()> 0){
            
            
            
            
              foreach($result as $row){
              
              
               
                $author[$num][]=$row['authorid'].':'.$row['num'];
                
                
              } 
            }  
      ?>  <form action="" method="post">
           <input type="hidden" name="article" value="<?php echo $query;?>">
      <?php     
        update_form($query,$subquery,$title,$author[$num],$date,array($source[0],$source[1]),$num,$reference,$type,$language,$target);  
     ?>
     
         <input type="submit" name="sub1" value="修改完成">
         </form>
         
         <?php     
       }  
         if($_POST['sub1']){
         
   
         
         $id=$_POST['id'];
         $ref=$_POST['article'];
         $title=$_POST['title'];
         $select=$_POST['select'];
         $source=$_POST['source'];
         $date=$_POST['date'];
         $content=$_POST['content'];
         $author=$_POST['author'];
         $authorID=$_POST['authorID'];
         $article=$_POST['article'];
         $count=$_POST['order'];
         $language=$_POST['language'];
         $newauthor=$_POST['newAuthor'];
         $control=$_POST['control'];
         $newControl=$_POST['newControl'];
         $refid=$ref.$id; 
         for($i=0;$i<=count($authorID)-1;$i++){
         $target->exec("UPDATE `ci_author` SET authorid = '".$author[$i]."',redirect='".$control[$i]."' WHERE num = '".$authorID[$i]."'");
         }
          
          $target->exec("UPDATE `ci_date` SET date = '$date' WHERE REF= '$ref' AND ID= '$id'");
          $target->exec("UPDATE `ci_language` SET lang = '$language' WHERE REF= '$ref' AND ID= '$id'");
          $target->exec("UPDATE `ci_reference_entry` SET reference = '$content' WHERE REF= '$ref' AND ID= '$id'");
          
            // $source_con=$source;
             
             if($select=='journal'){
             
             
               $source_sel=$target->query("SELECT sourceName FROM `ci_source` WHERE REF='$ref' and ID = '$id'");
               
              
                 if($source_sel->rowCount()==0){
                 
                 
                   for($i=0;$i<=count($source)-1;$i++){
                  $target->exec("INSERT INTO `ci_source`(REFID,REF,ID,no,sourceName) VALUES('$refid','$ref','$id','$i','$source[$i]')");
                   }
                   
                   
                 }elseif($source_sel->rowCount()==1){
                 
                    $journalName=$target->query("SELECT sourceName FROM `ci_source` WHERE REF='$ref' and ID = '$id' and no = '0'");
                 
                     if($journalName->rowCount()==0){
                       $target->exec("INSERT INTO `ci_source`(REFID,REF,ID,no,sourceName) VALUES('$refid','$ref','$id',0,'$source[0]')");
                       $target->exec("UPDATE `ci_source` SET `sourceName` = '$source[1]' WHERE REF= '$ref' and ID= '$id' and no ='1'");
                     }
                        
                    $page=$target->query("SELECT sourceName FROM `ci_source` WHERE REF='$ref' and ID = '$id' and no = '1'"); 
                    if($page->rowCount()==0){  
                        $target->exec("INSERT INTO `ci_source`(REFID,REF,ID,no,sourceName) VALUES('$refid','$ref','$id',1,'$source[1]')");
                        $target->exec("UPDATE `ci_source` SET `sourceName` = '$source[0]' WHERE REF= '$ref' and ID= '$id' and no ='0'");
                    } 
                     
                 
                   
                   
                 }elseif($source_sel->rowCount()==2){
                   for($i=0;$i<=count($source)-1;$i++){
                  $target->exec("UPDATE `ci_source` SET `sourceName` = '$source[$i]' WHERE REF= '$ref' and ID= '$id' and no ='$i'");
                  }
                 }
           
          
                }else{
          
              $source_sel=$target->query("SELECT sourceName FROM `ci_source` WHERE REF='$ref' and ID = '$id'");
            if($source_sel->rowCount()>0){
              
              $target->exec("DELETE FROM `ci_source` WHERE REF='$ref' and ID= '$id'");
          
              }
        
          }
          
          
          
          
          
          
          $target->exec("UPDATE `ci_title` SET title = '$title' WHERE REF= '$ref' AND ID= '$id'");
          $target->exec("UPDATE `ci_type` SET type = '$select' WHERE REF= '$ref' AND ID= '$id'");
         
         $key=endKey($newauthor);
          echo $key;
         
          
          for($j=0;$j<=$key;$j++){
          
           if($newauthor[$j]){
           
           if($newControl[$j]=='NULL'){
           $target->exec("INSERT INTO `ci_author`(REFID,REF, ID, authorid,redirect) VALUES ('$refid','$ref', '$id', '".$newauthor[$j]."',0)");
           }else{
           
           $target->exec("INSERT INTO `ci_author`(REFID,REF, ID, authorid, redirect) VALUES ('$refid','$ref', '$id', '".$newauthor[$j]."','".$newControl[$j]."')");
           }
          }
         } 
          
          echo "<SCRIPT Language=javascript>";
          echo 'window.opener.location.reload()';  
          echo "</SCRIPT>";
          
         
          echo "<SCRIPT Language=javascript>";
          echo "window.self.close()"; 
          echo "</SCRIPT>";  
          
          
         }
         
   
   if($_GET['action']=='insert'){
          $ref=$_GET['REF'];
         
          
         
         
         
         //echo $num;
         $result1=$target->query("SELECT count FROM `ci_number` WHERE REF = '$ref'");
         
         
        $row1=$result1->fetch(PDO::FETCH_NUM);
        
     
      ?>
       <form action="" method="post">
           <input type="hidden" name="article" value="<?php echo $ref;?>">
           <input type="hidden" name="sort" value="<?php echo $row1[0];?>">
      <?php     
        insert_form($row1[0]);  
     ?>
     
         <input type="submit" name="sub2" value="修改完成">
         </form>
   
   
   
   
   
    <?php
   
   }
   
   if($_POST['sub2']){
   
     
         
     
    $id=$_POST['id'];
    $REF=$_POST['article'];    
    $type=$_POST['select'];
    $title= $_POST['title'];
    $date= $_POST['date'];
    $language=$_POST['language']; 
    $source= $_POST['source'];    
    $author=$_POST['author'];
    $content=str_replace("\"","",strip_tags($_POST['content'], '<p><em><strong><br>')); 
    $control=$_POST['control'];
    $newControl=$_POST['newControl'];  
    $newAuthor=$_POST['newAuthor'];
    $sort=$_POST['sort'];
    $refid=$REF.$id;
    
     $target->exec("INSERT INTO `ci_reference_entry`(REFID,REF,ID,reference,sort) VALUES('$refid','$REF','$id','$content','$id')");
    if($control=='NULL'){
    
         $target->exec("INSERT INTO `ci_author`(REFID, REF,ID,authorid, redirect) VALUES('$refid','$REF','$id','$author','0')");
    }else{
    
         $target->exec("INSERT INTO `ci_author`(REFID, REF,ID,authorid, redirect) VALUES('$refid','$REF','$id','$author','$control')");
    }
   
    
    $target->exec("INSERT INTO `ci_title`(REFID,REF,ID,title)     VALUES('$refid','$REF','$id','$title')");
    $target->exec("INSERT INTO `ci_date`(REFID, REF,ID,date)      VALUES('$refid','$REF','$id','$date')");
    $target->exec("INSERT INTO `ci_language`(REFID,REF,ID,lang)   VALUES('$refid','$REF','$id','$language')");
    
    
    for($i=0;$i<=count($source)-1;$i++){
    $source_con=$source[$i];
    $target->exec("INSERT INTO `ci_source`(REFID,REF,ID,sourceName) VALUES('$refid','$REF','$id','$source_con')");
    
    
    }
    $target->exec("INSERT INTO `ci_type`(REFID,REF,ID,type) VALUES('$refid','$REF','$id','$type')");
    
   
     $result=$target->query("SELECT `count` FROM `ci_number` WHERE REF= '$ref' ");
     
     $row=$result->fetch(PDO::FETCH_NUM);
     
     if($row[0] <= $id){
      $ID=$id+1;
   $target->exec("UPDATE `ci_number` SET count='$ID' WHERE REF='$REF'");
     }
    
    $key=endKey($newAuthor);
    
    if($newAuthor){
    
    for($i=0;$i<=$key;$i++){
    
        if($newAuthor[$i]!=''){
       
         if($newControl[$i]=='NULL'){
         
            $target->exec("INSERT INTO `ci_author`(REFID,REF,ID,authorid, redirect) VALUES('$refid','$REF','$id','".$newAuthor[$i]."','0')");
         }else{
         
            $target->exec("INSERT INTO `ci_author`(REFID,REF,ID,authorid, redirect) VALUES('$refid','$REF','$id','".$newAuthor[$i]."','".$newControl[$i]."')");
         }
         
    
       }
     }
    }  
   $sort++;
   
  echo "<SCRIPT Language=javascript>";
  echo 'window.opener.addR("'.$REF.'","'.$id.'","'.$content.'")';
   
  echo "</SCRIPT>";
 
  
  echo "<SCRIPT Language=javascript>";
  echo 'window.opener.location.reload()';
   
  echo "</SCRIPT>";
   
  echo "<SCRIPT Language=javascript>";
  echo "window.self.close()"; 
  echo "</SCRIPT>";
   }                 
         
    ?>
