<?php
header("Content-Type:text/html;charset=UTF-8");
if ((($_FILES["file"]["type"] == "image/gif") //$_FILES["file"]["type"] 其中file为表单的name值
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/pjpeg")||($_FILES["file"]["type"] == "image/jpg"))
&& ($_FILES["file"]["size"] < 2097152))//文件需小于2M
  {
  if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"];
    }
  else
    {
    echo "Upload: " . $_FILES["file"]["name"] . "<br />";
    echo "Type: " . $_FILES["file"]["type"] . "<br />";
    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
    echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";
	if(!file_exists("headPortrait")){//如果headPortrait文件夹不存在则创建该文件夹
		mkdir("headPortrait");
	}
	if (file_exists("headPortrait/" . $_FILES["file"]["name"])){
		echo $_FILES["file"]["name"] . " already exists. ";
	}
	else{
		move_uploaded_file($_FILES["file"]["tmp_name"],
		"headPortrait/" . $_FILES["file"]["name"]);
		echo "Stored in: " . "headPortrait/" . $_FILES["file"]["name"];
	  }
    }
  }
else
  {
	echo "Invalid file!<br/>上传图片失败!";
  }
?>