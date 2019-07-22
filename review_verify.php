<?php 
include_once("functions/database.php"); 
$review_id = $_GET["review_id"]; 
$sql = "update review set state='ÒÑÉóºË' where review_id=$review_id"; 
get_connection(); 
mysql_query($sql); 
close_connection(); 
header("Location:review_list.php"); 
?> 