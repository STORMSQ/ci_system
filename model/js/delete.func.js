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
   Area='authorArea'+num;
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
    
    function two(span,file,content){
   
      check(span,file,content);
      
      del(span);
   
   
   }
 