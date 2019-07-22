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
<form action="news_save.php" method="post" enctype="multipart/form-data"> 
标题：	<input type="text"  size="60" name="title"><br/> 
内容：	<textarea cols="60" rows="16" name="content"></textarea><br/>
<br/>
类别：	 
<select name="category_id" size="1"> 
<?php 
include_once("functions/database.php"); 
get_connection(); 
$result_set = mysql_query("select * from category"); 
close_connection(); 
while($row = mysql_fetch_array($result_set)){ 
?> 
     <option value="<?php echo $row['category_id'];?>"><?php echo $row['name'];?></option> 
<?php 
} 
?> 
</select><br/> 
附件：	<input type="file" name="news_file" size="50"> 
<input type="hidden" name="MAX_FILE_SIZE" value="10485760"> 
<br/> 
<input type="submit" value="提交"><input type="reset" value="重置"> 
</form> 