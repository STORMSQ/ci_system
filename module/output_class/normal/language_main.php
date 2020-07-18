<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<?php


require "../../../sysfunction/connect.php";

$result=$target->query("SELECT language,count,list FROM `ci_rank_language` order by count DESC");


if(!$_GET['sort']){

$result=$target->query("SELECT language,count,list FROM `ci_rank_language`");

echo '<table border="1" width="100%">';
echo '<tr><th>語言別</th><th><a href="language_main.php?sort=d" >總數▲</a></th><th>引文列表</th></tr>';

foreach($result as $row){
$title='';
if($row['language']=='english'){

  $title='英文資源';
  
}elseif($row['language']=='nonenglish'){

  $title='中文資源';
}



 echo '<tr><td>'.$title.'</td><td>'.$row['count'].'</td><td><form action="open.php" method="post" target="_top" ><input type="hidden" name="detail" value="'.$row['list'].'"><input type="submit" name="submit_1" value="點擊查詢"></form></td></tr>'; 


}


echo '</table>';
}






if($_GET['sort']=='d'){

$result=$target->query("SELECT language,count,list FROM `ci_rank_language` order by count desc");

echo '<table border="1" width="100%">';
echo '<tr><th>類型</th><th><a href="language_main.php" >總數▼</a></th><th>引文列表</th></tr>';

foreach($result as $row){
$title='';
if($row['language']=='english'){

  $title='英文資源';
  
}elseif($row['language']=='nonenglish'){

  $title='非英文資源';
}

 echo '<tr><td>'.$title.'</td><td>'.$row['count'].'</td><td><form action="open.php" method="post" target="_top" ><input type="hidden" name="detail" value="'.$row['list'].'"><input type="submit" name="submit_1" value="點擊查詢"></form></td></tr>'; 


}

echo '</table>';
}



