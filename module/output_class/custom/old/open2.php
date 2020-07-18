<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.9.1.js"></script>
  <script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
  <link rel="stylesheet" href="http://jqueryui.com/resources/demos/style.css">
  <link rel="StyleSheet" href="../../../model/css/button.css" type="text/css" />
 
  <script>
   
    
   $(function() {
    $( "#item_for_search, #condition_for_search" ).sortable({
      revert: true
    });
   
    $( "tr, td" ).disableSelection();
  });
   
  
  function add_condition(row,check){
  
  
     var row=document.getElementById(row);
         
        
        
         if(check=='item'){
         row_number=row.cells.length;
         new_row=row.insertCell(row_number);
         new_row.id='item['+row_number+']';
         new_row.setAttribute('class',"ui-state-default");
         new_row.innerHTML="<p align='right'><input type='button' value='X' onclick=del('item','item["+row_number+"]','')></p><select id='item_select["+row_number+"]' name='item_select["+row_number+"]' onchange=select_oper('item_select_option["+row_number+"]',this.value,"+row_number+",'item')><option value='type'>文獻類型</option><option value='title'>文獻標題</option><option value='date'>文獻日期</option><option value='language'>文獻語言</option><option value='source'>期刊名稱<option value='author'>文獻作者</option></select><br><div id='item_select_option["+row_number+"]' ><input type='hidden' id='action_item_logic["+row_number+"]' name='action_item_logic["+row_number+"]' value='='><lable>為</label><br><select id='action_item["+row_number+"]' name='action_item["+row_number+"]'><option value='book'>圖書</option><option value='journal'>期刊論文</option><option value='thesis'>學位論文</option><option value='conference'>會議論文</option><option value='web'>電子資源</option><option value='report'>報告</option><option value='tool'>工具書</option><option value='other'>其他</option></select></div>";
         }else if(check == 'condition'){
         
         row_number=row.cells.length;
         
         //row_number=row_number+1;
         new_row=row.insertCell(row_number); 
         row_number=row_number+1;        
         new_row.id='condition['+row_number+']';
         new_row.setAttribute('class',"ui-state-default");
         new_row.innerHTML="<div><table border=1><tr><td><select name='bool_condition["+row_number+"]'><option value='and'>AND</option><option value='or'>OR</option><option value='or'>NOT</option></select></td><td><p align='right'><input type='button' value='X'  onclick=del('condition','condition["+row_number+"]','')></p><p>條件</p><select id='condition_select["+row_number+"]' name='condition_select["+row_number+"]' onchange=select_oper('condition_select_option["+row_number+"]',this.value,"+row_number+",'condition')><option value='type'>文獻類型</option><option value='title'>文獻標題</option><option value='date'>文獻日期</option><option value='language'>文獻語言</option><option value='source'>期刊名稱</option><option value='author'>文獻作者</option></select><br><div id='condition_select_option["+row_number+"]' ><input type='hidden' id='action_condition_logic["+row_number+"]' name='action_condition_logic["+row_number+"]' value='='><lable>為</label><br><select id='action_condition["+row_number+"]' name='action_condition["+row_number+"]'><option value='book'>圖書</option><option value='journal'>期刊論文</option><option value='thesis'>學位論文</option><option value='conference'>會議論文</option><option value='web'>電子資源</option><option value='report'>報告</option><option value='tool'>工具書</option><option value='other'>其他</option></select></div></div>";
         
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
       
       }else{
       
         object.innerHTML='<select id="action_item_logic['+num+']" name="action_item_logic['+num+']" ><option value="=">絕對等於</option><option value="like">模糊等於</option></select><br><input type="text" id="action_item['+num+']" name="action_item['+num+']" value="" >';
       }
     }else if(check =='condition'){
              
        
     
          if(value=='type'){
            object.innerHTML='<input type="hidden" id="action_condition_logic['+num+']" name="action_condition_logic['+num+']" value="=" ><label>為</label><br><select id="action_condition['+num+']" name="action_condition['+num+']" ><option value="book">圖書</option><option value="journal">期刊論文</option><option value="thesis">學位論文</option><option value="conference">會議論文</option><option value="web">電子資源</option><option value="report">報告</option><option value="tool">工具書</option><option value="other">其他</option></select>';
      
          }else if(value=='date'){
       
            object.innerHTML='<select id="action_condition_logic['+num+']" name="action_condition_logic['+num+']" ><option value="=">＝</option><option value=">">＞</option><option value=">=">＞＝</option><option value="<=">＝＜</option><option value="<">＜</option><option value="!=">＜＞</option></select><br><input type="number" id="action_condition['+num+']" name="action_condition['+num+']" max="9999" >';
       
          }else if(value=='language'){
       
       
             object.innerHTML='<input type="hidden" id="action_condition_logic['+num+']" name="action_condition_logic['+num+']" value="=" ><label>為</label><br><select id="action_condition['+num+']" name="action_condition['+num+']" ><option value="english">英文</option><option value="nonenglish">中文</option></select>';
       
         }else if(value == 'author' || value == 'source'){
       
            object.innerHTML='<input type="hidden" id="action_condition_logic['+num+']" name="action_condition_logic['+num+']" value="LIKE" ><label>為</label><br><input type="text" id="action_condition['+num+']" name="action_condition['+num+']" value="" required="required">';
       
          }else if(value=='null'){
       
            object.innerHTML='<input type="hidden" id="action_condition_logic['+num+']" name="action_condition_logic['+num+']" value="=" ><input type="hidden" id="action_condition['+num+']" name="action_condition['+num+']" value="null" ><br><select disabled="disabled"><option>　　　　</option></select>';
          }else{
       
            object.innerHTML='<select id="action_condition_logic['+num+']" name="action_condition_logic['+num+']" ><option value="=">絕對等於</option><option value="LIKE">模糊等於</option></select><br><input type="text" id="action_condition['+num+']" name="action_condition['+num+']" value="" required="required">';
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
        if(check =='first'){
        
           var select =document.getElementById('condition_select[0]');
         
              select.selectedIndex=0;
              
              var div_0 = document.getElementById('condition_select_option[0]');
              div_0.innerHTML='';
              div_0.innerHTML='<input type="hidden" id="action_condition_logic[0]" name="action_condition_logic[0]" value="="><input type="hidden" id="action_condition[0]" name="action_condition[0]"><p>&nbsp;</p>';
         }else{
         
           var parent = document.getElementById('condition_for_search');
           
          parent.removeChild(object);
         
         
         }
   
   
   
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
  
  
  
  </script>
</head>
<body>


<form id="form" action="open_result.php" method="post" target="form[0]" onsubmit="window.open('open_result.php',this.target,'resizable=1,scrollbars=1,width=950,height=800')">
<table border="0" >
<tbody>
<tr>
<td colspan="2" style="border-style: solid">
<p>設定查詢項目</p>
<a>小提示：可使用*查詢全部；拖動可改變順序</a>
<table>
<tbody>

<tr id="item_for_search" >
<td id="item[0]" class="ui-state-default">
<div id="item_id[0]">
<p align='right'><input type="button" value="X" onclick="del('item','item_id[0]','first')"></p>
<select id="item_select[0]" name="item_select[0]" onchange="select_oper('item_select_option[0]',this.value,0,'item')">
<option value="type">文獻類型</option>
<option value="title">文獻標題</option>
<option value="date">文獻日期</option>
<option value="language">文獻語言</option>
<option value="source">期刊名稱</option>
<option value="author">文獻作者</option>
</select><br>

<div id='item_select_option[0]' >

<input type="hidden" id="action_item_logic[0]" name="action_item_logic[0]" value="=" ><label>為</label><br><select id="action_item[0]" name="action_item[0]" ><option value="book">圖書</option><option value="journal">期刊論文</option><option value="thesis">學位論文</option><option value="conference">會議論文</option><option value="web">電子資源</option><option value="report">報告</option><option value="tool">工具書</option><option value="other">其他</option></select>
</div>
</div>
</td>
</tr> 
</tbody>
</table>
<input type="button" value="增加一個項目" onclick="add_condition('item_for_search','item')">
</td>
</tr>

<tr>
<td style="border-style: solid">
<input type="checkbox" onchange="main_condition_check()">開啟/關閉指定排列條件
<span id="main_condition" style='display: none'>
<a>如指定排列條件，則搜尋結果將根據此條件逐一列出相符的結果</a>
<table border="1">
<tbody>
<tr>
<td id="condition[0]" >
<div id="condition_id[0]">
<p align='right'><input type="button" value="X" onclick="del('condition','condition_id[0]','first')"></p>
<p>此欄位為排列條件</p>
<select id="condition_select[0]" name="condition_select[0]" onchange="select_oper('condition_select_option[0]',this.value,0,'condition')">
<option value="null">不指定</option>
<option value="type">文獻類型</option>
<option value="title">文獻標題</option>
<option value="date">文獻日期</option>
<option value="language">文獻語言</option>
<option value="source">期刊名稱</option>
<option value="author">文獻作者</option>
</select><br>

<div id='condition_select_option[0]' >

<input type="hidden" id="action_condition_logic[0]" name="action_condition_logic[0]" value="=" ><input type="hidden" name="action_condition[0]" value="null"><br>

</div>
</div>
</td>
</tr>
</tbody>
</table>
</span>
</td>
</tr>
<tr>
<td style="border-style: solid">

<table border="0">
<tbody>
<tr><td><p>設定其他條件</p><a>拖動可改變順序</a></td></tr>
<tr id="condition_for_search">

</tr>
</tbody>
</table>



<input type="button" value="增加一個條件" onclick="add_condition('condition_for_search','condition')">
</td>
</tr>
<!--<tr>
<td><input type="button" value="增加一個條件" onclick="add_condition('condition_for_search','condition')"></td>
</tr>-->
<tr>



</tr>
</tbody>
</table>
<!--<input type="text" name="other_condition" size="100" value="" placeholder="其他特殊條件，值的部分必須">    -->
<input type="submit" name="submit" value="送出查詢" style="font-size: 26px; " onclick="change_target()">
</form>


</body>
 
</html>


      