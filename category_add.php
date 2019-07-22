<?php 
include_once("functions/is_login.php"); 
if (!session_id()){//这里使用session_id()判断是否已经开启了Session 
     session_start(); 
} 
if(!is_login()){ 
     echo "请您登录系统后，再访问该页面！"; 
     return; 
} 
?> 
<form action="category_save.php" method="post" enctype="multipart/form-data"> 
类别：<input type="text" size="20" name="name"><br/>	 
<?php 
include_once("functions/database.php"); 
get_connection(); 
$result_set = mysql_query("select * from category"); 
close_connection(); 
while($row = mysql_fetch_array($result_set)){ 
?> 
<?php 
} 
?> 
</select><br/> 
<input type="submit" value="提交"><input type="reset" value="重置"> 
</form> 