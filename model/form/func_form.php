<meta http-equiv="content-type" content="text/html;charset=utf-8">

<?php

  function demo($array,$preg,$title,$author,$date,$resource,$num,$source,$org,$type,$lang,$target,$style){

     
     ?>
     <table border="0" width="100%">
     <tr>
     <td>編號：<input type="hidden" name="<?php echo 'id['.$num.']'; ?>" value="<?php echo $num+1;?>" size="3"><label><?php echo $num+1;?></label></td><td><input type="button" value="X" onclick="del1('<?php echo $num;?>')"></td>
     </tr>
     <tr>
     <td>資源類型：
     <select name="<?php echo 'select['.$num.']'; ?>" id="<?php echo 'select['.$num.']'; ?>" onchange="change('<?php echo 'select['.$num.']'; ?>','<?php echo 'parent_source['.$num.']'; ?>','<?php echo $num; ?>','')">
           <option value="null"> </option>
           <option value='book' <?php if($type=='book'){echo 'selected';}?>>書籍</option> 
           <option value="journal" <?php if($type=='journal'){echo 'selected';}?>>期刊論文</option>
           <option value="thesis" <?php if($type=='thesis'){echo 'selected';}?>>學位論文</option>
           <option value="web" <?php if($type=='web'){echo 'selected';}?>>網路/電子資源</option>
           <option value="newspaper" <?php if($type=='newspaper'){echo 'selected';}?>>報紙</option>
           <option value="conference" <?php if($type=='conference'){echo 'selected';}?>>會議論文</option>
           <option value="tool" <?php if($type=='tool'){echo 'selected';}?>>工具書</option>
           <option value="report" <?php if($type=='report'){echo 'selected';}?>>技術報告</option>
           <option value="other" <?php if($type=='other'){echo 'selected';}?>>其他</option>
      </select>                                      
     　引文條目標題：
        <input type="text" id="<?php echo 'title['.$num.']'; ?>" name="<?php echo 'title['.$num.']'; ?>" value="<?php echo trim($title); ?>" size="20" required="required">
       <?php //$montharr = array("年" => "", "1月" => "", "2月" => "", "3月" => "", "4月" => "", "5月" => "", "6月" => "", "7月" => "", "8月" => "", "9月" => "", "10月" => "", "11月" => "", "12月" => "");  ?> 
     　 引文條目日期(年)(無日期請填0)：<input type="number" min="0" max="9999" required="required" id="<?php echo 'date['.$num.']'; ?>" name="<?php echo 'date['.$num.']'; ?>" value="<?php if(preg_match('/^[民]/s',trim(preg_replace("/[\(\)|（）]/","",$date)))){echo substr(preg_replace("/(民)|[(民國)]/s","",trim(preg_replace("/[\(\)|（）]/","",$date))),0,3)+1911;}else{echo substr(trim(preg_replace("/[\(\)|（）]/","",$date)),0,4); } ?>" size="20">
      
       <span style="border-style:groove">引文條目語言：<input type="radio" name="<?php echo 'language['.$num.']'; ?>" value="english" <?php if($lang=='english'){ echo 'checked';}?>>西文資源<input type="radio" name="<?php echo 'language['.$num.']'; ?>" value="nonenglish" <?php if($lang=='nonenglish'){ echo 'checked';}?>>中文資源</span>
      </td>
      </tr>
       <tr><td colspan="4">

        <span id="<?php echo 'parent_source['.$num.']'; ?>">
        <?php 
        if($type=='journal'){
            
            source($num,'0','期刊名稱：',$resource[0]);
            source($num,'1','引用頁碼：',$resource[1]);
        
        }
        ?>
        </span>
        
        </td></tr>
        <tr><td colspan="4">
        引文條目作者：<br>
        <div id="<?php echo 'authorArea'.$num; ?>">
         <?php 
         
           $autNum=0;
         if($author!='' or $author!=null){
        
         foreach($author as $row){
      
         if($row!='' and $row!='nbsp'){ 
         ?><input type="input" id="<?php echo 'author['.$num.']['.$autNum.']';?>"  name="<?php echo 'author['.$num.']['.$autNum.']';?>" value="<?php echo $row;?>" size="20" onkeyup="check3('../../module/author/check.php','<?php echo 'control['.$num.']['.$autNum.']'; ?>','<?php echo 'authorControl['.$num.']['.$autNum.']'; ?>',{value:this.value},this.value)"> 
         <?php
         
            $chAuthor=str_replace(array('<p>','amp;'),'',trim($row));
            $authorAU=explode(':',authorCheck($chAuthor,$target));
           
            ?>
            <label id="<?php echo 'control['.$num.']['.$autNum.']';?>"  onclick="window.open('open.php?id=<?php echo $authorAU[0];  ?>&label=<?php echo 'control['.$num.']['.$autNum.']';?>&input=<?php echo 'authorControl['.$num.']['.$autNum.']';?>&inputvalue=<?php echo $authorAU[1]; ?>' ,'_blank', config='height=500,width=1000','location=no');"><?php echo $authorAU[0]; ?></label><input type="hidden" id="<?php echo 'authorControl['.$num.']['.$autNum.']';?>" name="<?php echo 'control['.$num.']['.$autNum.']';?>" value="<?php echo $authorAU[1]; ?>"><input type="button" id="<?php echo 'but'.'['.$num.']['.$autNum.']'; ?>" value="X" onclick="delAut2('<?php echo 'authorArea'.$num; ?>', '<?php echo 'author['.$num.']['.$autNum.']'; ?>', '<?php echo 'but'.'['.$num.']['.$autNum.']'; ?>', '<?php echo 'control['.$num.']['.$autNum.']'?>', '<?php echo 'authorControl['.$num.']['.$autNum.']';?>')"> <?php
 
         
         
         $autNum=$autNum+1;
         }
         }
         }else{
         
       
          ?>
          <input type="input" id="<?php echo 'author['.$num.']['.$autNum.']';?>"  name="<?php echo 'author['.$num.']['.$autNum.']';?>" value="<?php echo $row;?>" size="20" onkeyup="check3('../../module/author/check.php','<?php echo 'control['.$num.']['.$autNum.']'; ?>','<?php echo 'authorControl['.$num.']['.$autNum.']'; ?>',{value:this.value},this.value)"> 
         <?php
         
            $chAuthor=str_replace(array('<p>','amp;'),'',trim($row));
           // echo  authorCheck($chAuthor,$target);
            $authorAU=explode(':',authorCheck($chAuthor,$target));
           
            ?>
            <label id="<?php echo 'control['.$num.']['.$autNum.']';?>"  onclick="window.open('open.php?id=<?php echo $authorAU[0];  ?>&label=<?php echo 'control['.$num.']['.$autNum.']';?>&input=<?php echo 'authorControl['.$num.']['.$autNum.']';?>&inputvalue=<?php echo $authorAU[1]; ?>' ,'_blank', config='height=500,width=1000','location=no');"><?php echo $authorAU[0]; ?></label><input type="hidden" id="<?php echo 'authorControl['.$num.']['.$autNum.']';?>" name="<?php echo 'control['.$num.']['.$autNum.']';?>" value="<?php echo $authorAU[1]; ?>"><input type="button" id="<?php echo 'but'.'['.$num.']['.$autNum.']'; ?>" value="X" onclick="delAut2('<?php echo 'authorArea'.$num; ?>', '<?php echo 'author['.$num.']['.$autNum.']'; ?>', '<?php echo 'but'.'['.$num.']['.$autNum.']'; ?>', '<?php echo 'control['.$num.']['.$autNum.']'?>', '<?php echo 'authorControl['.$num.']['.$autNum.']';?>')"> <?php

            
         }
    
          ?>
          </div>
          <tr><td><input type="button" value="添加" onClick=adds2(<?php echo $num;?>)></td></tr>
          
          </td></tr>
          <tr><td colspan="4">                                                                        
     完整條目：<div style="display: none" id="<?php echo 'textarea['.$num.']'; ?>" ><textarea class="ckeditor" name="<?php echo 'content['.$num.']'; ?>" id="<?php echo 'content['.$num.']'; ?>" ><?php echo $org; ?></textarea><input type="button" id="<?php echo 'btn['.$num.']'; ?>" value="完成" onclick="change_text('<?php echo $num; ?>','end')"></div><div id="<?php echo 'div['.$num.']'; ?>" ondblclick="change_text('<?php echo $num; ?>','start')" onMouseUp="select_text('<?php echo $num; ?>')" class="Menu" style="border-style:solid" ><?php echo $org; ?></div><input type="hidden" id="<?php echo 'hide['.$num.']'; ?>" value=""><input type="hidden" id="<?php echo 'number['.$num.']'; ?>" value="<?php echo $num; ?>"></td></tr></table> <?php
     
     }
    
