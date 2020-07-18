/**
 *
 *這裡主要放置頁面新增、刪除條目所會調用到的Javascript代碼
 *
 * ##########################################################################################  <==  為分組間隔，相同類型的會放在一起  
 *
 **/  
 
/*#######################################增加作者類##########################################*/
//一般項目專用增加作者
var total=1;
var ANum=0;
var ANum1=1;
 
function adds2(num){
author='authorArea'+num;
ANum++; 
var adds=document.getElementById(author);
var ad=document.createElement("input");
var ad1=document.createElement("input");
var ad2=document.createElement('label');
var ad3=document.createElement("input");


ad.type='input';
ad.id='newAuthor'+'['+num+']['+ANum+']';
ad.name='newAuthor'+'['+num+']['+ANum+']';
var tmpName='newAuthor'+'['+num+']['+ANum+']';


ad2.id='newControl['+num+']['+ANum+']';
ad2.innerHTML='X';
var tmpName2='newControl['+num+']['+ANum+']';


ad3.type='hidden';
ad3.id='newAuthorControl['+num+']['+ANum+']';
ad3.name='newControl['+num+']['+ANum+']';
ad3.value="NULL";
var tmpName3='newAuthorControl['+num+']['+ANum+']';

ad1.type='button';
ad1.id='butAuthor'+'['+num+']['+ANum+']';
var tmpName1='butAuthor'+'['+num+']['+ANum+']';
ad1.setAttribute('onclick',"delAut2('"+author+"','"+tmpName+"','"+tmpName1+"','"+tmpName2+"','"+tmpName3+"')");
ad1.value='X';


ad.setAttribute('onkeyup',"check3('check.php','"+tmpName2+"','"+tmpName3+"',{value:this.value},this.value)");
ad2.setAttribute('onclick',"window.open('open.php?id=NULL&label="+tmpName2+"&input="+tmpName3+"&inputvalue=NULL' ,'_blank', config='height=500,width=1200','location=no')");

adds.appendChild(ad);
adds.appendChild(ad2);
adds.appendChild(ad3);
adds.appendChild(ad1);
adds.appendChild(br);

 
}

function adds(){
author='authorArea'; 
var adds=document.getElementById(author);
var ad=document.createElement("input");
var ad1=document.createElement("input");
var ad2=document.createElement("label");
var ad3=document.createElement("input");

ad.type='input';
ad.id='newAuthor'+'['+ANum+']';
ad.name='newAuthor'+'['+ANum+']';
var tmpName='newAuthor'+'['+ANum+']';


ad2.id='newControl'+'['+ANum+']';
ad2.innerHTML="X";
var tmpName2='newControl'+'['+ANum+']';


ad3.type='hidden';
ad3.id='newAuthorControl'+'['+ANum+']';
ad3.name='newControl'+'['+ANum+']';
var tmpName3='newAuthorControl'+'['+ANum+']';
ad3.value="NULL";

ad1.type='button';
ad1.id='butAuthor'+'['+ANum+']';
var tmpName1='butAuthor'+'['+ANum+']';
ad1.setAttribute('onclick',"delAut2('"+author+"','"+tmpName+"','"+tmpName1+"','"+tmpName2+"','"+tmpName3+"')");
ad1.value='X';
ANum++;
ad.setAttribute('onkeyup',"check3('check.php','"+tmpName2+"','"+tmpName3+"',{value:this.value},this.value)");
ad2.setAttribute('onclick',"window.open('open.php?id=NULL&label="+tmpName2+"&input="+tmpName3+"&inputvalue=NULL' ,'_blank', config='height=500,width=1200','location=no')");
adds.appendChild(ad);
adds.appendChild(ad2);
adds.appendChild(ad3);
adds.appendChild(ad1);
adds.appendChild(br);

 
}




//新項目專用增加作者

