
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

author='authorArea'+num; 
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
//var tr0=document.createElement("tr");
var td0=document.createElement("td");
var tr1=document.createElement("tr");
var td1=document.createElement("td");
var tr2=document.createElement("tr");
var td2=document.createElement("td");
var tr3=document.createElement("tr");
var td3=document.createElement("td");
var tr3_5=document.createElement("tr");
var td3_5=document.createElement("td");
var tr4=document.createElement("tr");
var td4=document.createElement("td");
td.setAttribute('align','left');


moveup=num-1;
newnum=parseInt(total)+1;

td.innerHTML+="編號：<input type=hidden id='id["+num+"]' name='id["+num+"]' value='"+newnum+"'><label>"+newnum+"</lable>";
td0.innerHTML+="<input type='button' id='dels"+num+"' value='X' name='dels' onclick=del1("+num+")>";
td1.innerHTML+="資源類型：<select name='select["+num+"]' id='select["+num+"]' onchange=change('select["+num+"]','parent_source["+num+"]',"+num+")><option value='null'></option><option value='book'>書籍</option><option value='journal'>期刊論文</option><option value='thesis'>學位論文</option><option value='web'>網路/電子資源</option><option value='newspaper'>報紙</option><option value='conference'>會議論文</option><option value='tool'>工具書</option><option value='report'>技術報告</option><option value='other'>其他</option></select>";
td1.innerHTML+="　引文條目標題：<input type='input' id='title["+num+"]' name='title["+num+"]' value='' size='20'>";　　
td1.innerHTML+="　　引文條目日期(年)(無日期請填0)：<input type='number' min='0001' max='9999' id='date["+num+"]'  name='date["+num+"]' size='20'></td></tr><tr><td colspan='4'>";
td1.innerHTML+="&nbsp;<span style='border-style:groove'>引文條目語言：<input type='radio'  name='language["+num+"]' value='english' checked>西文資源<input type='radio' name='language["+num+"]' value='nonenglish'>中文資源</span>";
td2.innerHTML+="<span id='parent_source["+num+"]'></span>";
td3.innerHTML+="引文條目作者：<div id='authorArea"+num+"'><input type='input' id='author["+num+"][0]' name='author["+num+"][0]' value='' size='20'><label id='control["+num+"][0]' onclick=window.open('open.php?id=NULL&label=control["+num+"][0]&input=control["+num+"][0]&inputvalue=NULL','_blank',config='height=500,width=1000','location=no')>X</label><input type='button' id='but["+num+"][0]' value='X' onclick=delAut3('"+num+"')></div>";
td3_5.innerHTML+="<input type='button' id='add["+num+"]' value='添加' onClick=adds1('"+num+"')>";
td4.innerHTML+="完整條目：<div style='display: block' id='textarea["+num+"]'><textarea class='ckeditor' name='content["+num+"]' id='content["+num+"]'></textarea><input type='button' id='btn["+num+"]' value='完成' onclick=change_text('"+num+"','end')></div><div id='div["+num+"]' ondblclick=change_text('"+num+"','start') onMouseUp=select_text('"+num+"') class='Menu' style='border-style:solid; display: none' ></div><input type='hidden' id='hide["+num+"]' value=''><input type='hidden' id='number["+num+"]' value='"+num+"'>";
var hide1 = document.createElement('input');
/*hide1.id='hide['+num+']';
hide1.type='hidden';
hide1.setAttribute('value','');
td4.appendChild(hide1);*/
//<input type='hidden' id='hide["+num+"]' value=''>

/*var div_2 =document.createElement('div');
div_2.id='div['+num+']';
div_2.className='Menu';
div_2.setAttribute('ondblclick',"change_text('"+num+"','start')");
div_2.setAttribute('onMouseUp',"select_text('"+num+"')");
div_2.setAttribute('style',"border-style:solid; display: none");
//div_2.setAttribute('class','Menu');
td4.appendChild(div_2); */

//td4.innerHTML+="<div id='div["+num+"]' ondblclick=change_text('"+num+"','start') onMouseUp=select_text('"+num+"') class='Menu' style='border-style:solid; display: none' ></div>";
//<div style='display: none' id='textarea["+num+"]'><textarea class='ckeditor' name='content["+num+"]' id='content["+num+"]'></textarea><input type='button' id='btn["+num+"]' value='完成' onclick='change_text('"+num+"','end')></div><div id='div["+num+"]' ondblclick='change_text('"+num+"','start')' onMouseUp='select_text('"+num+"')' class='Menu' style='border-style:solid' ></div><input type='hidden' id='hide["+num+"]' value=""><input type='hidden' id='number["+num+"]' value="+num+" >"
//<textarea class='ckeditor' id='content["+num+"]' name='content["+num+"]' rows='5' cols='185'></textarea>
tbl.appendChild(tr); 
tbl.appendChild(td);
//tbl.appendChild(tr0);
tbl.appendChild(td0);
tbl.appendChild(tr1);
tbl.appendChild(td1);
tbl.appendChild(tr2);
tbl.appendChild(td2);
tbl.appendChild(tr3);
tbl.appendChild(td3);
tbl.appendChild(tr3_5);
tbl.appendChild(td3_5);
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
load_js();
}

function load_js()
   {
      var head= document.getElementsByTagName('head')[0];
      
      var script= document.createElement('script');
      script.type= 'text/javascript';
      script.src= '../js/contextMenu.func.js';
      head.appendChild(script);
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
   change_t_single(parent,0,'期刊名稱：');
   change_t_single(parent,1,'引用頁碼：');
   
   }else if(type!='single'){
   change_t(parent,num,0,'期刊名稱：');
   change_t(parent,num,1,'引用頁碼：');
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
  
  
  function change_text(num,status){
      var divtag=document.getElementById('div['+num+']');
      var txtarea=document.getElementById('textarea['+num+']');
      
          
      //var content='content['+num+']';
      
      if(status=='start'){
      divtag.innerHTML='';
      divtag.style.display='none';
      txtarea.style.display='block';
      }
      
      if(status=='end'){
        

        divtag.style.display='block';
        
       
            var getValue = function(id) {      
                    var content = CKEDITOR.instances[id].getData();
                 return content;
             };
        
          divtag.innerHTML=getValue('content['+num+']');
        //CKEDITOR.instances.Content.setData( '<p>Some other editor data</P>');
        
        //var data = CKEDITOR.instances.content.getData();
        //divtag.innerHTML=data;
        txtarea.style.display='none';
         
      } 
  
  }
  
 
 
  
  
    
    
          
    
   
    
