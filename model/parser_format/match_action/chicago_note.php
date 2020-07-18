<?php

                                       
                                      if(preg_match('/'.$journal[1].'/Ux',$row,$array) ){   
    
                                                $author=a_check($array[1],'english','chicago_note');                                                  
                                                demo($array,$journal[1],$array[3],$author,$array[7],array(trim($array[5]),trim($array[9])),$num,$row,$org,'journal','english',$target,'chicago');
                                               echo '匹配到期刊1';
                                                         /*echo '<pre>';
                                                        print_r($array);
                                                         echo '</pre>';  */
                                       }elseif(preg_match('/'.$journal[2].'/Ux', $row,$array)){
                                                $author=a_check($array[1],'nonenglish','chicago_note');
                                                 demo($array,$journal[2],$array[3],$author,$array[7],array(trim($array[5])),$num,$row,$org,'journal','english',$target,'chicago');
                                                 echo '匹配到期刊2'; 
                                                        /* echo '<pre>';
                                                         print_r($array);
                                                        echo '</pre>';    */
                                       }elseif(preg_match('/'.$journal[3].'/Ux', $row,$array)){
                                                $author=a_check($array[1],'english','chicago_note');
                                                 demo($array,$journal[3],$array[3],$author,$array[7],array(trim($array[5]),trim($array[8])),$num,$row,$org,'journal','nonenglish',$target,'chicago');
                                                  echo '匹配到期刊3'; 
                                                   /*echo '<pre>';
                                                    print_r($array);
                                                   echo '</pre>'; */
                                        }elseif(preg_match('/'.$journal[4].'/Ux', $row,$array)){
                                                $author=a_check($array[1],'english','chicago_note');
                                                 demo($array,$journal[3],$array[3],$author,$array[7],array(trim($array[5])),$num,$row,$org,'journal','nonenglish',$target,'chicago');
                                                 echo '匹配到期刊3'; 
                                                    /* echo '<pre>';
                                                      print_r($array);
                                                     echo '</pre>';  */     
                                        }elseif(preg_match('/'.$conference[1].'/Ux',$row,$array)){
                                        
                                                  $author=a_check($array[1],'english','chicago_note');
                                                 demo($array,$conference[1],$array[3],$author,$array[5],'',$num,$row,$org,'conference','english',$target,'chicago');
                                                  echo '匹配到會議論文1';
                                                  
                                        }elseif(preg_match('/'.$conference[2].'/Ux',$row,$array)){
                                        
                                                  //$author=a_check($array[1],'english','chicago_bib');
                                                 demo($array,$conference[2],$array[4],$array[2],$array[6],'',$num,$row,$org,'conference','nonenglish',$target,'chicago');
                                                  echo '匹配到會議論文2';
                                                             
                                                                                                                     
                                        }elseif(preg_match('/'.$book[1].'/Ux',$row,$array)){
                                                 
                                                  $author=a_check($array[1],'english','chicago_note');                                                                                                 
                                                  demo($array,$book[1],$array[2],$author,$array[4],'',$num,$row,$org,'book','english',$target,'chicago');
                                                  echo '匹配到圖書1';
                                                  /* echo '<pre>';
                                                   print_r($array);
                                                   echo '</pre>'; */
                                        }elseif(preg_match('/'.$book[2].'/Ux',$row,$array)){
                                                  $author=a_check($array[1],'english','chicago_note');  
                                                  demo($array,$book[2],$array[2],$author,$array[5],'',$num,$row,$org,'book','nonenglish',$target,'chicago');
                                                  echo '匹配到圖書2'; 
                                                  
                                        }elseif(preg_match('/'.$thesis[1].'/Ux',$row,$array)){
                                        
                                                  $author=a_check($array[1],'english','chicago_note');
                                                  demo($array,$thesis[1],$array[3],$author,$array[5],'',$num,$row,$org,'thesis','english',$target,'chicago');
                                                   echo '匹配到論文1';
                                                   
                                        }elseif(preg_match('/'.$thesis[2].'/Ux',$row,$array)){
                                                  
                                                  demo($array,$thesis[2],$array[4],$array[2],$array[6],'',$num,$row,$org,'thesis','nonenglish',$target,'chicago');
                                                  echo '匹配到論文2';
                                      
                                                  
                                        }elseif(preg_match('/'.$net[1].'/x',$row,$array)){
                                                   $author=a_check($array[1],'english','chicago_note');
                                                  demo($array,$net[1],$array[3],$author,$array[5],'',$num,$row,$org,'web','english',$target,'chicago');
                                                  echo '匹配到網路1';
                                                 
                                        }elseif(preg_match('/'.$net[2].'/x',$row,$array)){
                                                  
                                                   demo($array,$net[2],$array[2],'',$array[4],'',$num,$row,$org,'web','english',$target,'chicago');
                                                   echo '匹配到網路2';
                                                  
                                        }elseif(preg_match('/'.$net[3].'/x',$row,$array)){
                                                    $author=a_check($array[1],'nonenglish','chicago_note');
                                                   demo($array,$net[3],$array[3],$author,'0','',$num,$row,$org,'web','english',$target,'chicago');
                                                   echo '匹配到網路3';
                                                   
                                        
                                                   
                                        }elseif(preg_match('/'.$net[4].'/x',$row,$array)){
                                                    $author=a_check($array[2],'nonenglish','chicago_note');
                                                   demo($array,$net[4],$array[4],$array[2],$array[6],'',$num,$row,$org,'web','nonenglish',$target,'chicago');
                                                   echo '匹配到網路4';
                                                   
                                        }elseif(preg_match('/'.$net[5].'/x',$row,$array)){
                                        
                                                   demo($array,$net[5],$array[3],'',$array[5],'',$num,$row,$org,'web','nonenglish',$target,'chicago');
                                                   echo '匹配到網路5';           
                                        
                                        }elseif(preg_match('/'.$net[6].'/x',$row,$array)){
                                                    $author=a_check($array[1],'nonenglish','chicago_note');
                                                   demo($array,$net[6],$array[3],$author,'0','',$num,$row,$org,'web','nonenglish',$target,'chicago');
                                                   echo '匹配到網路6';
                                                  /* echo '<pre>';
                                                   print_r($array);
                                                   echo '</pre>';  */
                                                                                                                                         
                                        }else{
                                        
                                                    demo($array,'','','','','',$num,$row,$org,'other','english',$target,'chicago'); 
                                                    echo '執行到其他';
                                        
                                        }
 
