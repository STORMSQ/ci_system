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
  check2('./delete_method/delete.php',{value:ref,subvalue:id});
 var i=document.getElementById(tag).rowIndex;
 document.getElementById("parent").deleteRow(i);

}


function delAll(ref){
  check2('delete.php',{value:ref});
  alert('刪除成功');

}