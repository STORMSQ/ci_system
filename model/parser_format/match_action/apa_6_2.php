<?php
//require "../author_action/author_action.php";

                                        if(preg_match($journal[1], $row,$array) ){   
                                                                              
                                                  $author=a_check($array[1],'english','apa');
                                                  
                                                  demo($array,$journal[1],$array[4],$author,$array[2],array(trim($array[6]),trim($array[11])),$num,$row,$org,'journal','english',$target,'apa');
                                                  echo '匹配到期刊1';
       
                                        }elseif(preg_match($journal[2], $row,$array)){

                                                  $author=a_check($array[1],'english','apa');
                                                  demo($array,$journal[2],$array[4],$author,$array[2],array(trim($array[6]),trim($array[11])),$num,$row,$org,'journal','english',$target,'apa');
                                                  echo '匹配到期刊2';    
     
                                        }elseif(preg_match($journal[3], $row,$array)){ 
                                                                                   
                                                  $author=a_check($array[1],'nonenglish','apa');
                                                  demo($array,$journal[3],$array[4],$author,$array[2],array(trim($array[6]),trim($array[11])),$num,$row,$org,'journal','nonenglish',$target,'apa');
                                                  echo '匹配到期刊3';
                       
                                        }elseif(preg_match($journal[4], $row,$array)){  
                                        
                                                  $author=a_check($array[1],'nonenglish','apa');
                                                  demo($array,$journal[4],$array[4],$author,$array[2],array(trim($array[6]),trim($array[11])),$num,$row,$org,'journal','nonenglish',$target,'apa');
                                                  echo '匹配到期刊4';
                                       
###############################################################################################################################################################################################################################                                                   
                                        }elseif(preg_match($conference[1],$row,$array)){
                                                 
                                                 $author=a_check($array[1],'english','apa');
                                                 demo($array,$conference[1],$array[4],$author,$array[2],'',$num,$row,$org,'conference','english',$target,'apa');
                                                  echo '匹配到會議論文1';
                                                  
                                        }elseif(preg_match($conference[2],$row,$array)){
                                                 
                                                 $author=a_check($array[1],'english','apa');
                                                 demo($array,$conference[2],$array[4],$author,$array[2],'',$num,$row,$org,'conference','english',$target,'apa');
                                                  echo '匹配到會議論文2';
                                                             
                                        }elseif(preg_match($conference[3],$row,$array)){
                                                 
                                                 $author=a_check($array[1],'nonenglish','apa');
                                                 demo($array,$conference[3],$array[4],$author,$array[2],'',$num,$row,$org,'conference','nonenglish',$target,'apa');
                                                  echo '匹配到會議論文3';
                                        }elseif(preg_match($conference[4],$row,$array)){
                                                 
                                                 $author=a_check($array[1],'nonenglish','apa');
                                                 demo($array,$conference[4],$array[4],$author,$array[2],'',$num,$row,$org,'conference','nonenglish',$target,'apa');
                                                  echo '匹配到會議論文4';            
                                        }elseif(preg_match($conference[5],$row,$array)){
                                                 
                                                 $author=a_check($array[1],'english','apa');
                                                 demo($array,$conference[5],$array[4],$author,$array[2],'',$num,$row,$org,'conference','english',$target,'apa');
                                                  echo '匹配到會議論文5'; 
                                        }elseif(preg_match($conference[6],$row,$array)){
                                                 
                                                 $author=a_check($array[1],'english','apa');
                                                 demo($array,$conference[6],$array[4],$author,$array[2],'',$num,$row,$org,'conference','english',$target,'apa');
                                                  echo '匹配到會議論文6'; 
                                        }elseif(preg_match($conference[7],$row,$array)){
                                                 
                                                 $author=a_check($array[1],'english','apa');
                                                 demo($array,$conference[7],$array[4],$author,$array[2],'',$num,$row,$org,'conference','english',$target,'apa');
                                                  echo '匹配到會議論文7'; 
                                                                     
                                        }elseif(preg_match($conference[8],$row,$array)){
                                                 
                                                 $author=a_check($array[1],'nonenglish','apa');
                                                 demo($array,$conference[8],$array[4],$author,$array[2],'',$num,$row,$org,'conference','nonenglish',$target,'apa');
                                                   echo '匹配到會議論文8';   
                                        
                                       
################################################################################################################################################################################################################################                                        
                                        }elseif(preg_match($report[1],$row,$array)){
                                                  
                                                  $author=a_check($array[1],'english','apa');
                                                  demo($array,$report[1],$array[4],$author,$array[2],'',$num,$row,$org,'report','english',$target,'apa');
                                                  echo '匹配到報告1';
                                                            
                                        }elseif(preg_match($report[2],$row,$array)){
                                                  
                                                  $author=a_check($array[1],'nonenglish','apa');
                                                  demo($array,$report[2],$array[4],$author,$array[2],'',$num,$row,$org,'report','nonenglish',$target,'apa');
                                                  echo '匹配到報告2';
                                                  
################################################################################################################################################################################################################################                                                   
                                        }elseif(preg_match($tool[1],$row,$array)){
                                                  
                                                  $author=a_check($array[1],'english','apa');
                                                  demo($array,$tool[1],$array[7],$author,$array[5],'',$num,$row,$org,'tool','english',$target,'apa');
                                                  echo '匹配到工具書1';
                                        }elseif(preg_match($tool[2],$row,$array)){
                                                  
                                                  $author=a_check($array[1],'english','apa');
                                                  demo($array,$tool[2],$array[4],$author,$array[2],'',$num,$row,$org,'tool','english',$target,'apa');
                                                  echo '匹配到工具書2';
                                        }elseif(preg_match($tool[3],$row,$array)){
                                                  
                                                  //$author=a_check($array[1],'english','apa');
                                                  demo($array,$tool[3],$array[1],'',$array[2],'',$num,$row,$org,'tool','english',$target,'apa');
                                                  echo '匹配到工具書3';                                                              
                                        }elseif(preg_match($tool[4],$row,$array)){
                                                  
                                                  $author=a_check($array[1],'nonenglish','apa');
                                                  demo($array,$tool[4],$array[7],$author,$array[5],'',$num,$row,$org,'tool','nonenglish',$target,'apa');
                                                  echo '匹配到工具書4';
                                        }elseif(preg_match($tool[5],$row,$array)){
                                                 
                                                  $author=a_check($array[1],'nonenglish','apa'); 
                                                  demo($array,$tool[5],$array[4],$author,$array[2],'',$num,$row,$org,'tool','nonenglish',$target,'apa');
                                                  echo '匹配到工具書5';
                                        }elseif(preg_match($tool[6],$row,$array)){
                                                  
                                                  //$author=a_check($array[1],'english','apa');
                                                  demo($array,$tool[6],$array[1],'',$array[2],'',$num,$row,$org,'tool','nonenglish',$target,'apa');
                                                  echo '匹配到工具書6';           
                                        
################################################################################################################################################################################################################################                                        
                                        }elseif(preg_match($book[1],$row,$array)){
    
                                                  $author=a_check($array[1],'english','apa');
                                                  demo($array,$book[1],$array[4],$author,$array[2],'',$num,$row,$org,'book','english',$target,'apa');
                                                  echo '匹配到圖書1';
                                                  
                                        }elseif(preg_match($book[2],$row,$array)){
                                        
                                                  $author=a_check($array[1],'nonenglish','apa');
                                                  demo($array,$book[2],$array[4],$author,$array[2],'',$num,$row,$org,'book','nonenglish',$target,'apa');
                                                  echo '匹配到圖書2'; 
  
################################################################################################################################################################################################################################                                                  
                                        }elseif(preg_match($thesis[1],$row,$array)){
                                                  
                                                  $author=a_check($array[1],'english','apa');
                                                  demo($array,$thesis[1],$array[4],$author,$array[2],'',$num,$row,$org,'thesis','english',$target,'apa');
                                                   echo '匹配到論文1';
                                                   
                                        }elseif(preg_match($thesis[2],$row,$array)){
                                                  
                                                  $author=a_check($array[1],'nonenglish','apa');
                                                  demo($array,$thesis[2],$array[4],$author,$array[2],'',$num,$row,$org,'thesis','nonenglish',$target,'apa');
                                                  echo '匹配到論文2';


################################################################################################################################################################################################################################
                                                  /*
                                        }elseif(preg_match($report[1],$row,$array)){
                                                  
                                                  demo($array,$report[1],$array[4],$array[1],$array[2],'',$num,$row,$org,'report','english',$target,'apa');
                                                  echo '匹配到報告1';
                                                            
                                        }elseif(preg_match($report[2],$row,$array)){
                                                  
                                                  demo($array,$report[2],$array[4],$array[1],$array[2],'',$num,$row,$org,'report','nonenglish',$target,'apa');
                                                  echo '匹配到報告2';           
                                          */       

################################################################################################################################################################################################################################                                                  
                                        }elseif(preg_match($net[1],$row,$array)){
                                                 
                                                  $author=a_check($array[1],'english','apa');
                                                  demo($array,$net[1],$array[4],$author,$array[2],'',$num,$row,$org,'web','english',$target,'apa');
                                                  echo '匹配到網路1';
                                                 
                                        }elseif(preg_match($net[2],$row,$array)){
                                        
                                                   $author=a_check($array[1],'english','apa');
                                                   demo($array,$net[2],$array[4],$author,$array[2],'',$num,$row,$org,'web','english',$target,'apa');
                                                   echo '匹配到網路2';
                                                  
                                        }elseif(preg_match($net[3],$row,$array)){
                                        
                                                   //$author=a_check($array[1],'english','apa');
                                                   demo($array,$net[3],$array[1],'','','',$num,$row,$org,'web','english',$target,'apa');
                                                   echo '匹配到網路3';
                                                   
                                        }elseif(preg_match($net[4],$row,$array)){
                                        
                                                   $author=a_check($array[1],'nonenglish','apa');
                                                   demo($array,$net[4],$array[4],$author,$array[2],'',$num,$row,$org,'web','nonenglish',$target,'apa');
                                                   echo '匹配到網路4';
                                                   
                                        }elseif(preg_match($net[5],$row,$array)){
                                        
                                                   $author=a_check($array[1],'nonenglish','apa');
                                                   demo($array,$net[5],$array[4],$author,$array[2],'',$num,$row,$org,'web','nonenglish',$target,'apa');
                                                   echo '匹配到網路5';           
                                        
                                        
                                        }elseif(preg_match($net[6],$row,$array)){
                                        
                                                   //$author=a_check($array[1],'english','apa');
                                                   demo($array,$net[6],$array[1],'','','',$num,$row,$org,'web','nonenglish',$target,'apa');
                                                   echo '匹配到網路6';
                                                                                                                                                    
                                        
################################################################################################################################################################################################################################                                        
                                        }elseif(preg_match($newspaper[1],$row,$array)){
    
                                                 $author=a_check($array[1],'english','apa');
                                                 demo($array,$newspaper[1],$array[4],$author,$array[2],array($array[6]),$num,$row,$org,'newspaper','english',$target,'apa');
                                                 echo '匹配到報紙1';
                                                  
                                        }elseif(preg_match($newspaper[2],$row,$array)){   
                                                 
                                                 //$author=a_check($array[1],'english','apa');
                                                 demo($array,$newspaper[2],$array[1],'',$array[2],array($array[4]),$num,$row,$org,'newspaper','english',$target,'apa');
                                                 echo '匹配到報紙2';          
                                                
                                        }elseif(preg_match($newspaper[3],$row,$array)){                                                 
                                                 
                                                 $author=a_check($array[1],'nonenglish','apa');
                                                 demo($array,$newspaper[3],$array[4],$author,$array[2],array($array[6]),$num,$row,$org,'newspaper','nonenglish',$target,'apa');
                                                  echo '匹配到報紙3';        
                                        }elseif(preg_match($newspaper[4],$row,$array)){
                                                 
                                                 // $author=a_check($array[1],'english','apa');
                                                 demo($array,$newspaper[4],$array[1],'',$array[2],array($array[4]),$num,$row,$org,'newspaper','nonenglish',$target,'apa');
                                                  echo '匹配到報紙4';
                                               
                                        }else{
   
                                              demo($array,'','','','','',$num,$row,$org,'other','nonenglish',$target,'apa');  
                                           
                           
                                                        
                                              
                                              }                            