##########################################################################################################################################################################    
    function update_form($ref,$id,$title,$author,$date,$source,$num,$org,$type,$lang,$target){
    $tmp=0;                                                                                                                                   
    
     
     ?>
     <table border="0" width="100%">
     <tr><td>編號：<label><?php echo $ref.$id; ?></label></td></tr>
       <input type="hidden" name="<?php echo 'id'; ?>" value="<?php echo $id; ?>">       
       <tr><td>引文條目種類：<select name="<?php echo 'select'; ?>" id="<?php echo 'select'; ?>" onchange="change('<?php echo 'select'; ?>','<?php echo 'parent_source'; ?>','','single')">
           <option value="null"> </option>
           <option value='book' <?php if($type=='book'){echo 'selected';}?>>書籍</option> 
           <option value="journal" <?php if($type=='journal'){echo 'selected';}?>>期刊論文</option>
           <option value="thesis" <?php if($type=='thesis'){echo 'selected';}?>>學位論文</option>
           <option value="web" <?php if($type=='web'){echo 'selected';}?>>網路/電子資源</option>
           <option value="newspaper" <?php if($type=='newspaper'){echo 'selected';}?>>報紙</option>
           <option value="conference" <?php if($type=='conference'){echo 'selected';}?>>會議論文</option>
           <option value="tool" <?php if($type=='tool'){echo 'selected';}?>>工具書</option>
           <option value="report" <?php if($type=='report'){echo 'selected';}?>>技術報告</option>
           <option value="other" <?php if($type=='other'){echo 'selected';}?>>其他</option> 
           </select>                                      
     　引文條目標題：<input type="input" name="<?php echo 'title'; ?>" value="<?php echo $title; ?>" size="20" required="required">
     　
     　引文條目日期(年)(無日期請填0)：<input type="number" min="1" max="9999" name="<?php echo 'date'; ?>" value="<?php echo $date; ?>" size="20" required="required">
       <span style="border-style:groove">引文條目語言：<input type="radio" name="<?php echo 'language'; ?>" value="english" <?php if($lang=='english'){echo 'checked';}?>>西文資源<input type="radio" name="<?php echo 'language'; ?>" value="nonenglish" <?php if($lang=='nonenglish'){echo 'checked';}?>>中文資源</span></td></tr>
       
     <tr><td colspan="4">

        <span id="<?php echo 'parent_source'; ?>">
        <?php 
        if($type=='journal'){
        
            source(0,'','期刊名稱：',$source[0]);
            source(1,'','引用頁碼：',$source[1]);
        }
        ?>
        </span>
     </td></tr>

     <tr><td colspan="4">  
       引文條目作者：<?php 
        
          $autNum=0;
          ?><div id="authorArea"><?php
          if($author){
          foreach($author as $rowauthor){
             $rowauthoritem= explode(':', $rowauthor);
             
             
            echo '<input type="hidden" id="authorID['.$autNum.']" name="authorID['.$autNum.']" value="'.$rowauthoritem[1].'">';   
            
            $authorAU=explode(':',authorCheck($rowauthoritem[0],$target));
             ?>
            <input type="input" id="<?php echo 'author['.$autNum.']'; ?>" name="<?php echo 'author['.$autNum.']'; ?>" value="<?php echo $rowauthoritem[0]; ?>" size="20" onkeyup="check3('../../module/author/check.php','<?php echo 'control['.$autNum.']'; ?>','<?php echo 'authorControl['.$autNum.']'; ?>',{value:this.value},this.value)">

            <label id="<?php echo 'control['.$autNum.']'; ?>" onclick="window.open('open.php?id=<?php echo $authorAU[0]; ?>&label=<?php echo 'control['.$autNum.']'; ?>&input=<?php echo 'authorControl['.$autNum.']'; ?>&inputvalue=<?php echo $authorAU[1]; ?>' ,'_blank', config='height=500,width=1000','location=no')"><?php echo $authorAU[0]; ?></label><input type="hidden" id="<?php echo 'authorControl['.$autNum.']'; ?>" name="<?php echo 'control['.$autNum.']'; ?>" value="<?php echo $rowauthoritem[0]; ?>"><input type="button" id="<?php echo 'but'.'['.$autNum.']'; ?>" value="X" onclick="delAut('<?php echo 'authorArea'; ?>', '<?php echo 'authorID['.$autNum.']';?>', '<?php echo 'author['.$autNum.']'; ?>', '<?php echo 'but'.'['.$autNum.']'; ?>', '<?php echo $rowauthoritem[1]; ?>','<?php echo 'control['.$autNum.']'; ?>','<?php echo 'authorControl['.$autNum.']';?>')"> <?php
           
            $autNum=$autNum+1;
            
          }
          }
          ?></div>
          <tr><td><input type="button" value="添加" onClick="adds()"></td></tr>
          
          
          <?php                            
          
                                    
        ?> </td></tr><tr><td colspan="4"> 
                                                                         
     完整條目：<textarea  class="ckeditor" name="<?php echo 'content'; ?>" row="5" cols="100" required><?php echo $org; ?></textarea></td></tr>
     <tr><td></td></tr>
     </table>
     
      <?php
     
    
      }
        


