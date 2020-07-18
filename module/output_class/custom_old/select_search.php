<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
<?php
  require "../../../sysfunction/connect.php";
  require "../../../option/option.php";
  
  $vol=$_POST['vol'];
  $no=$_POST['no'];

  $result= $pdo->query("SELECT issue FROM `volumeissue` where volume = ".$vol." ");
  $row= $result->fetchAll(PDO::FETCH_NUM);
  echo '<select name="vol_'.$no.'_issue">';
  foreach($row as $data){
  
  echo '<option value="'.$data[0].'">'.$data[0].'</option>';
  
  }
  echo '<select>';  
?>