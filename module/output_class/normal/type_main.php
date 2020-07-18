<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<?php


require "../../../sysfunction/connect.php";

$result=$target->query("SELECT type,count,list FROM `ci_rank_type` order by count DESC");

if(!$_GET['detail']){
if(!$_GET['sort']){

$result=$target->query("SELECT type,count,list FROM `ci_rank_type`");

echo '<table border="1" width="100%">';
echo '<tr><th>類型</th><th><a href="type_main.php?sort=d" >總數▲</a></th><th>引文列表</th></tr>';
$num=0;
foreach($result as $row){

$title='';
if($row['type']=='journal'){

  $title='期刊論文';
  
}elseif($row['type']=='book'){

  $title='圖書/書籍';
}elseif($row['type']=='thesis'){

  $title='學位論文';

}elseif($row['type']=='web'){

  $title='網路資源';

}elseif($row['type']=='conference'){

   $title='會議論文';

}elseif($row['type']=='report'){

   $title='技術報告';

}elseif($row['type']=='tool'){

   $title='工具書';

}elseif($row['type']=='other'){

   $title='其他';

}elseif($row['type']=='newspaper'){

    $title='報紙';

}


 echo '<tr><td>'.$title.'</td><td>'.$row['count'].'</td><td><form action="open.php" method="post" target="_top" ><input type="hidden" name="detail" value="'.$row['list'].'"><input type="submit" id="submit_1" name="submit_1" value="點擊查詢" ></form></td></tr>'; 

$num=$num+1;
}


echo '</table>';
}






if($_GET['sort']=='d'){

$result=$target->query("SELECT type,count,list FROM `ci_rank_type` order by count desc");

echo '<table border="1" width="100%">';
echo '<tr><th>類型</th><th><a href="type_main.php" >總數▼</a></th><th>引文列表</th></tr>';

foreach($result as $row){
$title='';
if($row['type']=='journal'){

  $title='期刊論文';
  
}elseif($row['type']=='book'){

  $title='圖書/書籍';
}elseif($row['type']=='thesis'){

  $title='學位論文';

}elseif($row['type']=='web'){

  $title='網路資源';

}elseif($row['type']=='conference'){

   $title='會議論文';

}elseif($row['type']=='report'){

   $title='技術報告';

}elseif($row['type']=='tool'){

   $title='工具書';
}elseif($row['type']=='newspaper'){

   $title='報紙';
}elseif($row['type']=='other'){

   $title='其他';

}


 echo '<tr><td>'.$title.'</td><td>'.$row['count'].'</td><td><form action="open.php" method="post" target="_top" ><input type="hidden" name="detail" value="'.$row['list'].'"><input type="submit" id="submit_1" name="submit_1" value="點擊查詢" ></form></td></tr>'; 


}

echo '</table>';
}

}







