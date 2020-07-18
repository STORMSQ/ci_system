<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<script src="../../../model/ajax/ci_ajax.js"></script>
<script src="../../../model/ajax/ci_function.js"></script>
<script src="../../../model/js/config.js"></script>
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
<link rel="stylesheet" href="../../../model/resize_table/dist/jquery.resizableColumns.css">
<link rel="stylesheet" href="../../../model/resize_table/demo/demo.css">
</head>
<body>

</head>
<body>
<?php 

if($_GET['item']=='query'){



?>
  
<form action="search_query.php" target="frame" method="get">
<table width="50%" style="border-style: solid">
<tr><td>資源種類</td><td>&nbsp;</td><td><select id="type_input" name="type"><option value="" selected>　</option><option value="book">圖書</option><option value="journal">期刊論文</option><option value="thesis" >學位論文</option><option value="conference">會議論文</option><option value="tool">工具書</option><option value="newspaper">報紙</option><option value="other">其它</option></select></td></tr>
<tr><td>標題</td><td><select id="title_sel" name="title_sel"><option value=">">></option><option value="<"><</option><option value="=" selected>=</option><option value=">=">>=</option><option value="<="><=</option><option value="LIKE">LIKE</option></select></td><td><input type="text" id="title_input" name="title" size="20" ></td></tr>
<tr><td>日期</td><td><select  id="date_sel"name="date_sel"><option value=">">></option><option value="<"><</option><option value="=" selected>=</option><option value=">=">>=</option><option value="<="><=</option><option value="LIKE">LIKE</option></select></td><td><input type="text" id="date_input" name="date" size="20" ></td></tr>
<tr><td>語言類型</td><td>&nbsp;</td><td><select id="language_input" name="language"><option value="">　</option><option value="english">西文</option><option value="nonenglish">中文</option></td></tr>
<tr><td>作者</td><td><select id="author_sel" name="author_sel"><option value="LIKE">LIKE</option></select></td><td><input type="text" id="author_input" name="author" size="20" ></td></tr>
</table>
<script>

//var type_sel =     document.getElementById('type_sel');
var title_sel =    document.getElementById('title_sel');
var date_sel =     document.getElementById('date_sel');
//var language_sel = document.getElementById('language_sel');
var author_sel =   document.getElementById('author_sel');
var type_input =   document.getElementById('type_input');
var title_input =  document.getElementById('title_input');
var date_input =   document.getElementById('date_input');
var language_input =     document.getElementById('language_input');
var author_input = document.getElementById('author_input');


//var url = "search_query.php?type_sel="+type_sel.value+"&title_sel="+title_sel.value+"&date_sel="+date_sel.value+"&language_sel="+language_sel.value+"&author_sel="+author_sel.value+"&type="+type_input.value+"&title="+title_input.value+"&date="+date_input.value+"&language="+language_input.value+"&author="+author_input.value;
</script>
<!--{type_sel:type_sel.value,title_sel:title_sel.value,date_sel:date_sel.value,language_sel:language_sel.value,author_sel:author_sel.value,type:type_input.value,title:title_input.value,date:date_input.value,language:language_input.value,author:author_input.value}-->

<!--<input type="button" value="查詢" onclick=check4("search_query.php?type_sel="+type_sel.value+"&title_sel="+title_sel.value+"&date_sel="+date_sel.value+"&language_sel="+language_sel.value+"&author_sel="+author_sel.value+"&type="+type_input.value+"&title="+title_input.value+"&date="+date_input.value+"&language="+language_input.value+"&author="+author_input.value+"&submit=submit",'main')> -->
<input type="submit" name="submit" value="GO">
</form>
<div id="main"></div>
<iframe id="frame" name="frame" style="border:0px" width="100%" height="80%" scrolling="yes"></iframe>

<script>
  
  
  
  var arr= new Array();
  
  
  function page(url){ 
  var object=document.getElementById("main");
  if(typeof(arr[url])=="undefined"){
    var ajax= new Ajax();
  
        ajax.get(url,function(data){
        
           object.innerHTML=data;
           arr[url]=data;
        
        });
    }else{
    
      object.innerHTML=arr[url];
    }    
  }
  
  page("search_query.php?page=1");
  </script>
  
  



<?php
}


