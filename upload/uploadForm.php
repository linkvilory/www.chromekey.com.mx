<?php
if(isset($_FILES["filename"]["type"]))
{
	$validextensions = array("jpeg", "jpg", "png", "JPEG", "JPG", "PNG");
	$temporary = explode(".", $_FILES["filename"]["name"]);
	$file_extension = end($temporary);
	if ((($_FILES["filename"]["type"] == "image/png") || ($_FILES["filename"]["type"] == "image/jpg") || ($_FILES["filename"]["type"] == "image/jpeg")) && ($_FILES["filename"]["size"] < 90000000) && in_array($file_extension, $validextensions)) {
		if ($_FILES["filename"]["error"] > 0)
		{
			echo 0;
		}else{
			if (file_exists("./temp/" . $_FILES["filename"]["name"])) {
				echo 0;
			}else{
				$sourcePath = $_FILES["filename"]["tmp_name"]; // Storing source path of the file in a variable
				$targetPath = "./temp/" . $_FILES["filename"]["name"]; // Target path where file is to be stored
				move_uploaded_file($sourcePath,$targetPath) ; // Moving Uploaded file
				echo "./upload/temp/" . $_FILES["filename"]["name"];
			}
		}
	}else{
		echo 0;
	}
}else{
	echo 0;
}
?>