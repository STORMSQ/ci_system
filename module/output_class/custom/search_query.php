<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
<link rel="stylesheet" href="../../../model/resize_table/dist/jquery.resizableColumns.css">
<link rel="stylesheet" href="../../../model/resize_table/demo/demo.css">
</head>
<body>
<script>

function url_change(url,add){

  return url+'&'+add;

}


</script>
<?php

require "../../../sysfunction/connect.php";
//require "../../../model/action/select.func.php";
require "../../../model/action/page.class.php";



$where='';
   
  $title_sel= $_GET['title_sel'];
  $date_sel= $_GET['date_sel'];
  $author_sel= $_GET['author_sel'];
  $type= $_GET['type'];
  $title= $_GET['title'];
  $date= $_GET['date'];
  $language= $_GET['language'];
  $author= $_GET['author'];
  $submit=$_GET['submit'];
  $showNum=$_GET['showNum'];
  $sort=$_GET['sort'];
  $sort_type=$_GET['sort_type'];
  
  
  if($sort){
  
    if($sort_type=='ASC'){
    $sort_1='ORDER BY '.$sort.' DESC';
    }elseif($sort_type=='DESC'){
    $sort_1='ORDER BY '.$sort.' ASC';
    }else{
    $sort_1='ORDER BY '.$sort.' ASC';
    
    }
  
  }else{
    $sort_1='';
  }
  
  

  if($_GET['submit']){
  $top='1';
  
  if($type!=''){
  
  
    
    $area[0]='`type` = "'.$type.'"';
    
  
  }
  
  
  
  if($title!=''){
  
    if($title_sel=='LIKE'){
    $area[1]='`title` '.$title_sel.' "%'.$title.'%"';
    }else{  
    $area[1]='`title` '.$title_sel.' "'.$title.'"';
    }
  
  }
  
  
  
  if($date!=''){
  
    if($date_sel=='LIKE'){
    $area[2]='`date` '.$date_sel.' "%'.$date.'%"';
    }else{ 
    $area[2]='`date` '.$date_sel.' "'.$date.'"';
    }
  
  }

  if($language!=''){
    
    
    $area[3]='`language` = "'.$language.'"';    
    
  
  }

  if($author!=''){
    
    $area[4]='`author` '.$author_sel.' "%'.$author.'%"';
  
  }
  
        foreach($area as $row){
        
         $tmp.='AND '.$row.' ';
        
        }

  $where='WHERE '.$top.' '.$tmp;
  
  //echo $where;    
  
  //work($target,$where,10);
  
$tmp_result=$target->query("SELECT type as 資源總類, title as 標題, date as 日期, language as 語言, GROUP_CONCAT(author) as 作者 FROM `ci_alldata_4` {$where}  GROUP BY REFID {$sort_1}");
$total=$tmp_result->rowCount();

if(!$showNum){
$page= new page($total,10);

}else{
$page= new page($total,$showNum);
}
$result=$target->query("SELECT type as 資源總類, title as 標題, date as 日期, language as 語言, GROUP_CONCAT(author) as 作者 FROM `ci_alldata_4` {$where} GROUP BY REFID {$sort_1} {$page->limit}");

$result=$result->fetchAll(PDO::FETCH_NUM);
?> 
     <p>顯示數量：<input type="number" value="<?php if($showNum){echo $showNum;}else{ echo 10;} ?>" min='1' max='999'  onblur="javascript:location.href=url_change(location.href,'showNum='+this.value)"></p>
    <table border="1" class="table table-bordered" data-resizable-columns-id="demo-table-v2">
     <thead>
        <tr>
          <th data-resizable-column-id="type"><a href="javascript:location.href=url_change(location.href,'sort=type&sort_type=<?php if(!$sort_type){echo 'ASC';}elseif($sort_type=='ASC'){echo 'DESC';}elseif($sort_type=='DESC'){echo 'ASC';}else{echo 'ASC';}  ?>')">資源種類</a></th>
          <th data-resizable-column-id="title"><a href="javascript:location.href=url_change(location.href,'sort=title&sort_type=<?php if(!$sort_type){echo 'ASC';}elseif($sort_type=='ASC'){echo 'DESC';}elseif($sort_type=='DESC'){echo 'ASC';}else{echo 'ASC';}  ?>')">標題</a></th>
          <th data-resizable-column-id="date"><a href="javascript:location.href=url_change(location.href,'sort=date&sort_type=<?php if(!$sort_type){echo 'ASC';}elseif($sort_type=='ASC'){echo 'DESC';}elseif($sort_type=='DESC'){echo 'ASC';}else{echo 'ASC';}  ?>')">日期</a></th>
          <th data-resizable-column-id="language" ><a href="javascript:location.href=url_change(location.href,'sort=language&sort_type=<?php if(!$sort_type){echo 'ASC';}elseif($sort_type=='ASC'){echo 'DESC';}elseif($sort_type=='DESC'){echo 'ASC';}else{echo 'ASC';}  ?>')">語言</a></th>
          <th data-resizable-column-id="author" ><a href="javascript:location.href=url_change(location.href,'sort=author&sort_type=<?php if(!$sort_type){echo 'ASC';}elseif($sort_type=='ASC'){echo 'DESC';}elseif($sort_type=='DESC'){echo 'ASC';}else{echo 'ASC';}  ?>')">作者</a></th>
        </tr>
      </thead>
      <tbody>
<?php      
//echo '<th>資源種類</th><th>標題</th><th>日期</th><th>語言</th><th>作者</th>';
foreach($result as $row){

 switch ($row[0]){
 
   case 'book':
   $row[0]='圖書';
   break; 
   
   case 'journal':
   $row[0]='期刊論文';
   break;
   
   case 'web':
   $row[0]='網路資源';
   break;
   
   case 'tool':
   $row[0]='工具書';
   break;
   
   case 'report':
   $row[0]='技術報告';
   break;
   
   case 'newspaper':
   $row[0]='報紙';
   break;
   
   case 'conference':
   $row[0]='會議論文';
   break;
   
   case 'thesis':
   $row[0]='學位論文';
   break;
   
   default:
   
   $row[0]='其它';
 
 }
 switch($row[3]){
  case 'english':
  $row[3]='西文';
  break;
  default:
  $row[3]='中文';
 }
 
 
 
  
  echo '<tr><td>'.$row[0].'</td><td>'.$row[1].'</td><td>'.$row[2].'</td><td>'.$row[3].'</td><td>'.$row[4].'</td></tr>';
 

}
echo '<tr><td colspan="5">'.$page->displayPage().'</td></tr>';
echo '</tbody>';
?>
</table>
 <?php }?>
  <!-- jQuery -->
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

  <!-- Optional localStorage dependancy, for persistent column width storage -->
  <script src="//cdnjs.cloudflare.com/ajax/libs/store.js/1.3.14/store.min.js"></script>

  <!-- Plugin -->
  <script src="../../../model/resize_table/dist/jquery.resizableColumns.min.js"></script>
  <script>
    $(function(){
      $("table").resizableColumns({
        store: window.store
      });
    });

    
  </script>
</body>
</html>  
