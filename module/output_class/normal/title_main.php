<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<?php                                                                    
                                                                    
require "../../../sysfunction/connect.php";
require "../../../model/action/page.class.php";


if(!$_GET['sort']){ 

  $result=$target->query("SELECT title,count,list FROM `ci_rank_title`");

  $page= new page($result->rowCount(), $_GET['s']);
  
 $result=$target->query("SELECT title,count,list FROM `ci_rank_title` order by count ASC {$page->limit} "); 
  
 echo '顯示資料筆數：<form action="" method="get"><input type="number" name="s" min="1" max="50"><input type="submit" name="sub" value="送出"></form><br>';
 echo '<table border="1" width="100%">';
 echo '<tr><th>條目標題</th><th><a href="title_main.php?sort=d&s='.$_GET['s'].'" >總數▲</a></th><th>引文列表</th></tr>';
 foreach($result as $row){

 
  
  echo '<tr><td>'.$row['title'].'</td><td>'.$row['count'].'</td><td><form action="open.php" method="post" target="_top" ><input type="hidden" name="detail" value="'.$row['list'].'"><input type="submit" id="submit_1" name="submit_1" value="點擊查詢" ></form></td></tr>';
  

}
echo '</table>';

echo $page->displayPage();



}elseif($_GET['sort']=='d'){


  $result=$target->query("SELECT title,count,list FROM `ci_rank_title`");

  $page= new page($result->rowCount(), $_GET['s']);
  
 $result=$target->query("SELECT title,count,list FROM `ci_rank_title` order by count DESC {$page->limit} "); 
  
  echo '顯示資料筆數：<form action="" method="get"><input type="number" name="s" min="1" max="50"><input type="submit" name="sub" value="送出"></form><br>';
 echo '<table border="1" width="100%">';
 echo '<tr><th>條目標題</th><th><a href="title_main.php?s='.$_GET['s'].'" >總數▼</a></th><th>引文列表</th></tr>';
 foreach($result as $row){

 
  
  echo '<tr><td>'.$row['title'].'</td><td>'.$row['count'].'</td><td><form action="open.php" method="post" target="_top" ><input type="hidden" name="detail" value="'.$row['list'].'"><input type="submit" id="submit_1" name="submit_1" value="點擊查詢" ></form></td></tr>';
  

}
echo '</table>';

echo $page->displayPage();




}
