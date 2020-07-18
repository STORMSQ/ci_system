


function display_div(tag){
  
    var divtag=document.getElementById(tag);
    var hidden_div=document.getElementById('check_col_value');
    
    if(divtag.style.display=='none'){
    
        divtag.style.display='block';
        hidden_div.value='yes';
    }else if(divtag.style.display=='block'){
    
        divtag.style.display='none';
        hidden_div.value='no';
    }



}





function show(num){
      for(var i=0;i<h3obj.length;i++){
        if(i==num){
          h3obj[num].className="titin";
          cobj[num].style.display="block";
        }else{
        
          h3obj[i].className="";
          cobj[i].style.display="none";
        }
      
      }
      
  
}





function check(span,file,content){

  var spanstats=document.getElementById(span);

  var json=content;
  
     var ajax= new Ajax(); 
     
                   ajax.post(file,json,function(data){
                     
                spanstats.innerHTML=data;
    }); 
       
 
 
}



function check2(file,content){  

  var json=content;
  
     var ajax= new Ajax(); 
     
                   ajax.post(file,json,'null');  
       
 
 
}

function check3(file, label,hidden,content,value){
  
  var labeltag=document.getElementById(label);
  var hiddentag=document.getElementById(hidden);
 
  var json=content;
   
   
     var ajax= new Ajax(); 
     
                   ajax.post(file,json,function(data){
                var newdata=data.split(":");
                             
                labeltag.innerHTML=newdata[0];
                
                hiddentag.value=newdata[1];
                if(value==''){
    var url="window.open('open.php?id=NULL&label="+label+"&input="+hidden+"&inputvalue=NULL' ,'_blank', config='height=500,width=1000','location=no')";
    }else{
    var url="window.open('open.php?id="+value+"&label="+label+"&input="+hidden+"&inputvalue="+newdata[1]+"','_blank', config='height=500,width=1000','location=no')";
    } 
              
    labeltag.setAttribute('onclick',url);            
    }); 
   
   

} 

function check4(url,span){

  var spanstats=document.getElementById(span);

  
  
     var ajax= new Ajax(); 
     
                   ajax.get(url,function(data){
                     
                spanstats.innerHTML=data;
    }); 



}




