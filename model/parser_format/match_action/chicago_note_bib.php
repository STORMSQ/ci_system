<?php

                                        if(preg_match('/'.$journal[1].'/Ux',$row,$array) ){   
    
                                                  $author=a_check($array[1],'english','chicago_bib');                                                  
                                                  demo($array,$journal[1],$array[3],$author,$array[11],array(trim($array[7])),$num,$row,$org,'journal','english',$target,'chicago');
                                                  echo '匹配到期刊1';
                                                  
        
                                        }elseif(preg_match('/'.$journal[2].'/Ux', $row,$array)){

                                                  demo($array,$journal[1],$array[3],$array[2],$array[7],trim($array[6]),$num,$row,$org,'journal','english',$target,'chicago');
                                                  echo '匹配到期刊2';    
     
      
                                        }elseif(preg_match('/'.$conference[1].'/Ux',$row,$array)){
                                        
                                                  $author=a_check($array[2],'english','chicago_bib');
                                                 demo($array,$conference[1],$array[4],$author,$array[6],'',$num,$row,$org,'conference','english',$target,'chicago');
                                                  echo '匹配到會議論文1';
                                                  
                                        }elseif(preg_match('/'.$conference[2].'/Ux',$row,$array)){
                                        
                                                  $author=a_check($array[1],'english','chicago_bib');
                                                 demo($array,$conference[2],$array[5],$author,$array[7],'',$num,$row,$org,'conference','english',$target,'chicago');
                                                  echo '匹配到會議論文2';
                                                             
                                        }elseif(preg_match('/'.$conference[3].'/Ux',$row,$array)){
                                                 
                                                 demo($array,$conference[3],$array[4],$array[2],$array[6],'',$num,$row,$org,'conference','nonenglish',$target,'chicago');
                                                  echo '匹配到會議論文3'; 
                                        }elseif(preg_match('/'.$conference[4].'/Ux',$row,$array)){
                                                 
                                                 demo($array,$conference[4],$array[5],$array[1],$array[7],'',$num,$row,$org,'conference','nonenglish',$target,'chicago');
                                                  echo '匹配到會議論文4';            

                                      /*  }elseif(preg_match($report[1],$row,$array)){
                                                  
                                                  demo($array,$report[1],$array[4],$array[1],$array[2],'',$num,$row,$org,'report','english',$target);
                                                  echo '匹配到報告1';
                                                            
                                        }elseif(preg_match($report[2],$row,$array)){
                                                  
                                                  demo($array,$report[2],$array[4],$array[1],$array[2],'',$num,$row,$org,'report','nonenglish',$target);
                                                  echo '匹配到報告2'; */
                                        }elseif(preg_match('/'.$tool[1].'/Ux',$row,$array)){
                                                  //$author=a_check($array[1],'english','chicago');
                                                  demo($array,$tool[1],$array[5],'','','',$num,$row,$org,'tool','english',$target,'chicago');
                                                  echo '匹配到工具書1';
                                                                                                  
                                        }elseif(preg_match('/'.$tool[2].'/Ux',$row,$array)){
                                                  
                                                  demo($array,$tool[2].'/Ux',$array[4],'','','',$num,$row,$org,'tool','nonenglish',$target,'chicago');
                                                  echo '匹配到工具書4';
                                               
                                        }elseif(preg_match('/'.$book[1].'/x',$row,$array)){
                                                 
                                                  $author=a_check($array[1],'english','chicago_bib');
                                                                                                  
                                                  demo($array,$book[1],$array[4],$author,$array[5],'',$num,$row,$org,'book','english',$target,'chicago');
                                                  echo '匹配到圖書1';
                                                  
                                        }elseif(preg_match('/'.$book[2].'/x',$row,$array)){
                                        
                                                  demo($array,$book[2],$array[3],$array[2],$array[4],'',$num,$row,$org,'book','nonenglish',$target,'chicago');
                                                  echo '匹配到圖書2'; 
                                                  
                                        }elseif(preg_match('/'.$thesis[1].'/Ux',$row,$array)){
                                        
                                                  $author=a_check($array[1],'english','chicago_bib');
                                                  demo($array,$thesis[1],$array[3],$author,$array[7],'',$num,$row,$org,'thesis','english',$target,'chicago');
                                                   echo '匹配到論文1';
                                                   
                                        }elseif(preg_match('/'.$thesis[2].'/Ux',$row,$array)){
                                                  
                                                  demo($array,$thesis[2],$array[3],$array[1],$array[5],'',$num,$row,$org,'thesis','nonenglish',$target,'chicago');
                                                  echo '匹配到論文2';
                                      
                                                  
                                        }elseif(preg_match('/'.$net[1].'/Ux',$row,$array)){
                                                   $author=a_check($array[1],'english','chicago_bib');
                                                  demo($array,$net[1],$array[3],$author,$array[5],'',$num,$row,$org,'web','english',$target,'chicago');
                                                  echo '匹配到網路1';
                                                 
                                        }elseif(preg_match('/'.$net[2].'/Ux',$row,$array)){
                                                  
                                                   demo($array,$net[2],$array[2],'',$array[4],'',$num,$row,$org,'web','english',$target,'chicago');
                                                   echo '匹配到網路2';
                                                  
                                     
                                                   
                                        }elseif(preg_match('/'.$net[3].'/Ux',$row,$array)){
                                        
                                                   demo($array,$net[3],$array[3],$array[1],$array[5],'',$num,$row,$org,'web','nonenglish',$target,'chicago');
                                                   echo '匹配到網路4';
                                                   
                                        }elseif(preg_match('/'.$net[4].'/Ux',$row,$array)){
                                        
                                                   demo($array,$net[4],$array[2],'',$array[4],'',$num,$row,$org,'web','nonenglish',$target,'chicago');
                                                   echo '匹配到網路5';           
                                        
                                                                                                                                           
                                        }elseif(preg_match('/'.$newspaper[1].'/Ux',$row,$array)){
                                                 $author=a_check($array[6],'english','chicago_bib');
                                                 demo($array,$newspaper[1],$array[4],$author,$array[2],$array[7],$num,$row,$org,'newspaper','english',$target,'chicago');
                                                 echo '匹配到報紙1';
                                                  
                                        
                                        }elseif(preg_match('/'.$newspaper[2].'/Ux',$row,$array)){                                                 
                                                 demo($array,$newspaper[2],$array[4],$array[6],$array[2],$array[7],$num,$row,$org,'newspaper','nonenglish',$target,'chicago');
                                                  echo '匹配到報紙3';        
                                       
                                               
                                        }else{
   
                                              demo($array,'','','','','',$num,$row,$org,'other','nonenglish',$target,'chicago');  
                                           
                           
                                                        
                                              
                                              }
                                              
                                             
 
