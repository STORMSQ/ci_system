<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<title>輸入結果</title>
<script src="../editor/Result/ckeditor.js"></script>
<script type="text/javascript" src="../js/config.js"></script>
<script type="text/javascript" src="../ajax/ci_function.js"></script>
<script type="text/javascript" src="../ajax/ci_ajax.js"></script>
                             
<script src=""></script>   

</head>
<body>
<?php


  require "../../sysfunction/connect.php"; 
  require "../form/func_form.php";
  require "../action/select.func.php"; 
  require "../../option/option.php";
  require "../parser_format/author_action/author_action.php";
  
   
  
  
        if($_POST['submit']){
  
  
         if($_POST['value']){
         
           $article=$_POST['value'];
         
         }else{
        $result=$pdo->query("SELECT ".ARTICLEID.",".CHITITLE.",".ENGTITLE." FROM ".ARTICLE." WHERE ".CHITITLE." = '".$_POST['article']."' or ".ENGTITLE." = '".$_POST['article']."'");
  
          $rows=$result->fetch(PDO::FETCH_NUM);

  
         $article=$rows[0];
          if($result->rowCount()!=0){
                   
                   $edit=$target->query("SELECT * FROM `ci_reference_entry` WHERE REF = '$article'");
                          
                          if($edit->rowCount()>0){
                          
                              echo '此篇文章已經建立過引文資料，如想修改引文資料，請使用修改功能';
                              exit;
                          }
           }else{
           
           echo '<font color="red">找不到文章，請退回去重來</font>';
           exit;
           }
                                      
           
          }     
              
############################
                  $format_type=$_POST['format_type'];
                  //echo $_POST['reference'];
            if($_POST['reference']){
                    
                    

                          
                   
                   echo '<h1>以下為輸入結果</h1>';
                   echo '<h2>請仔細核對每筆引文資料對應的欄位</h2>';
                   
                          
                        
                          $arr=explode('</p>'     , $_POST['reference']);
                     
                     
                     
                          
                          array_pop($arr);
                          
                        
                           
                           echo '<form action="parser_data_detail.php" method="post" target="_parent">';
                           echo '<input type="hidden" name="articleId" value="'.$article.'">';
                           echo '<input type="hidden" name="style" value="'.$_POST['style'].'">';                          
                            $stringlen=strlen(strtr($article,array('/' => '')));
                            $str= strtr($article,array('/' => ''));
                            
                            if($stringlen <= 5){
                              
                              
                               echo '卷期：第<input type="number" max="999" min="1" name="vo" value="'.substr($str,0,2).'" size="3">卷，第<input type="number" name="ls" max="999" min="1" value="'.substr($str,2,1).'" size="3">期<br>';
                            
                            }elseif($stringlen > 5 ){
                              
                               echo '卷期：第<input type="number" max="999" min="1" name="vo" value="'.substr($str,0,3).'" size="3">卷，第<input type="number" name="ls" max="999" min="1" value="'.substr($str,3,1).'" size="3">期<br>';
                            
                            }
                           
                           
                           
                          
                           $num=0;
                           
                             
                           
                                 
                                   echo '<table border="1" id="parent" width="100%">';
                                   echo '<tbody>';
                                   
      
                                  foreach($arr as $rows){
                                     
                                     
                                    $text=strip_tags($rows);
                                    if(preg_match('/\d+|[A-Za-z]+/',$text,$arr2)){
                                    
                                  
                                    
                                    ?>
                                     <tr id="<?php echo $num; ?>" align=""><td>
                                     <?php
                                     
                                          $org=str_replace('\'','’',$rows);
                                          $row=strip_tags($rows);
                                         //******************************************************************************************************************
                                            if($format_type=='apa_6'){       //使用APA第六版
                                            require "../parser_format/match_rule/apa_6.php"; 
                                            require "../parser_format/match_action/apa_6.php";
                                                                                        
                                            }
                                            
                                            
                                            if($format_type=='manual_auto'){     //使用手動輸入1
                                            
                                             demo($array,'','','','','',$num,$row,$org,'null','english',$target,'other');
                                            
                                            
                                            }
                                            
                                            if($format_type=='manual_operation'){     //使用手動輸入2
                                            
                                             demo('null','','','','','',$num,$row,$org,'null','english',$target,'other');
                                            
                                            
                                            }
                                            
                                            if($format_type=='chicago_bib'){
                                            
                                             require "../parser_format/match_rule/chicago_note_bib.php"; 
                                             require "../parser_format/match_action/chicago_note_bib.php";
                                            
                                            }
                                            
                                            if($format_type=='chicago_note'){
                                            
                                             require "../parser_format/match_rule/chicago_note.php"; 
                                             require "../parser_format/match_action/chicago_note.php";
                                            
                                            }
                                       
                                        //************************************************************************************************************************      
                                             echo '</td></tr>';
                                              
                                              $num=$num+1;
                                              }   
                                              }
                                            echo '</tbody>';   
                                            echo '</table>';                                                      
                                            ?>
                                            <div id="buttonchange">
                                             <input type="button" id="first" value="增加一個欄位" onclick="addarea1('<?php echo $num; ?>')">
                                            </div> 
                                             <input type="hidden" name="count" value="<?php echo $num; ?>"> 
                                
                                             <input type="submit" name="sub" value="送出">
                               
                                              </form>      
                                           <?php
                             
                             
                           
                         
                           
                        
     
             }      
                  
                  
                  
                  
     
         }else{
         
          echo '<font color="red">你不可以直接訪問這個頁面</font>';
         
         
         }    
     echo '</div>';
     
     
     
     #################################################################################################以下為專用函數#######################################################


            
   
