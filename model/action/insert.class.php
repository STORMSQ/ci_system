<?php



class Insert{
 
 private $pdo;
 private $articleId;
 private $id;
 private $vol;
 private $select;
 private $author='';
 private $newAuthor='';
 private $title='';
 private $source='';
 private $language;
 private $date='';
 private $content='';
 private $refNum;
 private $count;
 private $start;
 private $control;
 private $newControl;
 private $style;
 
function __construct($pdo,$option){

 $this->pdo=$pdo;
 foreach($option as $key=>$val){
		
			$this->set($key,$val);
 }

} 

private function set($key,$val){

   $this->$key=$val;
}  
  /* 1. pdo輸入
  *  2. 文章編號
  *  3. 文章卷期
  *  4. 條目編號  
  *  5. 條目類型
  *  6. 條目作者
  *  7. 條目標題
  *  8. 條目資源
  *  9. 條目語言
  *  10.條目日期
  *  11.條目內容
  *  12.條目出現次數  
  *  13.引文數量                   
  */ 
  
function insertdata(){

//全部引文

   
   
    $k = array_slice($this->id,-1,1,true);
       
       foreach($k as $key=>$rows){
       $key1=$key;
       }
       
       $this->number($this->articleId,$this->vol,$this->id[$key1]);   
     for($i=0;$i<=$key1;$i++){
       $j=$i+1;
         if($this->id[$i]){
         
        
     
         if($this->entry($this->articleId,$this->id[$i],$this->content[$i],$j)){
        
            $return.='<p><font size="3" color="green">條目內容'.$this->content[$i].'輸入成功</font></p>';
        }else{
            $return.='<p><font size="3" color="red">條目內容'.$this->content[$i].'輸入失敗</font></p>';
        
        }
          //$this->number($this->articleId,$this->vol,$this->count);
          $this->style($this->articleId,$this->style);
     
      //標題輸入
        if($this->title($this->articleId,$this->id[$i],$this->title[$i])){
        
            $return.='<p><font size="3" color="green">條目標題'.$this->title[$i].'輸入成功</font></p>';
        }else{
        
            $return.='<p><font size="3" color="red">條目標題'.$this->title[$i].'輸入失敗</font></p>';
        
        }
     
        //日期輸入        
        if($this->date($this->articleId,$this->id[$i],$this->date[$i])){
        
            $return.='<p><font size="3" color="green">條目日期'.$this->date[$i].'輸入成功</font></p>';
        }else{
        
            $return.='<p><font size="3" color="red">條目日期'.$this->date[$i].'輸入失敗</font></p>';
        }
        
        
        
        //資源輸入
        
        
        if($this->select[$i]=='journal'){
        
        $source_arr=endkey($this->source[$i]);
        
        for($j=0;$j<=$source_arr;$j++){
        if($this->source($this->articleId,$this->id[$i],$this->source[$i][$j],$j)){
        
            $return.='<p><font size="3" color="green">條目資源'.$this->source[$i][$j].'輸入成功</font></p>';
        }else{
            $return.='<p><font size="3" color="red">條目資源'.$this->source[$i][$j].'輸入失敗</font></p>';
        }
        
        }
        }
       
       
       
        if($this->type($this->articleId,$this->id[$i],$this->select[$i])){
        
            $return.='<p><font size="3" color="green">條目類別'.$this->select[$i].'輸入成功</font></p>';
        }else{
            $return.='<p><font size="3" color="red">條目類別'.$this->select[$i].'輸入失敗</font></p>';
        }
        
        
        
        
        if($this->language($this->articleId,$this->id[$i],$this->language[$i])){
        
            $return.='<p><font size="3" color="green">條目語言'.$this->language[$i].'輸入成功</font></p>';
        }else{
            $return.='<p><font size="3" color="red">條目語言'.$this->language[$i].'輸入失敗</font></p>';
        
        }
       
        $authors=endKey($this->author[$i]);
        
        
        for($j=0;$j<=$authors;$j++){
        
        
          if($this->author[$i][$j]){
          
            if($this->control[$i][$j]=='NULL'){
                 if($this->author($this->articleId,$this->id[$i],$this->author[$i][$j],0)){
                $return.='<p><font size="3" color="green">條目作者'.$this->author[$i][$j].'輸入成功</font></p>';
           
                }else{
                         $return.='<p><font size="3" color="red">條目作者'.$this->authors[$j].'輸入失敗</font></p>';
                } 
            
           
            }else{
               
          
               if($this->author($this->articleId,$this->id[$i],$this->author[$i][$j],$this->control[$i][$j])){
                $return.='<p><font size="3" color="green">條目作者'.$this->author[$i][$j].'輸入成功</font></p>';
           
                }else{
                         $return.='<p><font size="3" color="red">條目作者'.$this->author[$i][$j].'輸入失敗</font></p>';
                } 
           }
          }
        
        
        
        
        }
       
        
        
        
        if($this->newAuthor[$i]!='' or $this->newAuthor[$i]!=null ){
        $authors1=endKey($this->newAuthor[$i]);
        
        for($k=0;$k<=$authors1;$k++){
        
        if($this->newAuthor[$i][$k]){
        
            if($this->newControl[$i][$k]=='NULL'){
            
                if($this->author($this->articleId,$this->id[$i],$this->newAuthor[$i][$k],0)){
                $return.='<p><font size="3" color="green">條目作者'.$this->newAuthor[$i][$k].'輸入成功</font></p>';
           
                }else{
                $return.='<p><font size="3" color="red">條目作者'.$this->newAuthor[$i][$k].'輸入失敗</font></p>';
                } 
            
            
            }else{
            
                if($this->author($this->articleId,$this->id[$i],$this->newAuthor[$i][$k],$this->newCountrol[$i][$k])){
                $return.='<p><font size="3" color="green">條目作者'.$this->newAuthor[$i][$k].'輸入成功</font></p>';
           
                }else{
                $return.='<p><font size="3" color="red">條目作者'.$this->newAuthor[$i][$k].'輸入失敗</font></p>';
                } 
            
            
            
            }
        
        
        }
        
        
        
        }
        
        
      }
    
         
           
     $return.='<hr>';
     }
    }
    

     
return $return;
}

private function style($articleId,$style){

    if(!$this->pdo->exec("INSERT INTO `ci_style`(REF,style) VALUES('$articleId','$style')")){
            
            return false;                  
                            
            }else{
            return true;
        }



}


private function number($articleId,$vol,$count){

              if(!$this->pdo->exec("INSERT INTO `ci_number`(REF,vol,count) VALUES('$articleId','$vol','$count')")){
   
                return false;
              }else{
   
   
                 return true;
              }
}

private function title($articleId,$id,$title){
        $refid=$articleId.$id;
        if(!$this->pdo->exec("INSERT INTO `ci_title`(REFID,REF,ID,title) VALUES('$refid','$articleId','$id','$title')")){
            
            return false;                  
                            
            }else{
            return true;
        }

}

private function date($articleId,$id,$date){
       $refid=$articleId.$id;
       if(!$this->pdo->exec("INSERT INTO `ci_date`(REFID,REF,ID,date) VALUES('$refid','$articleId','$id','$date')")){
       
        return false; 
       
       }else{
       
        return true;
       }
                           


}
private function type($articleId,$id,$type){
      $refid=$articleId.$id;
      if(!$this->pdo->exec("INSERT INTO `ci_type`(REFID,REF,ID,type) VALUES('$refid','$articleId','$id','$type')")){
       
        return false; 
       
       }else{
       
        return true;
       }


}

private function source($articleId,$id,$source,$j){
      $refid=$articleId.$id;
      if(!$this->pdo->exec("INSERT INTO `ci_source`(REFID,REF,ID,no,sourceName) VALUES('$refid','$articleId','$id','$j','$source')")){
      
        return false;
      }else{
      
        return true;
      }



}

private function author($articleId,$id,$author,$redir){

      $refid=$articleId.$id;           
      if(!$this->pdo->exec("INSERT INTO `ci_author`(REFID,REF,ID,authorid, redirect) VALUES('$refid','$articleId','$id','$author','$redir')")){
        
        return false;
      
      }else{
      
        return true;
       
               
   }

}

private function newAuthor($articleId,$id,$newAuthor){
      $refid=$articleId.$id;
      if(!$this->pdo->exec("INSERT INTO `ci_author`(REFID,REF,ID,authorid) VALUES('$refid','$articleId','$id','$newAuthor')")){
        
        return false;
      
      }else{
      
        return true;
       
               
   }

}

private function entry($articleId,$id,$content,$num){
      $refid=$articleId.$id;
      if(!$this->pdo->exec("INSERT INTO `ci_reference_entry`(REFID,REF,ID,reference,sort) VALUES('$refid','$articleId','$id','$content','$num')")){
      
          return false;
      }else{
      
          return true;
      }

}
private function language($articleId,$id,$language){
     $refid=$articleId.$id;
     if(!$this->pdo->exec("INSERT INTO `ci_language`(REFID,REF,ID,lang) VALUES('$refid','$articleId','$id','$language')")){
      
          return false;
      }else{
      
          return true;
      }



}


private function endKey($arr){

 @end($arr);

 return @key($arr);

}

}
