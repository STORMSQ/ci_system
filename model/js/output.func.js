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
       newRow1.innerHTML="<p><select id='select_type["+r1Num+"]' name='select_type["+r1Num+"]' onchange=outputCustom(this.value,'col["+r1Num+"]',"+r1Num+")><option value='type'>資源類型</option><option value='title'>標題</option><option value='date'>年代</option><option value='language'>語言類型</option><option value='source'>期刊名稱</option><option value='author'>被引作者</option></select><br><input type='input' name='name["+r1Num+"]'  placeholder='在結果欄位中顯示的名稱'  ></p>";
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
   
   function col_delcondition(){
   
     var row= document.getElementById('col_condition');
     
        del_row=row.cells.length-1;
        if(row.cells.length > 1){
        row.deleteCell(del_row);
        }
       /*if(row.cells.length == 1){
          var f_col=document.getElementById('check_col');
        
        } */
   
   
   
   }