function adds1(num){

author='newauthorArea'+num; 
var adds=document.getElementById(author);
var ad=document.createElement("input");
var ad1=document.createElement("label");
var ad2=document.createElement("input");
var ip=document.createElement("input");


ad.type='input';
ad.id='author'+'['+num+']['+ANum1+']';
ad.name='author'+'['+num+']['+ANum1+']';
var NtmpName='author'+'['+num+']['+ANum1+']';

ad1.id='control'+'['+num+']['+ANum1+']';

ad1.innerHTML='X';
var NtmpName2='control'+'['+num+']['+ANum1+']';

ad2.type="hidden";
ad2.id='AuthorControl['+num+']['+ANum1+']';
ad2.name='control['+num+']['+ANum1+']';
ad2.value='NULL';
var NtmpName3='control['+num+']['+ANum1+']';

ip.type="button";
ip.id='butAuthor'+'['+num+']['+ANum1+']';
ip.value="X";
var NtmpName1='butAuthor'+'['+num+']['+ANum1+']';
ip.setAttribute('onclick',"delAut2('"+author+"','"+NtmpName+"','"+NtmpName1+"','"+NtmpName2+"','"+NtmpName3+"')");
ad1.setAttribute('onclick',"window.open('open.php?id=X&label="+NtmpName2+"&input="+NtmpName3+"&inputvalue=NULL' ,'_blank', config='height=500,width=1200','location=no')");
ANum1++;
adds.appendChild(ad);
adds.appendChild(ad1);
adds.appendChild(ad2);
adds.appendChild(ip);
adds.appendChild(br);

 
}
/*####################################項目排序專用#########################################*/

function moveRow(to,from){
var cellData = {
tr: {id:to.id},
cell1: {id:to.cells[0].id},
cell2: {id:to.cells[1].id}//,
//cell3: {id:to.cells[2].id}

}
to.cells[0].id = from.cells[0].id;
to.cells[1].id = from.cells[1].id;
//to.cells[2].id = from.cells[2].id;
var i,j,from_nl,to_nl = [];
for(i = 0;i < 2;i++){
from_nl = from.cells[i].childNodes.length;
to_nl.push(to.cells[i].childNodes.length);
for(j = 0;j < from_nl;j++){
to.cells[i].appendChild(from.cells[i].firstChild);
}
}
from.cells[0].id = cellData.cell1.id;
from.cells[1].id = cellData.cell2.id;

for(i = 0;i < 2;i++){
for(j = 0;j < to_nl[i];j++){
from.cells[i].appendChild(to.cells[i].firstChild);
}
}
to.id = from.id;
from.id = cellData.tr.id;
}

function moveDown(x){
y=x+1;
var tbl = document.getElementById('parent');
var from = document.getElementById('tr' + x);
if(from.rowIndex == tbl.rows.length-1){return;}
var to = tbl.rows[from.rowIndex + 1];
moveRow(to,from);

}

function moveUp(x){
y=x-1;
var tbl = document.getElementById('parent');
var from = document.getElementById('tr' + x);


if(from.rowIndex == 1){return;}
var to = tbl.rows[from.rowIndex - 1];
moveRow(to,from);


}
function addRows(callNumber){
var rowcount = document.getElementById('parent').rows.length;
//var x=document.getElementById('parent').insertRow(rowcount);
var t=rowcount+1;
var url='open.php?action=insert&REF='+callNumber;
window.open(url,'child','config=height=500,width=2000');

}

function addR(callNumber,id,content){
var rowcount = document.getElementById('parent').rows.length;
var x=document.getElementById('parent').insertRow(rowcount);

var y=x.insertCell(0);
var z=x.insertCell(1);
//var zz=x.insertCell(2);
var t=rowcount;
var r=t-1;
x.id='tr'+t;


tag='tr'+t;
//y.innerHTML='&nbsp;';
y.innerHTML="<a href='javascript:void(0)' onclick=window.open('open.php?action=update&REF="+callNumber+"&ID="+id+"','child',config='height=500,width=1200');>"+content+"</a><input type='hidden' id='ID["+t+"]' name='ID["+t+"]' value='"+id+"'>";
                                  
z.innerHTML="<input type='button' id='up["+t+"]' title='上' value='  ↑  ' onclick=moveUp('"+t+"')><input type='button' id='down["+t+"]' title='下移一格' value='  ↓  '  onclick=moveDown('"+t+"')><input type='button' id='delete["+t+"]' title='刪除此筆資料' value='  X  '  onclick=if(confirm('確定要刪除嗎')){delRow('"+callNumber+"','"+id+"','"+tag+"');}><input type='hidden' id='sort["+t+"]' name='sort["+t+"]' value='"+t+"'><input type='button' title='在最底部新增資料'  value='  +  '  onclick=addRows('"+callNumber+"')>";
z.align="center";
z.width="20%";
y.width="80%";

}