##########################################################################################################################################################################
  function insert_form($num){
    $tmp=0;                                  
    $num=$num+1;
     
     ?>
     <table border="0" width="100%">
     <tr><td>條目編號：<label><?php echo $num ?></label></td></tr>
       <input type="hidden" name="id" value="<?php echo $num; ?>">       
       <tr><td>引文條目種類：<select name="select" id="select" onchange="change('select', 'parent_source',0,'single')">
           <option value="null"> </option>
           <option value='book'>書籍</option> 
           <option value="journal" >期刊論文</option>
           <option value="thesis" >學位論文</option>
           <option value="web" >網路/電子資源</option>
           <option value="newspaper">報紙</option>
           <option value="conference" >會議論文</option>
           <option value="tool">工具書</option>
           <option value="report" >技術報告</option>
           <option value="other">其他</option> 
           </select>                                      
     　引文條目標題：<input type="input" name="title" value="" size="20" required="required">
     　
     　引文條目日期(年)(無日期請填0)：<input type="number" min="1" max="9999" name="date" value="" size="20" required="required">
       <span style="border-style:groove">引文條目語言：<input type="radio" name="language" value="english" checked>西文資源<input type="radio" name="language" value="nonenglish">中文資源</span></td></tr>
       
     <tr><td colspan="4">

        <span id="parent_source"></span>
     </td></tr>

     <tr><td colspan="4">  
       引文條目作者：
          <div id="authorArea">
           
             <input type="hidden" id="authorID" name="authorID" value="0">
             <input type="input" id="author" name="author" value="" size="20" onkeyup="check3('../../module/author/check.php','control','authorControl',{value:this.value},this.value)">
            
             <label id="control" onclick="window.open('open.php?id=NULL&label=control&input=authorControl&inputvalue=NULL','_blank', config='height=500,width=1000','location=no')">X</label>
             <input type="hidden" id="authorControl" name="control" value="NULL">
             <input type="button" id="but" value="X" onclick="delAut2('authorArea', 'author', 'but')"> 
          </div>
          <tr><td><input type="button" value="添加" onClick="adds()"></td></tr>
          
          
                                     
          
                                    
        </td></tr><tr><td colspan="4"> 
                                                                         
     完整條目：<textarea  class="ckeditor" name="<?php echo 'content'; ?>" row="5" cols="100" required></textarea></td></tr>
     <tr><td></td></tr>
     </table>
     
      <?php
     
    
      }
      
      
###############################################################################################################################                                                                                      
                                              
      function source($num,$subnum,$word,$resource){
      
       if($subnum==''){
        echo '<span id="source_tag['.$num.']">';                  
        echo '<label id="word['.$num.']">';
        echo $word;
        echo '</label>';
        echo $resource;
        ?><input type="input" id="<?php echo 'source['.$num.']'; ?>" name="<?php echo 'source['.$num.']'; ?>" value="<?php echo trim($resource); ?>" size="20">
        </span>
       <?php
       }else{
        echo '<span id="source_tag['.$num.']['.$subnum.']">';                  
        echo '<label id="word['.$num.']['.$subnum.']">';
        echo $word;
        echo '</label>';
        ?><input type="input" id="<?php echo 'source['.$num.']['.$subnum.']'; ?>" name="<?php echo 'source['.$num.']['.$subnum.']'; ?>" value="<?php echo trim($resource); ?>" size="20">
        </span>
      
      
      <?php
      }
      }



?>

