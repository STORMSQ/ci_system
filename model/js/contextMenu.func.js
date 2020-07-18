var getChildNodes=function(ele,status){
   var childArr=ele.children,
         childArrTem=new Array();  
    for(var i=0,len=childArr.length;i<len;i++){
     if(status=='getNumber'){
        if(childArr[i].nodeName=='INPUT'){
            childArrTem.push(childArr[i]);  
        }
      }else{
        if(childArr[i].getAttribute('type')=='input'){
            childArrTem.push(childArr[i]);  
        }
      
      }
    }
    return childArrTem;
}



 function select_text(num) {
 var hid=document.getElementById('hide['+num+']');
             var txt = "";
              
              if (window.getSelection) {
                txt = window.getSelection();
              } else if (document.getSelection) {
                txt = document.getSelection();
               } else if (document.selection) {
                txt = document.selection.createRange().text;
                 }
     
              hid.value=txt; 
              
              }

$('div.Menu').contextMenu('Menu1', 
          {
           
            bindings: 
            {
             
             'title': function(t) {
             
             var number=t.nextSibling.nextSibling.value;             
             var title =document.getElementById('title['+number+']');            
             title.value=t.nextSibling.value;
                
            },
              'date': function(t) {
             var number=t.nextSibling.nextSibling.value;
             var date =document.getElementById('date['+number+']');            
             date.value=t.nextSibling.value;
            },
              'journal': function(t) {
             var number=t.nextSibling.nextSibling.value;
             var source =document.getElementById('source['+number+'][0]');            
             source.value=t.nextSibling.value;
            },
            
           
             'author': function(t) {
             var number=t.nextSibling.nextSibling.value;
             var author=document.getElementById('authorArea'+number);
             //var number =(getChildNodes(author,'getNumber').length)/3;
             var author=getChildNodes(author,'nongetNumber');
             var authorValue = t.nextSibling.value;
             var url='';
             for(var x=0; x <= author.length-1; x++){
             
               if(x==0){
                  url=author[x].id;
               }else{
               
                  url+='<==>'+author[x].id;
               }
             
             }
             
             window.open('author.open.php?ns='+number+'&member='+url+'&value='+authorValue,'_blank',"config='height=500,width=500','location=no");            
             
            }
             
            
            
            
            
          }

     });