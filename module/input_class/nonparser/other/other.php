<?php session_start();     ?>
<link rel="stylesheet" href="../../../../model/autocomplete/jquery.ui.autocomplete.css">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../../../../model/css/small.css" />
<script src="../../../../model/editor/keyin/ckeditor.js"></script> 
<script src="../../../../model/ajax/ci_ajax.js"></script>
<script src="../../../../model/ajax/ci_function.js"></script>
<style type="text/css">
#article{border:1px solid #ccc; width:400px; height:26px; line-height:26px; padding:2px; font-size:14px; color:#666}
</style>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script type="text/javascript" src="../../../../model/autocomplete/ui/jquery.ui.core.js"></script>
<script type="text/javascript" src="../../../../model/autocomplete/ui/jquery.ui.widget.js"></script>
<script type="text/javascript" src="../../../../model/autocomplete/ui/jquery.ui.position.js"></script>
<script type="text/javascript" src="../../../../model/autocomplete/ui/jquery.ui.autocomplete.js"></script>
<script type="text/javascript">
$(function(){
	$( "#article" ).autocomplete({
		source: "../../../../model/autocomplete/autocomplete.php",
		minLength: 1,
		autoFocus: true
	});
});  
 
 


</script>


</head>
<body>
<p><font color="red">此輸入方法適用於引文可複製使用，而剖析器不支援之形式</font></p>
<form action="../../../../model/action/parser_result.php" target="_blank" method="post" >
<input type="hidden" name="style" value="other">
<input type="hidden" name="format_type" value="manual_auto" checked >
<table border="0" width="50%">
<tr><td colspan='2'><span id="titleSearch"></span></td></tr>
<tr><td colspan='2'>季刊文章標題（中文或英文）<input type="text" id="article" name="article" placeholder="請輸入文章標題"  onkeyup="check('titleSearch','../../../../model/ajax/ci_titleSearch.php',{article:this.value})"  onblur="check('titleSearch','../../../../model/ajax/ci_titleSearch.php',{article:this.value})" onfocus="states()" required="required" /></td></tr>
</table>
<textarea  name="reference" id="reference" class="ckeditor" placeholder="請將引文複製並貼在此處，一個段落為一條引文" onblur="if(this.value.search('&')) this.value=this.value.replace('&','＆');" ></textarea>
<input type="submit" name="submit" value="送出" >
</form>



</body>
</html>