function delRow(ref,id, tag){
  check2('delete.php',{value:ref,subvalue:id});
 var i=document.getElementById(tag).rowIndex;
 document.getElementById("parent").deleteRow(i);

}


function delAll(ref){
  check2('deleteA.php',{value:ref});
  alert('刪除成功');

}

/*#################################新增整個新的條目###########################################*/
function addarea(){
num=total;
var adds=document.getElementById('parent').firstChild;
var div=document.createElement('tr');
div.id=num;

var out=document.createElement('td');
out.id='td'+num;
nums=num;

var tbl=document.createElement("table");

tbl.style.width="100%";
tbl.setAttribute("border","0");
var tr=document.createElement("tr");
var td=document.createElement("td");
var tr0=document.createElement("tr");
var td0=document.createElement("td");
var tr1=document.createElement("tr");
var td1=document.createElement("td");
var tr2=document.createElement("tr");
var td2=document.createElement("td");
var tr3=document.createElement("tr");
var td3=document.createElement("td");
var tr4=document.createElement("tr");
var td4=document.createElement("td");
td.setAttribute('align','right');
moveup=num-1;
newnum=parseInt(total)+1;
td.innerHTML="<input type='button' id='dels"+num+"' value='X' name='dels' onclick=del1("+num+")>";
td0.innerHTML+="<div>編號：<input type=hidden id='id["+num+"]' name='id["+num+"]' value='"+newnum+"'><label>"+newnum+"</lable></div>";
td1.innerHTML+="資源種類：<select name='select["+num+"]' id='select["+num+"]' onchange=change('select["+num+"]','parent_source["+num+"]',"+num+")><option value='null'></option><option value='book'>書籍</option><option value='journal'>期刊論文</option><option value='thesis'>學位論文</option><option value='web'>網路/電子資源</option><option value='newspaper'>報紙</option><option value='conference'>會議論文</option><option value='tool'>工具書</option><option value='report'>技術報告</option><option value='other'>其他</option></select>";
td1.innerHTML+="　標題：<input type='input'  name='title["+num+"]' value='' size='20'>";　　
td1.innerHTML+="　　日期(年)：<input type='number' min='0001' max='9999'  name='date["+num+"]' size='20'></td></tr><tr><td colspan='4'>";
td1.innerHTML+="&nbsp;<span style='border-style:groove'>語言：<input type='radio'  name='language["+num+"]' value='english' checked>西文資源<input type='radio' name='language["+num+"]' value='nonenglish'>中文資源</span>";
td2.innerHTML+="<span id='parent_source["+num+"]'></span>";
td3.innerHTML+="作者：<div id='newauthorArea"+num+"'><input type='input' id='author["+num+"][0]' name='author["+num+"][0]' value='' size='20'><label id='control["+num+"][0]' onclick=window.open('open.php?id=NULL&label=control["+num+"][0]&input=control["+num+"][0]&inputvalue=NULL','_blank',config='height=500,width=1000','location=no')>X</label><input type='button' id='but["+num+"][0]' value='X' onclick=delAut3('"+num+"')></div>";
td3.innerHTML+="<input type='button' id='add["+num+"]' value='添加' onClick=adds1('"+num+"')>";
td4.innerHTML+="完整條目：<textarea class='ckeditor' id='content["+num+"]' name='content["+num+"]' rows='5' cols='185'></textarea>";

tbl.appendChild(tr);
tbl.appendChild(td);
tbl.appendChild(tr0);
tbl.appendChild(td0);
tbl.appendChild(tr1);
tbl.appendChild(td1);
tbl.appendChild(tr2);
tbl.appendChild(td2);
tbl.appendChild(tr3);
tbl.appendChild(td3);

tbl.appendChild(tr4);
tbl.appendChild(td4);


out.appendChild(tbl);
div.appendChild(out);

adds.appendChild(div);

va='content['+num+']';
CKEDITOR.replace(va);
window.onload = function() {
        CKEDITOR.replace(va);
    };   
total++; 
}


