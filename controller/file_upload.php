<?php
/**
* 
*/
class File_upload
{
	
	function image_upload($image)
	{
		if (isset($_FILES[$image])) 
		{
			$errors=array();
			$file_name=$_FILES[$image]['name'];
			$file_tmp=$_FILES[$image]['tmp_name'];
			$file_type=$_FILES[$image]['type'];
			$file_ext=strtolower(end(explode('.',$_FILES[$image]['name'])));
			$expensions=array("jpeg","jpg","png");
			if (in_array($file_ext,$expensions)===false) 
			{
				$errors[]="extension not allowed,please choose a JPEG or PNG file.";
			}
			if (empty($errors)==true) 
			{
				move_uploaded_file("$file_tmp","../images/".$file_name);
				echo "Success";
			}
			else
			{
				print_r($errors);
			}
			return $file_name;
		}
	}
	function pdf_upload($pdf)
	{
		if (isset($_FILES[$pdf])) 
		{
			$errors=array();
			$file_name=$_FILES[$pdf]['name'];
			$file_tmp=$_FILES[$pdf]['tmp_name'];
			$file_type=$_FILES[$pdf]['type'];
			$file_ext=strtolower(end(explode('.',$_FILES[$pdf]['name'])));
			$expensions=array("pdf");
			if (in_array($file_ext,$expensions)===false) 
			{
				$errors[]="extension not allowed,please choose a PDF file.";
			}
			if (empty($errors)==true) 
			{
				move_uploaded_file("$file_tmp","../pdf/".$file_name);
				echo "Success";
			}
			else
			{
				print_r($errors);
			}
			return $file_name;
		}
	}
}
?>