<?php
header("Content-Type:text/html;charset=UTF-8");
/** 
 * 通过图片的远程url，下载到本地 
 * @param: $url为图片远程链接 
 * @param: $filename为下载图片后保存的文件名 
 */ 
function downloadImage($url,$filename,$weid) {  
	 if($url==""):return false;endif;  
	 ob_start();  
	 readfile($url);  
	 $img = ob_get_contents();  
	 ob_end_clean();  
	 $size = strlen($img);  
	 //当前时间 以此做为文件夹目录
	 $year=date("Y");
	 $month=date("m");
	 $day=date("d");
	 //以当前日期创建目录
	 //"../../../attachment/images/$weid/$year/$month/$day/"为存储目录，
	 $dir="../../../attachment/images/$weid/$year/$month/$day/";
	 if(create_folders($dir)){
		$fp2=@fopen($dir.$filename, "a");//$filename为文件名
		fwrite($fp2,$img);  
		fclose($fp2);
		return $dir.$filename;//返回文件路径
	 }
	 else{
		return false;
	 }
 }
//用mkdir很巧妙的来创建文件夹 推荐使用 
function create_folders($dir){  
	return is_dir($dir) or (create_folders(dirname($dir)) and mkdir($dir, 0777));
}
//开始下载
if(downloadImage("http://pic1.sc.chinaz.com/Files/pic/pic9/201606/apic21138_s.jpg","test.png",3)){
	echo dirname($file);//返回路径中的目录部分
}
else{
	echo "false";
}
?>
参考:
bool mkdir ( string pathname [, int mode [, bool recursive [, resource context]]] )
默认的 mode 是 0777，意味着最大可能的访问权
mode 在 Windows 下被忽略。自 PHP 4.2.0 起成为可选项。