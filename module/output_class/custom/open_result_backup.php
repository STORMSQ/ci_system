<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<script src="../../../model/js/config.js"></script>
<script src="../../../model/ajax/ci_ajax.js"></script>
<script src="../../../model/ajax/ci_function.js"></script> 
 <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
 <link rel="stylesheet" href="../../../model/resize_table/dist/jquery.resizableColumns.css">
 <link rel="stylesheet" href="../../../model/resize_table/demo/demo.css">
 <script type="text/javascript" src="https://www.google.com/jsapi"></script>
 </head>
<body onresize="window.location.reload()"> 
<?php 
require "../../../sysfunction/connect.php";
########################################################################################################
//正則表達式

$chinese=array(
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
'/(^西文$)|(^英文$)/Ux'

);


$english=array(
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
'english'
);

$eng=array(
'/(^book$)/Ux',
'/(^journal$)/Ux',
'/(^thesis$)/Ux',
'/(^conference$)/Ux',
'/(^web$)/Ux',
'/(^tool$)/Ux',
'/(^report$)/Ux',
'/(^newspaper$)/Ux',
'/(^other$)/Ux',
'/(^english$)/Ux',
'/(^nonenglish$)/Ux',
'/(^type$)/Ux',
'/(^date$)/Ux',
'/(^title$)/Ux',
'/(^language$)/Ux',
'/(^author$)/Ux',
'/(^[0]$)/Ux',
'/(^and$)/Ux',
'/(^or$)/Ux',
'/(^not$)/Ux'

);

$chi=array(
'圖書',
'期刊論文',
'學位論文',
'會議論文',
'網路/電子資源',
'工具書',
'報告',
'報紙',
'其他',
'英文',
'中文',
'文獻種類',
'文獻日期',
'文獻標題',
'文獻語言',
'文獻作者',
'無日期',
'AND',
'OR',
'NOT'
);




#################################################################################################

$result=$target->query("SELECT * FROM `ci_alldata_4` ");

$col_num=$result->rowCount();

