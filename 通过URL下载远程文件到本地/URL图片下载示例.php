<?php  
/** 
 * 通过图片的远程url，下载到本地 
 * @param: $url为图片远程链接 
 * @param: $filename为下载图片后保存的文件名 
 */ 
function GrabImage($url,$filename) {  
 if($url==""):return false;endif;  
 ob_start();  
 readfile($url);  
 $img = ob_get_contents();  
 ob_end_clean();  
 $size = strlen($img);  
 //w 只写——写方式打开文件，同时把该文件内容清空,把文件指针指向文件开始处。
 //如果该文件已经存在，将删除文件已有内容；如果该文件不存在，则建立该文件 
 $fp2=@fopen($filename, "w"); //$filename为文件名 
 fwrite($fp2,$img);  
 fclose($fp2);  
 return $filename;  
 }  
echo GrabImage("http://pic1.sc.chinaz.com/Files/pic/pic9/201606/apic21138_s.jpg","aa.png")
?>