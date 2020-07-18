<?php session_start();     ?>
<link rel="stylesheet" href="../../../model/autocomplete/jquery.ui.autocomplete.css">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<!--<link rel="stylesheet" type="text/css" href="apa.css" />-->
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

<form action=""  method="post" >
<p>請輸入搜尋文章<input type="text" id="article" name="article" placeholder="請輸入欲修改的文章名稱"  required="required"  />
<input type="submit" name="submit" value="送出" >
</form>

<?php

require "../../../sysfunction/connect.php";
require "../../../option/option.php";

if($_POST['submit']){
$article=$pdo->query("SELECT ".ARTICLEID.", ".VOLUMEANDISSUEID." , ".CHITITLE.", ".ENGTITLE." FROM ".ARTICLE." WHERE ".CHITITLE." = '".$_POST['article']."' or ".ENGTITLE." = '".$_POST['article']."'");
echo '<table border="1" width="25%">';
$art=$article->fetch(PDO::FETCH_NUM);
//foreach($article as $art){

$volume=substr($art[1],0,2);
$issueId=substr($art[1],2,1);

$articleid=$art[0];
if($art[2]==null){
$table.='<tr><td>英文標題</td><td>'.$art[3].'</td></tr>';

}elseif($art[3]==null){

$table.='<tr><td>中文標題</td><td>'.$art[2].'</td></tr>';
}else{
$table.='<tr><td>中文標題</td><td>'.$art[2].'</td></tr>';
$table.='<tr><td>英文標題</td><td>'.$art[3].'</td></tr>';
}

//}

$table.='</tr><td>卷期</td><td>'.$volume.'卷'.$issueId.'期</font></td>';
$authorresult=$pdo->query("SELECT ".CHINAME." , ".ENGNAME." FROM ".AUTHOR." WHERE ".ARTICLEID." = '".$art[0]."'");
$table.='<tr><td rowspan="'.$authorresult->rowCount().'">作者</td>';
$authorresult1=$authorresult->fetchAll(PDO::FETCH_NUM);
foreach($authorresult1 as $authorrow){
       
       
       
         if($authorrow[0] == ''){
         
             $table.='<td>'.$authorrow[1].'</td></tr>';
         
         }elseif($authorrow[1] == ''){
         
             $table.='<td>'.$authorrow[0].'</td></tr>';
         
         }else{
         
             $table.='<td>'.$authorrow[0].'</td></tr>';
         
         } 
       
    }
$table.='</table>';

echo $table;

$check=$target->query("SELECT REF FROM ci_reference_entry WHERE REF = '".$art[0]."'");

if($check->rowCount()==0){
echo '<br>';
echo '該編文章尚未引文資料建立過引文，無法進行修改';


}else{ 


echo "<form action='result.php' target='_blank' method='get'>";
echo '<input type="hidden" name="value" value="'.$art[0].'">';
echo '<input type="submit" name="submit" value="進入修改" >';
echo '</form>';



}           
 }




?>




</body>
</html>
