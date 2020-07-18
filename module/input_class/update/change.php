<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<?php
  require "../../../sysfunction/connect.php";
  require "../../../option/option.php";
  
  $result=$pdo->query("SELECT vol FROM `ci_articleFullReference` group by vol");
  
  echo '<form action="" method="post">';
  echo '<select name="vol">';
  foreach($result as $row){
  $num=substr($row['vol'],0,2);
  $subnum=substr($row['vol'],-1);
  echo '<option value="'.$row['vol'].'">'.$num.'卷'.$subnum.'期</option>';
  
  }
  
  echo '</select>';
  
  echo '</form>';
  
  




?>