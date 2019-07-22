<?php 
function upload($file,$file_path){ 
     $error = $file['error']; 
     switch ($error){ 
     		case 0: 
     			$file_name = $file['name']; 
     			$file_temp = $file['tmp_name']; 
     			$destination = $file_path."/".$file_name; 
     			move_uploaded_file($file_temp,$destination); 
     			return "文件上传成功！"; 
     		case 1: 
     			return "上传附件超过了php.ini中upload_max_filesize选项限制的值！"; 
     		case 2: 
     			return "上传附件的大小超过了form表单MAX_FILE_SIZE选项指定的值！"; 
     		case 3: 
     			return "附件只有部分被上传！"; 
     		case 4: 
     			return "没有选择上传附件！"; 
     } 
} 
function download($file_dir,$file_name){ 
     if (!file_exists($file_dir.$file_name)) { //检查文件是否存在  
     		exit("文件不存在或已删除");  
     } else { 
     		$file = fopen($file_dir.$file_name,"r"); // 打开文件  
     		//强迫浏览器显示保存对话框，并提供一个推荐的文件名 
     		header("Content-Disposition: attachment; filename=".$file_name);  
     		// 输出文件内容  
     		echo fread($file,filesize($file_dir.$file_name));  
     		fclose($file);  
     		exit; 
     }  
} 
?> 