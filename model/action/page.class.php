<?php
  class page{
  private $total;
  private $showNum;
  private $cpage;
  public $limit;
  private $uri;
  private $pageNum;
  private $ajax_type;
  
  
  
  function __construct($total,$num=10,$ajax_type=0){
  
    $this->total=$total;
    $this->showNum=$num;
    $this->ajax_type=$ajax_type;
    $this->pageNum=ceil($this->total/$this->showNum);
    $this->uri=$this->getUri();
    
    if(!$_GET['page']){
    
      $this->cpage=1;
      
    }else{
    
      $this->cpage=$_GET['page'];
    }
   
    $this->limit=$this->setlimit();
  
  
  }
  
  private function getUri(){
     
      $url=$_SERVER["REQUEST_URI"].(strpos($_SERVER["REQUEST_URI"], '?')?'':"?");
			$parse=parse_url($url);

		

			if(isset($parse["query"])){
				parse_str($parse['query'],$params);
				unset($params["page"]);
				$url=$parse['path'].'?'.http_build_query($params);
				
			}

			return $url;
      
      }
      
   private function setLimit(){
   
      return "limit ".($this->cpage-1)*$this->showNum." , {$this->showNum}";
   
   }
   
   
   
   
   private function first(){
   
    if($this->cpage==1){
    
      $html.='　<a>第一頁</a>　';
      
    }else{
    
      if($ajax_type==1){
      $html.="<a href='javascript:page(\"{$this->uri}&page=1\")'>第一頁</a>";
      
      }else{
      $html.= '　<a href="'.$this->uri.'&page=1">第一頁</a>　';
    
      }
    }
     return $html;
   }
   
   private function last(){
   
     if($this->cpage == $this->pageNum){
     
      $html.='　<a>最後一頁</a>　';
     }else{
     
     if($ajax_type==1){
     
     $html.="<a href='javascript:page(\"{$this->uri}&page=".$this->pageNum."\")'>最後一頁</a>";
     
     }else{
     
     $html.='　<a href='.$this->uri.'&page='.$this->pageNum.'>最後一頁</a>　';
     
     }
     }
     return $html;
   
   }
   
   private function prev(){
    if($this->cpage==1){
      
      $html.='　<a>上一頁</a>　';
    }else{
    
      if($ajax_type==1){
      
      $html.="<a href='javascript:page(\"{$this->uri}&page=".($this->cpage-1)."\")'>上一頁</a>";
      }else{    
    
      $html.='　<a href="'.$this->uri.'&page='.($this->cpage-1).'">上一頁</a>　';
      }
    }
   
     return $html;
   
   }
   
    private function next(){
    if($this->cpage == $this->pageNum){
      
      $html.='　<a>下一頁</a>　';
    }else{
    
      if($ajax_type==1){
      
      $html.="<a href='javascript:page(\"{$this->uri}&page=".($this->cpage+1)."\")'>下一頁</a>";
      
      }else{
    
      $html.='　<a href="'.$this->uri.'&page='.($this->cpage+1).'">下一頁</a>　';
      
      }
    }
   
    return $html;
   
   }
   
   
   private function start(){
    if($this->total==0){
    
        return 0;
    }else{
   
    return ($this->cpage-1)*$this->showNum+1;
    }
   
   }
   
    private function end(){
   
    return min($this->cpage*$this->showNum ,$this->total);
   
   
   }
   
 
   function displayPage($display=array(0,1,2,3,4,5)){
   
   $html[0]='　共有'.$this->total.'筆資料，本頁列出第'.$this->start().'到'.$this->end().'筆　';
   $html[1]='　頁數'.$this->cpage.'/'.$this->pageNum.'　';
   $html[2]=$this->first();
   $html[3]=$this->prev();
   $html[4]=$this->next();
   $html[5]=$this->last();
   foreach($display as $index){
				$fpage.=$html[$index];
			}

			return $fpage;
   
   
   
   }
   
   
   
  
  }
  
  
  
  
  

?>