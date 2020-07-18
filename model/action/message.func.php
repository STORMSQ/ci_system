<?
Function my_header($redirect){
	echo "<script language=\"javascript\">"; 
	echo "location.href='".$redirect."'"; 
	echo "</script>"; 
	return;
	}

function change($url){
  echo "<script language=\"javascript\">"; 
	echo "getResult('".$url."')"; 
	echo "</script>"; 
	return;


}
  
Function option($msg){
echo "<SCRIPT Language=javascript>";
echo "window.alert('".$msg."')"; 
echo "</SCRIPT>";
echo "<script>";
echo "history.go(-1)";
echo "</script>";


}  

Function my_msg($msg,$redirect){
	echo "<SCRIPT Language=javascript>";
	echo "window.alert('".$msg."')"; 
	echo "</SCRIPT>";
	echo "<script language=\"javascript\">"; 
	echo "location.href='".$redirect."'"; 
	echo "</script>"; 
	return;
}

?>

