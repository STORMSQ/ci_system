<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<script type="text/javascript" src="../js/config.js"></script>
<link href="../bootstrap/twitter-bootstrap-v2/docs/assets/css/bootstrap.css" rel="stylesheet" type="text/css" />
<title>排序調整</title>

<h1>資料寫入結果</h1>
<div class="container-fluid">
     <div class="accordion" id="accordion2">
            <div class="accordion-group">
              <div class="accordion-heading">
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
                  點我展開資料寫入結果
                </a>
              </div>
              <div id="collapseOne" class="accordion-body collapse" style="height: 0px; ">
                <div class="accordion-inner">
                 
               

<?php
  
  require "../../sysfunction/connect.php";
  require "../action/insert.class.php";
  require "../../option/option.php";
echo '<pre>';
print_r($_POST);
echo '</pre>'; 
 
   function endKey($arr){

 @end($arr);

 return @key($arr);

}

  /*if(!$_POST['author']){
  
  $author=array('null')
  
  }
    */
  $option=array(
   'articleId'=>$_POST['articleId'],
   'id'=>$_POST['id'],   
   'vol'=>$_POST['vo'].$_POST['ls'],
   'content'=>$_POST['content'],
   'author'=>$_POST['author'],
   'newAuthor'=>$_POST['newAuthor'],
   'date'=>$_POST['date'],
   'source'=>$_POST['source'],
   'select'=>$_POST['select'],
   'title'=>$_POST['title'],
   'refName'=>$_POST['refName'],
   'language'=>$_POST['language'],
   'count'=>$_POST['count'],
   'control'=>$_POST['control'], 
   'newCountrol'=>$_POST['newAuthorControl'],
   'style'=>$_POST['style']);
   
$edit=$target->query("SELECT * FROM `ci_reference_entry` WHERE REF = '".$_POST['articleId']."'");
                          
 if($edit->rowCount()>0){
                          
  echo '此篇文章已經建立過引文資料，如想修改引文資料，請使用修改功能'; 
   
}else{

   $in=new Insert($target,$option);
   
   echo $in->insertdata();
 
  
  
 } 
      
 
  
      

?>
 </div>
              </div>
            </div>

          </div>
    </div>
    
<p>資料已經寫入後端系統中，如發現有誤請點選以下進入修改</p>
<a href="../../module/input_class/update/result.php?value=<?php echo $_POST['articleId'] ?>&submit=進入修改">進入修改</a>    


<script type="text/javascript" src="../bootstrap/twitter-bootstrap-v2/docs/assets/js/jquery.js"></script>
<script type="text/javascript" src="../bootstrap/twitter-bootstrap-v2/docs/assets/js/bootstrap-collapse.js"></script>
