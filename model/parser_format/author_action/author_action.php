<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<?php

function a_check($array,$language,$type){

     if($type=='apa'){
     $author_tmp=preg_split("/(&|＆|(and)|、|amp|;)/x",str_replace(array('<br />','<br>'),'',$array));
      if($language=='english'){
           foreach($author_tmp as $row){
                 $arr.=trim($row);
               
                 }              
        
           if(preg_match_all('/([^\.\/,]+)(,)(\s*[A-Z]\.)+/i',$arr,$arr2)){
                foreach($author_tmp as $row){
                 $authors.=trim($row);
               
                 } 
     
               preg_match_all('/([^\.\/,]+)(,)(\s*[A-Z]\.)+/i', $authors ,$author);
     
            return $author[0];
          }else{
            
            return $author_tmp; 
          }
       
            
    
     }else{
     
        return $author_tmp;
     
     }
     }
     ########################################################################################
     
     if($type=='chicago_bib'){
         $author_tmp=preg_split("/(&|＆|(and)|、|amp|;)/x",str_replace(array('<br />','<br>'),'',$array));
         if($language=='english'){
               foreach($author_tmp as $row){
                 $arr.=trim($row);
               
                 }    
                    if(preg_match_all('/(.+,\s*.+)(,)/Ux',$arr,$arr2)){
                          $author_1=$arr2[1];
                          $string=str_replace($arr2[0][0],'',$arr);
                                                                              //判斷超過一個作者
                           $author_2=explode(',',trim($string));

                           $author=array_merge($author_1,$author_2);

                           

                     }else{

                         
   
                            $author=$author_tmp;
                                                                          //除以上之外

                     }
                 
              return $author;
         
         }else{
         
         
         
         }
         
    
    
    
     } 
     
     if($type=='chicago_note'){
            $author_tmp=preg_split("/(&|＆|(and)|、|amp|;|,)/x",str_replace(array('<br />','<br>'),'',$array));
             
               //$author_arr=explode(',',$arr);  
                 
            return $author_tmp;
     
     }    
     }