if($_GET['item']=='stat'){
if(!$_POST['submit']){

?>
<body onload="outputCustom('type','col[0]',0)">
<div id="tableRow" style="border-style: groove; border-color: gray;">
<form action="" method="post">
<font size="5" color="green">STEP　1.　建立條件</font>
<p>條件的設立，主要查詢項目將會依照此條件列出資料，例如想要查詢「2000年至2005年期刊論文的數量」，年份就為條件</p>
<p><p>請選擇條件資料</p>
<select name="select_main">
<option value="type">資源類型</option>
<option value="title">標題</option>
<option value="date">日期</option>
<option value="language">語言類型</option>
<option value="source">期刊名稱</option>
<option value="author">被引作者</option>
</select>
<br><br>
<input type="input" name="col_name" size="10" placeholder="為此欄位命名" >
</p>
<p>欄位條件</p>
<input type="button" value="開啟/關閉" onclick="display_div('col_show')">
<div id="col_show" style="display:none">
<input type="hidden" id="check_col_value" name="check_col_value" value="no">              <!--有錯   -->
<table border="0">
<tr id="col_condition">
<td id="col_tcondition[0]">
<!--<select name='col_where[0]'><option value='AND'>AND</option><option value='OR'>OR</option><option value='NOT'>NOT</option></select>  -->
<select name="col_w[0]" id="col_w[0]">
<option value="=">=</option>
<option value=">">></option>
<option value="<"><</option>
<option value=">=">>=</option>
<option value="<="><=</option>
<option value="<>">!=</option>
<option value="LIKE">LIKE</option>

</select>
<input type="input" id="check_col" name="col_condition[0]" size="10" value="" >
</td>
</tr>
</table>
<input type="button" value="在最後新增一個條件" onclick="col_addcondition('col_condition')">
<input type="button" value="刪除最後一個條件" onclick="col_delcondition()">
</div>
<hr />
<table border="0" width="100%">
<tr>
<td>
<font size="5" color="green">STEP　2.　建立主要查詢項目</font>
<p>主要查詢項目為統計的主查詢項目，例如想要查詢「2000年至2005年期刊論文的數量」，期刊論文就為主查詢項目</p>
<p>請設定查詢資料資料</p>
<p><input type="button" value="在最後新增一個項目" onclick="addcondition('r_1','r_2')">　<input type='button' align='right' value='刪除最後一個項目' onclick=delCon()></p>
<table border="0">
<tr id="r_1">
<td id="rt_1">
<p><select id="select_type[0]" name="select_type[0]" onchange="outputCustom(this.value,'col[0]',0)">
<option value="type">資源類型</option>
<option value="title">標題</option>
<option value="date">日期</option>
<option value="language">語言類型</option>
<option value="source">期刊名稱</option>
<option value="author">被引作者</option>
</select>
<br><input type="input" name="name[0]"  placeholder="在結果欄位中顯示的名稱" >
</p>
</td>
</tr>
<tr id="r_2"><td >
<span id="col[0]">

</span>

</td></tr>
</table>

</td></tr>

</table>
<br>
<hr>
<font size="5" color="green">STEP　3.　設定其他篩選條件（選填）</font>
<p>篩選條件</p>
<p>條件：<input type="input" name="where" size="100" ></p>
<p>作者設定：<input type="radio" name="table_sel" value="indepent">條目中多位作者分別計算　　<input type="radio" name="table_sel" value="group" checked>條目中多位作者視為一筆(預設)</p>
<!--<p>以上選擇將會導致計量結果上的不同，室為</p> -->
<p><input type="submit" name="submit" value="送出資料並建立統計"></p>
<p>
<li>可使用AND、OR、NOT等邏輯運算</li>
<li>項目請使用中文字，參考：
 <ul>
 <li>欄位：
    <ol>
      <li>被引作者/作者</li>
      <li>標題</li>
      <li>日期</li>
      <li>期刊名</li>
      <li>語言種類/語言</li>
      <li>資源類型/資源種類</li>
      
    </ol>
   </li> 
    <br>
     <li>資源類型：</li>
     <ol>
        <li>圖書</li><li>期刊論文</li><li>學位論文</li><li>會議論文</li><li>網路資源</li><li>工具書</li><li>報紙</li><li>其他</li>
     </ol>
        <li>語言類型</li>
      <ol>
        <li>中文</li><li>西文</li>
     </ol>
  </ul>
</li>
</p>




</form>


</div>


</body>
<?php

}
 
 
 
/*
echo '<pre>';
print_r($_POST);
echo '</pre>'; 
*/


if($_POST['submit']){

require "../../../sysfunction/connect.php";

$first=$_POST['select_main'];
$number=count($_POST['select_type'])-1;
$number1=count($_POST['col_w'])-1;
$check=$_POST['check_col_value'];


$origin=array(
'/(^圖書$)|(^書籍$)|(^書本$)/Ux',
'/(^期刊論文$)|(^期刊$)/Ux',
'/(^碩士論文$)|(^博士論文$)|(^學位論文$)|(^碩論$)|(^博論$)/Ux',
'/(^會議論文$)|(^研討會論文$)|(^研討會$)/Ux',
'/(^網路資源$)|(^網頁$)|(^網站$)|(^電子資源$)|(^網頁資源$)|(^網站資源$)/Ux',  
'/(^工具書$)|(^參考書$)|(^參考工具書$)|(^字典$)|(^辭典$)|(^辭海$)|(^參考資源$)/Ux', 
'/(^報告$)|(^會議報告$)/Ux', 
'/(^報紙$)/Ux',
'/(^其他$)|(^其它$)/Ux',
'/(^中文$)/Ux',
'/(^西文$)|(^英文$)/Ux');


$replace=array(
'book',
'journal',
'thesis',
'conference',
'web',
'tool',
'report',
'newspaper',
'other',
'nonenglish',
'english');

$old=array('/(^資源類型$)|(^資源$)|(^資源種類$)/','/(^標題$)|(^題名$)/','/(^日期$)|(^年分$)|(^年份$)|(^年代$)/','/(^語言$)|(^語言類型$)/','/(^期刊名$)|(^刊名$)/','/(^作者$)|(^被引作者$)/','/(^中文$)/','/(^西文$)|(^英文$)/',
'/(^圖書$)|(^書籍$)|(^書本$)/Ux',
'/(^期刊論文$)|(^期刊$)/Ux',
'/(^碩士論文$)|(^博士論文$)|(^學位論文$)|(^碩論$)|(^博論$)/Ux',
'/(^會議論文$)|(^研討會論文$)|(^研討會$)/Ux',
'/(^網路資源$)|(^網頁$)|(^網站$)|(^電子資源$)|(^網頁資源$)|(^網站資源$)/Ux',  
'/(^工具書$)|(^參考書$)|(^參考工具書$)|(^字典$)|(^辭典$)|(^辭海$)|(^參考資源$)/Ux', 
'/(^會議報告$)|(^會議論文$)/Ux', 
'/(^報紙$)/Ux',
'/(^其他$)|(^其它$)/'

);

$new=array('type','title','date','language','source','author','nonenglish','english',
'book',
'journal',
'thesis',
'conference',
'web',
'tool',
'report',
'newspaper',
'other'
);

#################################################################################################################
if($check=='yes'){
 $sql_second.='( ';
for($i=0;$i<=$number1;$i++){
  
  
     if($i==0){
     $sql_second.=$first.' '.$_POST['col_w'][$i].'"'.preg_replace($old,$new,$_POST['col_condition'][$i]).'"' ;
     }else{
  
    $sql_second.=' '.$_POST['col_where'][$i].' '.$first.' '.$_POST['col_w'][$i].' "'.preg_replace($old,$new,$_POST['col_condition'][$i]).'"';
     }
  
  
}

$sql_second.=' ) AND '; 
}
  

#################################################################################################################


if($_POST['where']==null){
  $where = ' 1';

  }else{
  $where = preg_replace($old,$new,$_POST['where']);
}


#################################################################################################################
if($_POST['col_name']!='' or $_POST['col_name']!=null){
   $sql='SELECT '.$first. ' AS '.$_POST['col_name'];

}else{

   $sql='SELECT '.$first.' ';
}

#################################################################################################################

for($i=0;$i<=$number;$i++){


$text = $_POST['condition'][$i];

if($text==''){

   if($_POST['name'][$i]!='' or $_POST['name'][$i]!=null){
     $sql.=', count('.$_POST['select_type'][$i].') AS \''.$_POST['name'][$i].'\' ';

    }else{
$sql.=', count('.$_POST['select_type'][$i].')';

}

}else{

$condition_rel=preg_replace($origin,$replace,$text);

if($_POST['condition_sel'][$i] == 'LIKE'){

if($_POST['name'][$i]!='' or $_POST['name'][$i]!=null){


$sql.=', count(if('.$_POST['select_type'][$i].' '.$_POST['condition_sel'][$i].' \'%'.$condition_rel.'%\',true,null)) AS \''.$_POST['name'][$i].'\' ';

}else{

$sql.=', count(if('.$_POST['select_type'][$i].' '.$_POST['condition_sel'][$i].' \'%'.$condition_rel.'%\',true,null))';

}

}else{

if($_POST['name'][$i]!='' or $_POST['name'][$i]!=null){

$sql.=', count(if('.$_POST['select_type'][$i].' '.$_POST['condition_sel'][$i].' \''.$condition_rel.'\',true,null)) AS \''.$_POST['name'][$i].'\' ';

}else{

$sql.=', count(if('.$_POST['select_type'][$i].' '.$_POST['condition_sel'][$i].' \''.$condition_rel.'\',true,null)) ';

}
}


}
}

#################################################################################################################
$count=$i;


$sql.=' FROM (SELECT * FROM `ci_alldata_3` WHERE '.$sql_second.' '.$where;




#################################################################################################################

for($j=0;$j<=$number;$j++){


 if($_POST['condition'][$j]){
if($j==0){
$sql.=' AND ';
$sql.='( ';

$text = $_POST['condition'][$j];
$condition_rel=preg_replace($origin,$replace,$text);


if($_POST['condition_sel'][$j] == 'LIKE'){

$sql.=$_POST['select_type'][$j].' '.$_POST['condition_sel'][$j].' \'%'.$condition_rel.'%\' ';

}else{

$sql.=$_POST['select_type'][$j].' '.$_POST['condition_sel'][$j].' \''.$condition_rel.'\' ';

}

 }else{
 $text = $_POST['condition'][$j];
$condition_rel=preg_replace($origin,$replace,$text);
 
 
if($_POST['condition_sel'][$j] == 'LIKE'){

$sql.= 'OR '.$_POST['select_type'][$j].' '.$_POST['condition_sel'][$j].' \'%'.$condition_rel.'%\' ';

}else{

$sql.= 'OR '.$_POST['select_type'][$j].' '.$_POST['condition_sel'][$j].' \''.$condition_rel.'\'  ';

}
 
 
 
 }

if($j==$number){
$sql.=' )';
}

}

}
#################################################################################################################

if($_POST['table_sel']=='indepent'){

$sql.=' )';

}elseif($_POST['table_sel']=='group'){

$sql.='  GROUP BY REFID )';

}

#################################################################################################################
$sql.= ' AS tb';

$sql.=' GROUP BY '.$first;


################################################################################################################# 

echo $sql;



$result= $target->query($sql);

 echo '<table border="1" width="60%" class="table table-bordered" data-resizable-columns-id="demo-table-v2">';
 echo '<thead>'; 
 echo '<tr>';
        for($i=0; $i<$result->columnCount(); $i++){
                $field=$result->getColumnMeta($i);
                echo '<th data-resizable-column-id="'.$field["name"].'">'.$field["name"]."</th>";
        }
 echo '</tr>';
 echo '</thead>';
 echo '<tbody>';

$result2=$result->fetchAll(PDO::FETCH_NUM);
foreach($result2 as $row){
  echo '<tr>';
  for($j=0;$j<=count($row)-1;$j++){
  switch ($row[$j]){
  
  case 'book':
  $row[$j]='圖書';
  break;
  
  case 'journal':
  $row[$j]='期刊論文';
  break;
  
  case 'thesis':
  $row[$j]='學位論文';
  break;
  
  case 'conference':
  $row[$j]='會議論文';
  break;
  
  case 'web':
  $row[$j]='電子/網路資源';
  break;
  
  case 'tool':
  $row[$j]='工具書';
  break;
  
  case 'report':
  $row[$j]='報告';
  break;
  
  case 'newspaper':
  $row[$j]='報紙';
  break;
  
  case 'other':
  $row[$j]='其他';
  break;
  
  case 'english':
  $row[$j]='英文';
  break;
  
  
  case 'nonenglish':
  $row[$j]='西文';
  break;
  
  default:
  
  $row[$j]=$row[$j];
  
  }
    
  echo '<td>'.$row[$j].'</td>';
  }
  echo '</tr>';

}
 echo '</tbody>'; 
 echo '</table>';
 
 ?>
  <input type="button" value="重新查詢" onclick="window.location.href='open.php?item=stat'">
  <?php } 
  }
  ?>
  
   <!-- jQuery -->
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

  <!-- Optional localStorage dependancy, for persistent column width storage -->
  <script src="//cdnjs.cloudflare.com/ajax/libs/store.js/1.3.14/store.min.js"></script>

  <!-- Plugin -->
  <script src="../../../model/resize_table/dist/jquery.resizableColumns.min.js"></script>
  <script>
    $(function(){
      $("table").resizableColumns({
        store: window.store
      });
    });

    
  </script>
 
  </body>
  </html>

 
