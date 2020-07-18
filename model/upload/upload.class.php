<meta http-equiv="content-type" content="text/html;charset=utf-8" >
<?php
class uploadFile{

	private $originName;    //原始的檔案名稱
	private $newfileName; //新的檔案名稱
	private $fileType;       //檔案種類
	private $israndom='';    //隨機命名模式是否開啟
  private $isnewName=false;
	private $proName='';
	private $errorNum=0;     //對應的錯誤代號
	private $maxsize='100000';  //檔案上傳最大值
	private $fileSize;           //檔案的大小
	private $filepath;           //檔案放置的路徑
	private $tmp_file_name;      //暫存檔名稱
	private $allowtype;          //允許的檔案種類
  private $word;
	
	
	
  
  //物件初始化賦值
	function __construct($option){
  
	  
		foreach($option as $key=>$val){
		
			$this->setOption($key,$val);
		}
	
	}
	
	//物件成員屬性設置
	private function setOption($key,$val){
	
		$this->$key=$val;
	
	}
	
  //錯誤種類(對應物件成員之錯誤代號
	private function errorType(){
		$str='上傳檔案'.$this->originName.'時發生錯誤，錯誤原因為：&nbsp;<font size="4" color="red"><b>';
			switch($this->errorNum){
				case 4: $str .= "沒有檔案被上傳"; break;
				case 3: $str .= "檔案只有部分上傳"; break;
				case 2: $str .= "上傳檔案超過最大值"; break;
				case 1: $str .= "上傳檔案超過系統最大值"; break;
				case -1: $str .= "不被接受的檔案"; break;
				case -2: $str .= "檔案過大，不可超過{$this->maxSize}"; break;
				case -3: $str .= "上傳檔案失敗"; break;
				case -4: $str .= "建立上傳檔案失敗"; break;
				case -5: $str .= "必須指定上傳路徑"; break;
				default: $str .=  "其他未知錯誤";
			}
			$str.='</b></font>';
		return $str;	
	
	}
	
  
  //檢查檔案放置路徑
	private function CheckPath(){
		if(empty($this->filepath)){
			
			$this->setOption(errorNum, -5);
			
			return false;	
		}
    if(!file_exists($this->filepath)){
    
		  if(@mkdir($this->filepath,0755)){
		    
			return false;
		
		}
		
		}
    return true;	
	}
	
	//上傳檔案後屬性成員賦值
	private function setFile($name,$type,$tmp_name,$error,$size){
			$this->setOption('originName',$name);
        	$arrStr=explode('.', $name); 
			$this->setOption('fileType', strtolower($arrStr[count($arrStr)-1]));
        	$this->setOption('tmp_file_name',$tmp_name);
        	$this->setOption('errorNum',$error);
        	$this->setOption('fileSize',$size);
			
	
	}
  
  //檢查文檔案大小是否超過規定值
	private function CheckFileSize(){
		
		if($this->fileSize > $this->maxsize){
		
			$this->setOption(errorNum, 2);
			
			return false;
		}else{
		
		return true;
		}
	}
	
  //檢查檔案種類是否符合規定種類
	private function CheckFileType(){
	
		if(!in_array(strtolower($this->fileType),$this->allowtype)){
		
			$this->setOption(errorNum, -1);
			return false;
		}
		return true;
	
	}
  
  //設置檔案從暫存檔移動到指定路徑之後的命名
	private function setNewFileName(){
	
		
		if($this->israndom=='true'){
		
			$this->setOption(newfileName,$this->setRandomName());
		
		}else{
      if($this->isnewName==false){
      

      
			$this->setOption(newfileName,$this->originName);
      
		}else{
    
      $this->setOption(newfileName,$this->setNewName());
    
    }
		 }
	}
  
  private function setNewName(){
  
    
		return $this->newfileName.'.'.$this->fileType;
  
  }
	
  //是否開啟隨機命名的設置
	private function setRandomName(){
	
		$fileName=$this->proName;
		return $fileName.'.'.$this->fileType;
	
	}
	private function copyFile(){
		if(!$this->errorNum){
			$path=rtrim($this->filepath, '/').'/';
			$path.=iconv( "big5" , "utf-8" , $this->newfileName);
			if(@move_uploaded_file($this->tmp_file_name,$path)){
      
				return true;
			
		}else{
      $this->setOption('errorNum',-3);
			return false;
		}
	}
	
	}
	//----------------------------封裝分隔線(以上成員方法僅供內部調用---------------------------------------------
  
  //上傳一個檔案(最主要!!!!!!!!!直接呼叫)
	function upload($file){
		 /*
      運作思路：
      
      第一步先檢查上傳檔案路徑是否正確
      第二步設置上傳檔案後的屬性
      第三步進行檔案種類檢查
      第四步進行檔案大小檢察
      最後再將檔從暫存檔copy到指定位置
      即可完成檔案上傳
     
     
     */
    
     
    if(!$this->CheckPath()){
      echo $this->errorType();
      return false;
    
    }		   //第一步
    
		$name=$_FILES["upload"]["name"];
		$type=$_FILES["upload"]["type"];
		$tmp_name=$_FILES["upload"]["tmp_name"];
		$error=$_FILES["upload"]["error"];
		$size=$_FILES["upload"]["size"];
				
		$this->setFile($name,$type,$tmp_name,$error,$size);  //第二步
		
		if($this->errorNum!=0){		
			 echo $this->errorType();
			return false;
		}
			
		  
			if($this->CheckFileType()){
			
			}else{
				echo $this->errorType();
				return false;
			}
			 
			if($this->CheckFileSize()){
				$this->setNewFileName();
			}else{
					echo $this->errorType();
					return false;
			}	
			
			if($this->copyFile()){
      
             
				echo '檔案上傳成功';
        return true;
			 
			}else{
				echo $this->errorType();
			return false;	
			}		
				
		
	}
 
 
  function getFileName(){
  
     return $this->newfileName;
  
  }
}


?>

