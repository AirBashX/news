<?php 
include_once("functions/is_login.php"); 
if(!session_id()){//这里使用session_id()判断是否已经开启了Session 
     session_start(); 
} 
if(!is_login()){ 
     echo "请您登录系统后，再访问该页面！"; 
     return; 
} 
?> 
<?php 
include_once("functions/file_system.php"); 
if(empty($_POST)){ 
     $message = "上传的文件超过了php.ini中post_max_size选项限制的值"; 
}else{ 
     $category_id = $_POST["category_id"]; 
     $name = $_POST["name"]; 
     $file_name = $_FILES["category_file"]["name"]; 
     $message = upload($_FILES["category_file"],"uploads"); 
     $sql = "insert into category 
values($category_id,'$name','$file_name')";
 	$message = "分类插入成功！"; 
	include_once("functions/database.php"); 
	get_connection(); 
	mysql_query($sql); 
	close_connection(); 
	$message = "分类插入成功！"; 
}
$message = urlencode($message);
 header("Location:index.php?url=category_list.php&message=$message"); 
?> 