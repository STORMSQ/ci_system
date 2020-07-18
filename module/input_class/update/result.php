<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
<title>引文資料列表</title>
<script src="../../../model/editor/Result/ckeditor.js"></script>
<script src="../../../model/ajax/ci_ajax.js"></script>
<script src="../../../model/ajax/ci_function.js"></script>
<script type="text/javascript" src="../../../sysfunction/pageJS.js"></script>

<body> 

<?php
 
  require "../../../sysfunction/connect.php";
  require "../../../model/form/func_form.php";
  require "../../../option/option.php";
   
 
 if($_GET['submit']){          
         $query=$_GET['value'];
 
      $result=$target->query("SELECT reference,ID  FROM  ci_reference_entry WHERE REF = '$query' order by sort ASC");

      $row=$result->fetchAll(PDO::FETCH_ASSOC);
     
  ?>
  

<h1>以下為引文資料列表</h1>
<h2>點選條目可進入修改</h2>

<table border="0" width="100%"><tr><td>  
<form action="" method="post">  
<table id="parent" border="1">
<tr id='tr0'><th width="80%"><center><b>條目</b></center></th><th width="20%"><center><b>操作</b></center></th></tr> 
<?php
echo "<input type='hidden' id='REF' name='REF' value='$query'>";
@$conName=array_keys($row);
for($i=0;$i<=count($conName)-1;$i++){
$k=$i+1;

echo "<tr id='tr".$k."'>";
//echo '<td>'.$k.'</td>';
echo '<td width="80%">';
//echo '<input type="hidden" name="">';
?><a href=javascript:void(0) onclick="window.open('open.php?action=update&REF=<?php echo $query;?>&ID=<?php echo $row[$i]['ID']; ?>','child', config='height=500,width=1200','_blank','location=no');"><?php echo '<font size="2" >'.$row[$i]['reference'].'</font>';?></a><?php
//echo "<input type='hidden' id='content[".$k."]' name='content[".$k."]' value='".$_POST['content'][$conName[$i]]."'>";

echo "<input type='hidden' id='ID[".$k."]' name='ID[".$k."]' value='".$row[$i]['ID']."'>";
echo '</td>';
echo '<td width="20%" align="center">';
?>
<input type='button' id='<?php echo 'up['.$k.']'; ?>' title='上移一格' value='  ↑  ' onclick='moveUp(<?php echo $k; ?>)'>
<input type='button' id='<?php echo 'down['.$k.']'; ?>' title='下移一格' value='  ↓  '  onclick='moveDown(<?php echo $k; ?>)'>
<input type='button' id='<?php echo 'delete['.$k.']'; ?>' title='刪除此筆資料' value='  X  '  onclick="if(confirm('確定要刪除嗎？')){delRow('<?php echo $query; ?>','<?php echo $row[$i]['ID']; ?>','<?php echo 'tr'.$k; ?>'); }">
<input type='button'  value='  +  '  title='在最底部新增資料' onclick='addRows("<?php echo $query; ?>")'>
<?php
echo "<input type='hidden' id='sort[".$k."]' name='sort[".$k."]' value=".$k.">";
echo '</td>';
echo '</tr>';
 
}
  
 
  
  
?>  
</table>
</td></tr></table>
<input type="submit" name="sub" value="提交新的順序" >
</form>

<input type="hidden" id="nowIndex" value="10"> 
    
<?php
 }
if($_POST['sub']){

 $i=1;
foreach($_POST['ID'] as $row){
 
   //echo $row.'<br>';
   //echo $i.'<br>';
  $target->exec("UPDATE `ci_reference_entry` SET sort='".$i."' WHERE REF='".$_POST['REF']."' AND ID = '$row'");


$i++;
}
  echo "<SCRIPT Language=javascript>";
  echo 'window.location.assign("result.php?value='.$_POST['REF'].'&submit=進入修改")';  
  echo "</SCRIPT>";
  
}

  
