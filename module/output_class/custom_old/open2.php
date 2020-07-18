<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.9.1.js"></script>
  <script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
  <script src="//apps.bdimg.com/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
  
   
  <link rel="stylesheet" href="http://jqueryui.com/resources/demos/style.css">
  <link rel="StyleSheet" href="../../../model/css/button.css" type="text/css" />
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="../../../model/ajax/ci_ajax.js"></script>
  <script src="../../../model/ajax/ci_function.js"></script>
  
  <script>
   
    
   $(function() {
    $( "#item_for_search, #condition_for_search" ).sortable({
      revert: true,
      stop: function( event, ui ) {
            //alert('aaa');
           var x= document.getElementById('condition_for_search').cells;
            x[0].firstChild.firstChild.firstChild.firstChild.firstChild.style.display='none';
            for(var i=1;i<=x.length-1;i++){
            
            x[i].firstChild.firstChild.firstChild.firstChild.firstChild.style.display='block';
            }
      }
    });
   
    $( "tr, td" ).disableSelection();
    
    $( document ).tooltip();
    
    
    $( ".accordion" ).accordion({
      collapsible: true,
      heightStyle: "content",
      active: 1
    });

    
    
  
   
  });
 

  
 
 
   
//########################### ######################################################################################### 
  function add_condition(row,check){
  
    d= new Date();
    time=d.getTime();
    display='';
     var row=document.getElementById(row);
         
        
        
         if(check=='item'){
         row_number=row.cells.length;
         new_row=row.insertCell(row_number);
         new_row.id='item['+row_number+']';
         new_row.setAttribute('class',"ui-state-default");
         new_row.innerHTML="<p align='right'>欄位篩選　<input type='button' value='X' onclick=del('item','item["+row_number+"]','')></p><select id='item_select["+row_number+"]' name='item_select["+row_number+"]' onchange=select_oper('item_select_option["+row_number+"]',this.value,"+row_number+",'item')><option value='all'>全部</option><option value='type'>文獻類型</option><option value='title'>文獻標題</option><option value='date'>文獻年代</option><option value='language'>文獻語言</option><option value='source'>期刊名稱<option value='author'>文獻作者</option></select><br><div id='item_select_option["+row_number+"]' ><input type='hidden' id='action_item_logic["+row_number+"]' name='action_item_logic["+row_number+"]' value='='><lable>　</label><br><input type='hidden' id='action_item["+row_number+"]' name='action_item["+row_number+"]' value='*'><label>　</label></div>";
         }else if(check == 'condition'){
         
         row_number=row.cells.length;
         if(row_number==0){
          display='none';
         }
         
         new_row=row.insertCell(row_number); 
         row_number=row_number+time;        
         new_row.id='condition['+row_number+']';
         new_row.setAttribute('class',"ui-state-default"); 
         
         if(display=='none'){
         new_row.innerHTML+="<table border=0><tr><td ><select style='display:none' name='bool_condition[]'><option value='and'>AND</option><option value='or'>OR</option><option value='or'>NOT</option></select></td><td><p align='right'><input type='button' value='X'  onclick=del('condition','condition["+row_number+"]','')></p><p>條件</p><select id='condition_select["+row_number+"]' name='condition_select[]' onchange=select_oper('condition_select_option["+row_number+"]',this.value,"+row_number+",'condition')><option value='type'>文獻類型</option><option value='title'>文獻標題</option><option value='date'>文獻日期</option><option value='language'>文獻語言</option><option value='source'>期刊名稱</option><option value='author'>文獻作者</option></select><br><div id='condition_select_option["+row_number+"]' ><input type='hidden' id='action_condition_logic["+row_number+"]' name='action_condition_logic[]' value='='><lable>為</label><br><select id='action_condition["+row_number+"]' name='action_condition[]'><option value='book'>圖書</option><option value='journal'>期刊論文</option><option value='thesis'>學位論文</option><option value='conference'>會議論文</option><option value='web'>電子資源</option><option value='report'>報告</option><option value='tool'>工具書</option><option value='other'>其他</option></select></div>";
         }else{
         new_row.innerHTML+="<table border=0><tr><td ><select style='display:block' name='bool_condition[]'><option value='and'>AND</option><option value='or'>OR</option><option value='or'>NOT</option></select></td><td><p align='right'><input type='button' value='X'  onclick=del('condition','condition["+row_number+"]','')></p><p>條件</p><select id='condition_select["+row_number+"]' name='condition_select[]' onchange=select_oper('condition_select_option["+row_number+"]',this.value,"+row_number+",'condition')><option value='type'>文獻類型</option><option value='title'>文獻標題</option><option value='date'>文獻日期</option><option value='language'>文獻語言</option><option value='source'>期刊名稱</option><option value='author'>文獻作者</option></select><br><div id='condition_select_option["+row_number+"]' ><input type='hidden' id='action_condition_logic["+row_number+"]' name='action_condition_logic[]' value='='><lable>為</label><br><select id='action_condition["+row_number+"]' name='action_condition[]'><option value='book'>圖書</option><option value='journal'>期刊論文</option><option value='thesis'>學位論文</option><option value='conference'>會議論文</option><option value='web'>電子資源</option><option value='report'>報告</option><option value='tool'>工具書</option><option value='other'>其他</option></select></div>";
         }
         }
         
         
  
  }

  
  
  function select_oper(object_obj,value,num,check){
       var object= document.getElementById(object_obj);
       if(check =='item'){
       if(value=='type'){
         object.innerHTML='<input type="hidden" id="action_item_logic['+num+']" name="action_item_logic['+num+']" value="=" ><label>為</label><br><select id="action_item['+num+']" name="action_item['+num+']" ><option value="book">圖書</option><option value="journal">期刊論文</option><option value="thesis">學位論文</option><option value="conference">會議論文</option><option value="web">電子資源</option><option value="report">報告</option><option value="tool">工具書</option><option value="other">其他</option></select>';
      
       }else if(value=='date'){
       
         object.innerHTML='<select id="action_item_logic['+num+']" name="action_item_logic['+num+']" ><option value="=">＝</option><option value=">">＞</option><option value=">=">＞＝</option><option value="<=">＝＜</option><option value="<">＜</option><option value="!=">＜＞</option></select><br><input type="number" id="action_item['+num+']" name="action_item['+num+']" max="9999" >';
       
       }else if(value=='language'){
       
       
          object.innerHTML='<input type="hidden" id="action_item_logic['+num+']" name="action_item_logic['+num+']" value="=" ><label>為</label><br><select id="action_item['+num+']" name="action_item['+num+']" ><option value="english">英文</option><option value="nonenglish">中文</option></select>';
       
       }else if(value == 'author' || value =='source'){
       
         object.innerHTML='<input type="hidden" id="action_item_logic['+num+']" name="action_item_logic['+num+']" value="LIKE" ><label>為</label><br><input type="text" id="action_item['+num+']" name="action_item['+num+']" value="" >';
      
       }else if(value == 'all'){
         object.innerHTML='<input type="hidden" id="action_item_logic['+num+']" name="action_item_logic['+num+']" value="=" ><label>　</label><br><input type="hidden" id="action_item['+num+']" name="action_item['+num+']" value="*" ><label>　</label>';
       
       }else{
       
         object.innerHTML='<select id="action_item_logic['+num+']" name="action_item_logic['+num+']" ><option value="=">絕對等於</option><option value="like">模糊等於</option></select><br><input type="text" id="action_item['+num+']" name="action_item['+num+']" value="" >';
       }
     }else if(check =='condition'){
              
        
     
          if(value=='type'){
            object.innerHTML='<input type="hidden" id="action_condition_logic['+num+']" name="action_condition_logic[]" value="=" ><label>為</label><br><select id="action_condition['+num+']" name="action_condition[]" ><option value="book">圖書</option><option value="journal">期刊論文</option><option value="thesis">學位論文</option><option value="conference">會議論文</option><option value="web">電子資源</option><option value="report">報告</option><option value="tool">工具書</option><option value="other">其他</option></select>';
      
          }else if(value=='date'){
       
            object.innerHTML='<select id="action_condition_logic['+num+']" name="action_condition_logic[]" ><option value="=">＝</option><option value=">">＞</option><option value=">=">＞＝</option><option value="<=">＝＜</option><option value="<">＜</option><option value="!=">＜＞</option></select><br><input type="number" id="action_condition['+num+']" name="action_condition[]" max="9999" >';
       
          }else if(value=='language'){
       
       
             object.innerHTML='<input type="hidden" id="action_condition_logic['+num+']" name="action_condition_logic[]" value="=" ><label>為</label><br><select id="action_condition['+num+']" name="action_condition[]" ><option value="english">英文</option><option value="nonenglish">中文</option></select>';
       
         }else if(value == 'author' || value == 'source'){
       
            object.innerHTML='<input type="hidden" id="action_condition_logic['+num+']" name="action_condition_logic[]" value="LIKE" ><label>為</label><br><input type="text" id="action_condition['+num+']" name="action_condition[]" value="" required="required">';
       
          }else if(value=='null'){
       
            object.innerHTML='<input type="hidden" id="action_condition_logic['+num+']" name="action_condition_logic[]" value="=" ><input type="hidden" id="action_condition['+num+']" name="action_condition[]" value="null" ><br><select disabled="disabled"><option>　　　　</option></select>';
          }else{
       
            object.innerHTML='<select id="action_condition_logic['+num+']" name="action_condition_logic[]" ><option value="=">絕對等於</option><option value="LIKE">模糊等於</option></select><br><input type="text" id="action_condition['+num+']" name="action_condition[]" value="" required="required">';
          }
        
        }
     
       
  }
  
  
  function del(type,object,check){
  
    var object = document.getElementById(object);
    
    if(type == 'item'){
        if(check =='first'){
        
           var select =document.getElementById('item_select[0]');
         
              select.selectedIndex=0;
              
              var div_0 = document.getElementById('item_select_option[0]');
              div_0.innerHTML='';
              div_0.innerHTML='<input type="hidden" id="action_item_logic[0]" name="action_item_logic[0]" value="="><label>為</label><br><select id="action_item[0]" name="action_item[0]"><option value="book">圖書</option><option value="journal">期刊論文</option><option value="thesis">學位論文</option><option value="conference">會議論文</option><option value="web">電子資源</option><option value="report">報告</option><option value="tool">工具書</option><option value="other">其他</option></select>';
         }else{
         
           var parent = document.getElementById('item_for_search');
           
          parent.removeChild(object);
         
         
         }
        
   }else if(type == 'condition'){
       /* if(check =='first'){
        
           var select =document.getElementById('condition_select[0]');
         
              select.selectedIndex=0;
              
              var div_0 = document.getElementById('condition_select_option[0]');
              div_0.innerHTML='';
              div_0.innerHTML='<input type="hidden" id="action_condition_logic[0]" name="action_condition_logic[0]" value="="><input type="hidden" id="action_condition[0]" name="action_condition[0]"><p>&nbsp;</p>';
         }else{  */
         
           var parent = document.getElementById('condition_for_search');
           
          parent.removeChild(object);
          var x= document.getElementById('condition_for_search').cells;
          x[0].firstChild.firstChild.firstChild.firstChild.firstChild.style.display='none';
         
      //   }
   
   
   
   }       
  
  }
  
  var num=1;
  function change_target(){
     
     var url = document.getElementById('form');
     url.target='form['+num+']';
       
    num=num+1;
   } 
  
  function main_condition_check(){
  
  var main = document.getElementById('main_condition');
  var sel = document.getElementById('condition_select[0]');
  var opt = document.getElementById('condition_select_option[0]');
 // alert(main.style.display);
  
  if(main.style.display=='none'){
  
    main.style.display='block';
    sel.selectedIndex=0;
    opt.innerHTML = '<input type="hidden" id="action_condition_logic[0]" name="action_condition_logic[0]" value="="><input type="hidden" id="action_condition[0]" name="action_condition[0]"><p>&nbsp;</p>';
    
  }else if(main.style.display=='block'){
  
    main.style.display='none';
    sel.selectedIndex=0;
    opt.innerHTML = '<input type="hidden" id="action_condition_logic[0]" name="action_condition_logic[0]" value="="><input type="hidden" id="action_condition[0]" name="action_condition[0]"><p>&nbsp;</p>';
  }
     
  
  
  
  }
  
  
  function journal_range(index){
  
   var range = document.getElementsByName('journal_range'); 
    for(var i =0 ;i<=range.length-1;i++){
    
    if(i == index ){
    
       range[i].style.display='block';
    }else{
    
       range[i].style.display='none';
    }
    
    
    }
  
  }
 
  </script>
