<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<?php




function xml_content_parser($file){
$doc = new DOMDocument();
@$doc->load($file);
  
$result=array();   
$chref = $doc->getElementsByTagName( "中參考文獻" );
$enref = $doc->getElementsByTagName( "英__參考文獻" );
$i=0;
foreach($chref as $row){

    
    
       $result[$i]=preg_replace('/(\[.+\])|(【.+】)/Ux','',$row->nodeValue);
     
$i++;    
} 


for($j=0;$j<=count($result)-1;$j++){
//echo '第'.$j.'輪';
     for($k=$j+1;$k<=count($result)-1;$k++){
     
        
         similar_text($result[$j],$result[$k],$percent);
         //echo $result[$j].'<->'.$result[$k].'similar'.$percent.'<br>'; 
         //echo $sim.'<br>';
         if($percent > 99 ){
         
            $result[$k]=null;
         } 
         
     
     }


} 
$array=array();
foreach($result as $row){

  if($row!=null){
  
  array_push($array,$row);
  }
} 
$result_en=array();
$a=0;    
foreach($enref as $row_en){

    
    
       $result_en[$a]=preg_replace('/(\[.+\])|(【.+】)/Ux','',$row_en->nodeValue);
     
$a++;    
} 


for($b=0;$b<=count($result_en)-1;$b++){

     for($c=$b+1;$c<=count($result_en)-1;$c++){
     
        
         similar_text($result_en[$b],$result_en[$c],$percent);

         if($percent == 99 ){
         
            $result_en[$c]=null;
         } 
         
     
     }




} 

foreach($result_en as $row_en1){

  if($row_en1!=null){
  
    array_push($array,$row_en1);
  }

}
$array_1=array_unique($array);


$key=0;
foreach($array_1 as $row){

    $array_2[$key]=$row;
$key++;
}   


$end_key_array=$array_2;

@end($end_key_array);
$end_key=@key($end_key_array);

for($x=0;$x<=$end_key;$x++){

     for($y=$x+1;$y<=$end_key;$y++){
     
    
       similar_text($array_2[$x],$array_2[$y],$percents);
        if($percents > 98){
        
          unset($array_2[$y]);
        }
       
     }




}

 return $array_2;

}

    
function xml_title_parser($chiTag, $engTag, $file){
$doc = new DOMDocument();
@$doc->load($file);

$getChTitle=$doc->getElementsByTagName( $chiTag );

$getEnTitle=$doc->getElementsByTagName( $engTag );


$chtitle=$getChTitle->item(0)->nodeValue;
$entitle=$getEnTitle->item(0)->nodeValue;

$title[0]=$chtitle;
$title[1]=$entitle;

return $title;


}