?>
<div id="list">
<div class="contextMenu" id="Menu1">
      <ul>
        <li id="title"><a>標題</a></li>
        <li id="date"><a>日期</a></li>
        <li id="journal"><a>期刊名稱</a></li> 
        <li id="author"><a>作者</a></li>       
      </ul>
    </div> 
</div>    
<script>

             
           
  // var i= '"journa": function(t) {  var number=t.nextSibling.nextSibling.value;  var source =document.getElementById("source["+number+"][0]");  source.value=t.nextSibling.value;    }';     
                       
            
            
   /*        
   $('div.Menu').contextMenu('Menu1', 
          {
           
            bindings: 
            {
             
             'title': function(t) {
             var number=t.nextSibling.nextSibling.value;
             var title =document.getElementById('title['+number+']');            
             title.value=t.nextSibling.value;
                
            },
              'date': function(t) {
             var number=t.nextSibling.nextSibling.value;
             var date =document.getElementById('date['+number+']');            
             date.value=t.nextSibling.value;
            },
              'journal': function(t) {
             var number=t.nextSibling.nextSibling.value;
             var source =document.getElementById('source['+number+'][0]');            
             source.value=t.nextSibling.value;
            },
            
           
             'author': function(t) {
             var number=t.nextSibling.nextSibling.value;
             var author=document.getElementById('authorArea'+number);
             //var number =(getChildNodes(author,'getNumber').length)/3;
             var author=getChildNodes(author,'nongetNumber');
             var authorValue = t.nextSibling.value;
             var url='';
             for(var x=0; x <= author.length-1; x++){
             
               if(x==0){
                  url=author[x].id;
               }else{
               
                  url+='<==>'+author[x].id;
               }
             
             }
             
             window.open('author.open.php?ns='+number+'&member='+url+'&value='+authorValue,'_blank',"config='height=500,width=500','location=no");            
             
            }
             
            
            
            
            
          }

     });
    */         
    
 
 
 
 
 
 
 
 
 
 
 
 

 
</script>

</body> 
<script type="text/javascript" src="../js/contextMenu.func.js"></script>                                                                                                                 
</html>