</head>
<body>


<form id="form" action="open_result.php" method="post" target="form[0]" onsubmit="window.open('open_result.php',this.target,'resizable=1,scrollbars=1,width=950,height=800')">

<table  style="border-style: solid" >
<thead>
<tr><th><h2>請設定以下查詢條件</h2></th></tr>
</thead>
<tbody>


<tr>
<td >

<table border="0">
<tbody>
<tr><td><p>設定條件</p><a>拖動可改變順序</a></td></tr>
<tr><td>

<table style="float:left" >
<tr id="condition_for_search">

</tr>
</table>
</td>
</tr>
</tbody>
</table>



<input type="button" value="增加一個條件" onclick="add_condition('condition_for_search','condition')">
</td>
</tr>
<!--
<tr>
<td colspan="2" style="border-style: none">
<div class="accordion">
<H3>客製化表格查詢項目</H3>
<div>
<a>說明：本功能可指定查詢結果之表格呈現方式，可逐一設定每個欄位，而欄位將依據篩選條件呈現結果</a>
<table>
<tbody>

<tr id="item_for_search" >

</tr> 
</tbody>
</table>
<input type="button" value="增加一個欄位" onclick="add_condition('item_for_search','item')">
</div>
</div>
</td>
</tr> -->
<tr>
<td style="border-style: dotted none none"></td></tr>
<tr>
<td><p>指定排列方式</p><input type="radio" name="groupby" value="" checked>不指定排列｜ <input type="radio" name="groupby" value="date" >依照年代排列 ｜ <input type="radio" name="groupby" value="type" >依照文獻類型排列* ｜ <input type="radio" name="groupby" value="title" >依照標題排列 ｜ <input type="radio" name="groupby" value="language" >依照語言排列* ｜ <input type="radio" name="groupby" value="source" >依照期刊名排列 </td>
</tr>
<tr>
<td style="border-style: dotted none none">選定季刊查詢時間範圍<br>
<?php
require "../../../sysfunction/connect.php";
require "../../../option/option.php";
 

