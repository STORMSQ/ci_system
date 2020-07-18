<?php

$select = json_decode($_POST['select']);
$bool = json_decode($_POST['bool']);
$action = json_decode($_POST['action']);
$logic = json_decode($_POST['logic']);
$left_sign= json_decode($_POST['left_sign']);
$right_sign= json_decode($_POST['right_sign']);

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
'文獻類型',
'文獻日期',
'文獻標題',
'文獻語言',
'文獻作者',
'無日期',
'AND',
'OR',
'NOT'
);

for($i=0;$i<=count($select)-1;$i++){
 if($i==0){
 
  $content.= $left_sign[$i].' '.preg_replace($eng,$chi,$select[$i]).' '.preg_replace($eng,$chi,$logic[$i]).' '.preg_replace($eng,$chi,$action[$i]).' '.$right_sign[$i].' ';
 }else{
 $content.= '<font color="red"><b>'.preg_replace($eng,$chi,$bool[$i]).'</b></font> '.$left_sign[$i].' '.preg_replace($eng,$chi,$select[$i]).' '.preg_replace($eng,$chi,$logic[$i]).' '.preg_replace($eng,$chi,$action[$i]).' '.$right_sign[$i].' ';
 }

}

echo '<p>查詢條件敘述式預覽，點擊這邊更新預覽</p><p>條件陳述：'.$content.'</p>';