function addarea1(number){
total = number;

var adds=document.getElementById('parent').firstChild;

var div=document.createElement("div");
var del=document.getElementById('buttonchange');
var fir=document.getElementById('first');
del.removeChild(first);

var sec=document.createElement("input");
sec.type="button";
sec.id='second';
sec.value='增加一個欄位';
sec.setAttribute('onclick',"addarea()");
del.appendChild(sec);
addarea();
        
}


 

/*##########################################################################################*/

 function two(span,file,content){
   
      check(span,file,content);
      
      del(span);
   
   
   }
 


/*##############################資料類型改變時專用###########################################*/
 function change(id,parent_tag,num,type){
   
   var objects=document.getElementById(id).selectedIndex;
   var parent=document.getElementById(parent_tag);
   
      
   switch(objects){
   case 0:
    change_d(parent);
    break;
   case 1:
    change_d(parent);
   break;
   case 2:
   change_d(parent);
   if(type=='single'){
   change_t_single(parent,num,'期刊名稱：');
   
   }else{
   change_t(parent,num,'0','期刊名稱：',type);
   }
   break;
   case 3:
    change_d(parent);
   break;
   case 4:
    change_d(parent);
   break;
   case 5: 
    change_d(parent);
   break;
   case 6:
    change_d(parent);
   break;
   
   
   
   }
   
   
   }
  function change_t_single(parent_tag,num,word){
  
     
     var first = document.createElement('span');
         
     first.id='source_tag['+num+']';
     first.innerHTML="<label id='word["+num+"]'>"+word+"</label>";
     first.innerHTML+="<input type='input' id='source["+num+"]' name='source["+num+"]' value='' size='20'>";
     
     
     parent_tag.appendChild(first);
     
     
  
  } 
  function change_t(parent_tag,num,num_2,word){
  
     
     var first = document.createElement('span');
     
     
     
     first.id='source_tag['+num+']';
     first.innerHTML="<label id='word["+num+"]["+num_2+"]'>"+word+"</label>";
     first.innerHTML+="<input type='input' id='source["+num+"]["+num_2+"]' name='source["+num+"]["+num_2+"]' value='' size='20'>";

  
     parent_tag.appendChild(first);
     
     
  
  }
  
  function change_d(p_tag){
    
    p_tag.innerHTML='';
   
  }
   
 /*##########################################################################################*/  
   function del(chitag, value, subvalue){
     check2('delete.php',{value:value,subvalue:subvalue});
     var i =document.getElementById(chitag).rowIndex;
document.getElementById("parent").deleteRow(i);
//var child=document.getElementById(chitag);
//parent=deleteRow(chitag);

   

}


function del1(tag){

var i=document.getElementById(tag).rowIndex;


document.getElementById("parent").deleteRow(i);

   

}