?>
<input type="radio" name="journal_check" value=" " onclick="journal_range(0)" checked>全部<input type="radio" name="journal_check" value="volandiss" onclick="journal_range(1)">使用卷期選擇方式設定<input type="radio" name="journal_check" value="year" onclick="journal_range(2)">使用西元年代方式設定<br>
<div name="journal_range" style="display: block">
&nbsp;
</div>
<div name="journal_range" style="display: none">
<?php
$result = $pdo->query("SELECT  volume, group_concat(issue separator ';')  FROM `volumeissue` group by volume order by volume DESC");
  $row=$result->fetchAll(PDO::FETCH_NUM);
  echo "<select id='vol_1' name='vol_1'   onchange=check('vol_1_issue','select_search.php',{vol:this.value,no:1}) >";
  echo '<option value=null disabled="disabled" selected>　</option>';
  foreach($row as $data){
  
  echo '<option value="'.$data[0].'">'.$data[0].'</option>';

  }
  echo '</select>卷';


?>
<span id="vol_1_issue"></span>期
　至　
<?php
echo "<select id='vol_2' name='vol_2'  onchange=check('vol_2_issue','select_search.php',{vol:this.value,no:2}) >";
  echo '<option value=null disabled="disabled" selected>　</option>';
  foreach($row as $data){
  
  echo '<option value="'.$data[0].'">'.$data[0].'</option>';

  }
  echo '</select>卷';

 ?>
 <span id="vol_2_issue"></span>期
</div>
<div name="journal_range" style="display: none">
<input type="number" name="year1" min="1" max="9999" size="5">年 至 <input type="number" name="year2" min="1" max="9999" size="5">年

</div>

</td>
</tr>
<tr>



</tr>
</tbody>
</table>

<table >
<thead>
</thead>
<tbody>
<tr>
<td colspan="2" style="border-style: none">
<div class="accordion">
<H3>客製化表格設定（選用）</H3>
<div>
<a>說明：本功能可指定表格欄位，並設定這些欄位的篩選方式以呈現想要的結果</a>
<table>
<tbody>

<tr id="item_for_search" >

</tr> 
</tbody>
</table>
<input type="button" value="增加一個欄位" onclick="add_condition('item_for_search','item')">
</div>
</div>
</td>
</tr>

</tbody>
</table>
<input type="submit" name="submit" value="送出查詢" style="font-size: 26px; " onclick="change_target()">
</form>


</body>
 
</html>


      