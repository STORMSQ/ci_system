<?php session_start();     ?>
<link rel="stylesheet" href="../../../model/autocomplete/jquery.ui.autocomplete.css">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../../../model/css/small.css" />
<script src="../../../model/editor/keyin/ckeditor.js"></script> 
<script src="../../../model/ajax/ci_ajax.js"></script>
<script src="../../../model/ajax/ci_function.js"></script>
<style type="text/css">
#article{border:1px solid #ccc; width:400px; height:26px; line-height:26px; padding:2px; font-size:14px; color:#666}
</style>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script type="text/javascript" src="../../../model/autocomplete/ui/jquery.ui.core.js"></script>
<script type="text/javascript" src="../../../model/autocomplete/ui/jquery.ui.widget.js"></script>
<script type="text/javascript" src="../../../model/autocomplete/ui/jquery.ui.position.js"></script>
<script type="text/javascript" src="../../../model/autocomplete/ui/jquery.ui.autocomplete.js"></script>
<script type="text/javascript">
$(function(){
	$( "#article" ).autocomplete({
		source: "../../../model/autocomplete/autocomplete.php",
		minLength: 1,
		autoFocus: true
	});
});  
 
 


</script>


</head>
<body>
<form action="chicago_style.php" enctype="multipart/form-data" method="post">
<p>支持的檔案類型為：xml</p>
	<input type="file" name="upload">
	<input type="hidden" name="MAX_FILE_SIZE" value="100000000" />
  <input type="submit" name="up" value="上傳">
</form>
<form action="../../../model/action/parser_result.php" target="_blank" method="post" >
<input type="hidden" name="style" value="chicago">
<p>請選擇剖析器需要執行之Chicago版本</p>
<table border="0" width="50%">
<tr><td colspan='2'>註釋<input type="radio" name="format_type" value="chicago_note" checked> |參考書目<input type="radio" name="format_type" value="chicago_bib" ></td></tr>
<tr><td colspan='2'><span id="titleSearch"></span></td></tr>   
<tr><td >季刊文章標題（中文或英文）<input type="text" id="article" name="article" placeholder="請輸入文章標題" onkeyup="check('titleSearch','../../../model/ajax/ci_titleSearch.php',{article:this.value})"  onblur="check('titleSearch','../../../model/ajax/ci_titleSearch.php',{article:this.value})" onfocus="states()" required="required" /></td><td></td></tr>
</table>


<?php
  require '../../../model/upload/upload.class.php';

 if($_POST['up']){
    require "../../../model/xml_parser/xml.php";
    if($_FILES['upload']['size'] > $_POST['MAX_FILE_SIZE']){

     echo '檔案超過指定大小';
  
     return false;

   }else{
   $dir=dirname(dirname(dirname(dirname(__FILE__))));
   $path=$dir.'/tmp/upload/';
   $upload=New uploadFile(array('allowtype'=>array('xml'),'maxsize'=>'100000000','filepath'=>$path,'israndom'=>'false'));
   $upload->upload('upload');
   $wordname=$upload->getFileName();
   
   $xmlname=$dir.'/tmp/upload/'.$wordname;
   $array = xml_content_parser($xmlname,array('中註釋文','英註釋文'));
   $title=xml_title_parser($xmlname, array('中標題','中題目','英標題','英題目'));
   echo '<textarea  name="reference" id="reference" class="ckeditor" placeholder="請複製引文並貼在此處，一個段落為一條引文" >';   
   foreach($array as $row){
   
      echo '<p>'.$row.'</p>';
   }
   echo '</textarea>';
 
   echo '<input type="submit" name="submit" value="送出" >';
   echo '<script>';
   echo 'document.getElementById("article").value="'.$title[0].'";';
   echo '$("#article").blur();';
   echo '</script>';
  unlink($xmlname);
  }
  
 
 }else{


?>
<textarea  name="reference" id="reference" class="ckeditor" placeholder="<p>請複製引文並貼在此處，一個段落為一條引文</p><p>建議將PDF檔轉換成docx或txt再行複製，以保持原始段落格式</p>"></textarea>
<input type="submit" name="submit" value="送出" >

<?php
 }
?>
</form>
<script>

function areafun(){

  var objs= document.getElementById("reference");
  if(objs.search('&')){
       
        objs.innerHTML=objs.innerHTML.replace('&','＆');

   }
  if(objs.search('<br>')){

        objs.innerHTML=objs.innerHTML.replace('<br>','');

   }



}
</script>


</body>
</html>