/*##########################################################################################*/
   function delAut(tag, chtag1, chtag2, button, numbers,span,span1){
   check2('deleteAut.php',{value:numbers});
   var parent1=document.getElementById(tag);
   var child1=document.getElementById(chtag1);
   var child2=document.getElementById(chtag2);                //後端刪除專用(有值)
   var child3=document.getElementById(button);
   var child4=document.getElementById(span);
   var child5=document.getElementById(span1);
   
   parent1.removeChild(child1);
   parent1.removeChild(child2);
   parent1.removeChild(child3);
   parent1.removeChild(child4);
   parent1.removeChild(child5);
   }
   
  
   
   
   function delAut2(tag, chtag1, button,span,span1){                   //常規刪除專用(沒有值)
      
   var parent1=document.getElementById(tag);
   var child1=document.getElementById(chtag1);
   var child2=document.getElementById(span);
  
   var child3=document.getElementById(button);
   var child4=document.getElementById(span1);  
   parent1.removeChild(child1);
   parent1.removeChild(child2);
   parent1.removeChild(child3);
   parent1.removeChild(child4);
   }
   
   
   function delAut3(num){
   Nauthor='author['+num+'][0]';
   Area='newauthorArea'+num;
   buttons='but['+num+'][0]';
   control='control['+num+'][0]';
   var parent1=document.getElementById(Area);
   var child1=document.getElementById(Nauthor);           //額外刪除專用(沒有值)
   var child2=document.getElementById(control);
   var child3=document.getElementById(buttons);
   parent1.removeChild(child1);
   parent1.removeChild(child2);
   parent1.removeChild(child3);
   }
  /*###############################################################################  */
  
   function outputCustom(type,tag,num){
 
    var main=document.getElementById(tag);
    main.innerHTML='';
 
   
      
      var lab=document.createElement('label');
      var sel=document.createElement('select');
      var intag=document.createElement('input');
      var br=document.createElement('br');
      var br2=document.createElement('br');
      var br3 =document.createElement('br');
      intag.id='condition['+num+']';
      intag.name='condition['+num+']';
      intag.placeholder="如不需條件可空白";
      sel.name='condition_sel['+num+']';
      
      if(type=='date'){
      sel.innerHTML='<option value="=">=</option><option value=">">></option><option value="<"><</option><option value=">=">>=</option><option value="<="><=</option>';
      
      }else if(type=='author'){
      
            sel.innerHTML='<option value="LIKE">LIKE</option>';
      }else{
      sel.innerHTML='<option value="=">=</option><option value="LIKE">LIKE(%...%)</option>';
      }
      
      lab.innerHTML='篩選條件';
      
    main.appendChild(lab);
    main.appendChild(br2); 
    main.appendChild(sel);   
    main.appendChild(br3);  
    main.appendChild(intag);
    main.appendChild(br);    
  
 
 
 
   }
   
   
   function addcondition(row1,row2){
   
     var r1=document.getElementById(row1);
     var r2=document.getElementById(row2);
     
     r1Num=r1.cells.length;
     r2Num=r2.cells.length;
     
     
     if(r1Num <= 9){
     var newRow1=r1.insertCell(r1Num);
     var newRow2=r2.insertCell(r2Num);
       newRow1.innerHTML="<p><select id='select_type["+r1Num+"]' name='select_type["+r1Num+"]' onchange=outputCustom(this.value,'col["+r1Num+"]',"+r1Num+")><option value='type'>資源類型</option><option value='title'>標題</option><option value='date'>年代</option><option value='language'>語言類型</option><option value='source'>期刊名稱</option><option value='author'>被引作者</option></select><br><input type='input' name='name["+r1Num+"]'  placeholder='在結果欄位中顯示的名稱' required='required' ></p>";
       newRow1.innerHTML+="";
       newRow2.innerHTML="<span id='col["+r2Num+"]'></span>";
      outputCustom('type','col['+r2Num+']',r2Num);
     }else{
     
     alert('欄位上限為10個');
     
     }
   
   
   }
   
   function delCon(){
      
     var delr_1= document.getElementById('r_1');
     var delr_2= document.getElementById('r_2');
     
        delr1=delr_1.cells.length-1;
        delr2=delr_2.cells.length-1;
     if(delr_1.cells.length > 1){   
      delr_1.deleteCell(delr1);
      delr_2.deleteCell(delr2); 
     }
   
   
   }
   
  
   function col_addcondition(row){
     var row=document.getElementById(row);
     var origin = document.getElementById('check_col');
     
     if(origin.value==''){
     
     alert('第一個條件必須先填滿');
     
     }else{
     
     
     
     
   
         
     r1=row.cells.length;

     
     
     if(r1 <= 5){
     var newRow1=row.insertCell(r1);
     
       newRow1.innerHTML="<p><select name='col_where["+r1+"]'><option value='AND'>AND</option><option value='OR'>OR</option><option value='NOT'>NOT</option></select><select name='col_w["+r1+"]'><option value='='>=</option><option value='>'>></option><option value='<'><</option><option value='>='>>=</option><option value='<='><=</option><option value='<>'>!=</option><option value='LIKE'>LIKE</option></select><input name='col_condition["+r1+"]' size='10'></p>";
      
     }else{
     
     alert('欄位上限為10個');
     
     }
   
    }
   }