if($_POST['submit']){
################################################################
if($_POST['condition_select']){
$groupby_check='no';
$table='`ci_alldata_4`';

if($_POST['journal_check']=='volandiss'){

if($_POST['vol_1'] and $_POST['vol_2']){
$range_1 = $_POST['vol_1'].$_POST['vol_1_issue'].'00';
$range_2 = $_POST['vol_2'].$_POST['vol_2_issue'].'00';
}else{
$range_1=null;
$range_2=null;
} 
}elseif($_POST['journal_check']=='year'){ 

if($_POST['year1'] and $_POST['year2']){


$result =$pdo->query("SELECT concat(volume,issue)as volandissue FROM `article_date` WHERE date_format(date,'%Y') ='".$_POST['year1']."' group by volandissue order by volandissue asc");
$row=$result->fetch(PDO::FETCH_NUM);

$range_1=$row[0].'00';
$result =$pdo->query("SELECT concat(volume,issue)as volandissue FROM `article_date` WHERE date_format(date,'%Y') ='".$_POST['year2']."' group by volandissue order by volandissue asc");
$row=$result->fetch(PDO::FETCH_NUM);

$range_2=$row[0].'00';


//$range_1=$_POST['year1'];
//$range_2=$_POST['year2'];
}else{
$range_1=null;
$range_2=null;

}

}else{

$range_1=null;
$range_2=null;
}              
 
if($range_1 != null and $range_2 !=null){               
if($range_1 > $range_2){

$table='(SELECT * FROM ci_alldata_4 WHERE REF <= '.$range_1.' and REF >= '.$range_2.' )as tb '; 

}elseif($range_2 > $range_1){

$table='(SELECT * FROM ci_alldata_4 WHERE REF <= '.$range_2.' and REF >= '.$range_1.' )as tb '; 

}else{

$table='(SELECT * FROM ci_alldata_4 WHERE REF = '.$range_2.' and REF = '.$range_1.' )as tb ';

}
}else{

$table='`ci_alldata_4`';

}


################################################################
//$action_1='(SELECT * FROM `ci_alldata_4` WHERE ';

$action_1.='';
$i=0;
if($_POST['groupby']!=''){
     
      $groupby_check='yes';
      $action_2_left=$_POST['groupby'];
      $action_2_right_groupby=' GROUP BY '.$_POST['groupby'].' ';
      $word='小計';
     }else{
     
       $word='總數';
     
     }
if($_POST['item_select']){
$array_number=count($_POST['item_select']);
foreach($_POST['item_select'] as $key=> $row){ 

  
   if($row != 'all'){
   if($_POST['action_item'][$key]!=null and $_POST['action_item'][$key]!='*'){
       if($i>0){

         $action_1.=' OR ';
      }
 
  
   if($_POST['action_item_logic'][$key]=='LIKE'){
    
    $action_1.= $row.' '.$_POST['action_item_logic'][$key]." '%".$_POST['action_item'][$key]."%' ";
    $action_1_name[$i]=$_POST['action_item'][$key];
    $action_1_tmp[$i]=$row.' '.$_POST['action_item_logic'][$key]." '%".$_POST['action_item'][$key]."%' ";
     
   }else{
  
    $action_1.= $row.' '.$_POST['action_item_logic'][$key]." '".$_POST['action_item'][$key]."' ";
    $action_1_name[$i]=$_POST['action_item'][$key];
    $action_1_tmp[$i]=$row.' '.$_POST['action_item_logic'][$key]." '".$_POST['action_item'][$key]."' ";
   
   }
  }elseif($_POST['action_item'][$key]!=null and $_POST['action_item'][$key]=='*' ){
  
    
  
             if($i>0){

               $action_1.=' OR ';
               }
  
             $action_1.=$row.' IS NOT NULL';
             $action_1_name[$i]=$_POST['action_item'][$key];
             $action_1_tmp[$i]=$row.' IS NOT NULL';
             $sql_view.=' '.preg_replace($eng,$chi,$row).' IS NOT NULL';
    
   }
  
 
  }else{
  
    if($i>0){

       $action_1.=' OR ';
    }
  
       $action_1.=$row.' IS NOT NULL';
        $action_1_name[$i]=$_POST['action_item'][$key];
        $action_1_tmp[$i]=$row;
        $action_1_tmp2[$i]='all';
        
  
  }

$i++;
} 
$l=0;
foreach($action_1_tmp as $row){
 
 if($l > 0){
   $action_1_count.=' , ';
 
 }
 if($action_1_tmp2[$l]=='all'){
 $action_1_count.='count(*) AS '.$word.' , group_concat(REFID separator ";") AS "group-number"'; 
 }else{
 $action_1_count.='count(if('.$row.', true, null)) AS '."'$action_1_name[$l]'".' , group_concat(if('.$row.',REFID,null) separator ";") AS "group-'.$action_1_name[$l].'"';
 }
$l++;
}
}else{

$action_1_count.='count(*) AS '.$word.', group_concat(REFID separator ";") AS "group-number"';

}  
//$action_1.=' ) as tb';
#########################################處理物件#########################################
$j=1;
array_shift($_POST['bool_condition']);
if($_POST['bool_condition']){

foreach($_POST['bool_condition'] as $row){

$bool[$j]=$row;

$j++;
}
}
$k=0;
   
if($_POST['condition_select']){
foreach($_POST['condition_select'] as $key=> $row){
    
  
   
   if($_POST['condition_select'][$key]!='null'){
    if($bool[$k]){
      
        $action_2_right.=$bool[$k].' ';
        $sql_view.=' <font color="red"><b>'.preg_replace($eng,$chi,$bool[$k]).'</b></font> ';
      } 
     
      if($_POST['left_sign'][$key]!='null'){
       $action_2_right.=' '.$_POST['left_sign'][$key].' ';
       $sql_view.=' '.preg_replace($eng,$chi,$_POST['left_sign'][$k]).' ';
     } 
     if($_POST['action_condition'][$key]=='*'){
     
      $action_2_right.=$row.' IS NOT NULL ';
      $sql_view.=' '.preg_replace($eng,$chi,$row).' IS NOT NULL';
     
     }else{ 
      
      
      if($_POST['action_condition_logic'][$key]=='LIKE'){
     $action_2_right.=$row.' '.$_POST['action_condition_logic'][$key]." '%".$_POST['action_condition'][$key]."%' "; 
     $sql_view.=' '.preg_replace($eng,$chi,$row).' '.preg_replace($eng,$chi,$_POST['action_condition_logic'][$key]).' '.preg_replace($eng,$chi,$_POST['action_condition'][$key]);
     }else{
     
     $action_2_right.=$row.' '.$_POST['action_condition_logic'][$key]." '".$_POST['action_condition'][$key]."' ";
     $sql_view.=' '.preg_replace($eng,$chi,$row).' '.preg_replace($eng,$chi,$_POST['action_condition_logic'][$key]).' '.preg_replace($eng,$chi,$_POST['action_condition'][$key]);
     }
     
    }
    if($_POST['right_sign'][$key]!='null'){
       $action_2_right.=' '.$_POST['right_sign'][$key].' ';
       $sql_view.=' '.preg_replace($eng,$chi,$_POST['right_sign'][$key]).' ';
     } 
    }else{
    $action_2_left=null;
    $action_2_right.=' 1 ';
    
    }
$k++;
}
}


if($action_1_count and $action_2_left){
$action_2_left_sep=', ';

}
//count(*) AS `number` ,group_concat(REFID separator ";") AS `group-number`
$sql='SELECT '.$action_2_left.$action_2_left_sep.$action_1_count.' FROM '.$table.' WHERE  '.$action_2_right.' '.$action_2_right_groupby;
#######################################################################################################
//echo $sql;
echo '<p>結果一覽</p>';
echo '<div style="border-style: solid">';
echo '<p>查詢條件敘述式：</p>';
echo '<p>';
echo $sql_view;
echo '</p>';
echo '</div>';
echo '<hr>';



########################################################################################################

$result = $target->query($sql);

if(!$result){

echo '<p>系統偵測到你的查詢條件不符合邏輯，導致查詢失敗，請檢查查詢條件是否邏輯正確，尤其包含分組的刮號</p>';
exit;
}


echo '<p>以下為搜尋結果</p>';
$row=$result->fetchAll(PDO::FETCH_ASSOC);

/*echo '<pre>';
print_r($row);
echo '</pre>'; */

$column=array();
echo '<table border="1" width="60%" class="table table-bordered" data-resizable-columns-id="demo-table-v2">';
echo '<thead>';
echo '<tr >';

        for($i=0; $i<$result->columnCount(); $i++){
                $field=$result->getColumnMeta($i);
                if(!stristr($field['name'],'group-')){
                echo '<th style="background: #FAEBD7" data-resizable-column-id="'.$field["name"].'">'.preg_replace($eng,$chi,$field["name"])."</th>";
                array_push($column,preg_replace($eng,$chi,$field["name"]));
               
                }
        }
echo '</tr>';
echo '</thead>';
echo '<tbody>';
$data=array();
$field_column=array();
$rowCount=0;
for($a=0;$a<=count($row)-1;$a++){
echo '<tr>';

$keys =array_keys($row[$a]);
if(count($row[$a]) %2 > 0 ){
     $data[$a]=array();
     array_push($field_column, preg_replace($eng,$chi,$row[$a][$keys[0]]));
     echo '<td style="background: #FAEBD7">'.preg_replace($eng,$chi,$row[$a][$keys[0]]).'</td>';
     array_push($data[$a],preg_replace($eng,$chi,$row[$a][$keys[0]]));
     for($b=1;$b <= count($keys)-1 ;$b++){
        
       
        if(!stristr($keys[$b],'group-')){
        
        
        
          $next_key=$keys[$b+1];
          echo '<td ><form id="form['.$a.']['.$keys[$b].']" action="open_detail.php" method="post" target="_top" onsubmit="window.open("open_detail.php","result","resizable=1,scrollbars=1,width=400,height=300")"><input type="hidden" name="detail" value="'.$row[$a][$next_key].'"><input type="submit" name="sub" value="'.$row[$a][$keys[$b]].'" style="border: 0px; width: 100%; background-color: white;"></form></td>'; 
          $rowCount+=$row[$a][$keys[$b]];
           array_push($data[$a],$row[$a][$keys[$b]]);
           $type='multi_result'; 
        }
   
     }

   
}else{
   for($b=0;$b <= count($keys)-1 ;$b++){
       
         
        if(!stristr($keys[$b],'group-')){
       
          $next_key=$keys[$b+1];
          echo '<td ><form id="form['.$a.']['.$keys[$b].']" action="open_detail.php" method="post" target="_top"><input type="hidden" name="detail" value="'.$row[$a][$next_key].'"><input type="submit" name="sub" value="'.$row[$a][$keys[$b]].'" style="border: 0px; width: 100%;background-color: white; "></form></td>';
          $rowCount+=$row[$a][$keys[$b]];
          array_push($data,$row[$a][$keys[$b]]); 
          $type='single_result';
          
           
          
        }
  }

}
echo '</tr>';
}
echo '</tbody>'; 
echo '</table>';
/* 
echo '<pre>';
print_r($data);
echo '</pre>';
echo '<pre>';
print_r($column);
echo '</pre>'; 
echo '<pre>';
print_r($field_column);
echo '</pre>';    */
##################################################################################


 $total= $col_num-$rowCount;
 

function pie_chart($data,$column, $tag,$title,$type){
    $chart.= '<script type="text/javascript">';
    $chart.= 'google.load("visualization", "1", {packages:["corechart"]});';
    $chart.= 'google.setOnLoadCallback(drawChart);';
    $chart.= 'function drawChart() {';
    $chart.= 'var data = google.visualization.arrayToDataTable([';
   
    if($type==0){
     $chart.= "    [ '".$column[0]."'"; 
      
      for($i=1;$i<=count($column)-1;$i++){
    
       $chart.= ", '".$column[$i]."'";
      
       }
        
    $chart.= "],";
    
    for($j=0;$j<=count($data)-1;$j++){
    //  if(count($data)-1 % 2 > 0){
     $chart.=' [ "'.$data[$j][0].'"';
     $k_start=1;
      //}else{
     // $k_start=0;
      
      //}
      for($k=$k_start;$k<=count($data[$j])-1;$k++){
      
      
     
       for($c=0;$c<=count($data[$j])-1;$c++){
         
         $other[$j]+=$data[$j][$c];
       
       }
   
      
       $chart.=", ".$data[$j][$k]." "; 
    
       } 
     
       
          $chart.=' ] ';
          if($j!=count($data)-1){
          
           $chart.=', ';
          }
      }
   
    }elseif($type == 1){
   
     
    
    $chart.= "['項目', '數量'],";
    for($d=0;$d<=count($data)-1;$d++){
    if($d == count($data)-1 and $total==''){
    $chart.= "['".$column[$d]."' , ".$data[$d]."]";
    }else{
    $chart.= "['".$column[$d]."' , ".$data[$d]."],";
    }
    }
     }

    $chart.= ']);';

    $chart.=  'var options = {';
    $chart.=  "title: '".$title."',";
    $chart.=  'is3D: true,';
    $chart.=  '};';

    $chart.=  "var chart = new google.visualization.PieChart(document.getElementById('".$tag."'));";
    $chart.=  'chart.draw(data, options);';
    $chart.=  '}';
    $chart.=  '</script>';
    
  return $chart;  

}


function Stacked_bar_chart($data,$column,$tag,$title){
    $chart.= '<script type="text/javascript">';
    $chart.= 'google.load("visualization", "1.1", {packages:["bar"]});';
    $chart.= 'google.setOnLoadCallback(drawChart);';
    $chart.= 'function drawChart() {';
    $chart.= 'var data = google.visualization.arrayToDataTable([';
    
   
    
      $chart.= "    [ '".$column[0]."'";      
      for($i=1;$i<=count($column)-1;$i++){
    
       $chart.= ", '".$column[$i]."'";
      
       }
        
    $chart.= "],";
    
    for($j=0;$j<=count($data)-1;$j++){
    //  if(count($data)-1 % 2 > 0){
     $chart.=' [ "'.$data[$j][0].'"';
     $k_start=1;
      //}else{
     // $k_start=0;
      
      //}
      for($k=$k_start;$k<=count($data[$j])-1;$k++){
      
      
     
       for($c=0;$c<=count($data[$j])-1;$c++){
         
         $other[$j]+=$data[$j][$c];
       
       }
   
      
       $chart.=", ".$data[$j][$k]." "; 
    
       } 
     
       
          $chart.=' ] ';
          if($j!=count($data)-1){
          
           $chart.=', ';
          }
      }
      
 
    $chart.= "  ]);";
    
         
     $chart.="var options = {";
     $chart.="     chart: {";
     $chart.="       title: '".$title."', ";
     
     $chart.="     },";
     //$chart.="     bars: 'horizontal' ";
     $chart.="   };";

           
    $chart.=  "var chart = new google.charts.Bar(document.getElementById('".$tag."'));"; 
    $chart.=  'chart.draw(data, options);';
    $chart.= '}';
    $chart.= '</script>';
    return $chart;
}




}else{
echo '<p>沒有指定任何條件</p>';

}
if(($_POST['groupby']=='type' or $_POST['groupby']=='language') and !$_POST['item_select']){
?>
<div id="piechart1" style="width:100%; height: 960px;  float:left;"><?php echo pie_chart($data,$column, 'piechart1','結果數量一覽',0); ?></div>  
 
 
<?php
}elseif(!$_POST['groupby'] and $_POST['item_select']){

?>

<div id="piechart1" style="width:100%; height: 960px;  float:left;"><?php echo pie_chart($data,$column, 'piechart1','結果數量一覽',1); ?></div>

<?php

}elseif(($_POST['groupby'] or $_POST['item_select'])and $_POST['condition_select']){//elseif($type=='multi_result'){
?>
 <div id="barchart1" style="width:100%; height: 700px; float:left;" ><?php echo Stacked_bar_chart($data,$column,'barchart1','結果長條圖'); ?></div> 

<?php

}
}


?>
</body>
 
  <!-- Optional localStorage dependancy, for persistent column width storage -->
  <script src="//cdnjs.cloudflare.com/ajax/libs/store.js/1.3.14/store.min.js"></script>

  <!-- Plugin -->
  <script src="../../../model/resize_table/dist/jquery.resizableColumns.min.js"></script>

  <script>
    $(function(){
      $("table").resizableColumns({
        store: window.store
      });
      $(window).resize
    });
  
   
  </script>
</html>