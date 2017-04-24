<?php
namespace classes;

class UploadFile extends File
{

	const UPLOAD_DIR = '/filesDir/';

	private function sizeHumanNotation($size)
	{
		
		$sizes = array('B', 'KB', 'MB', 'GB');
		$prev_s = end($sizes); // $prev_s = GB
	
		foreach ($sizes as $s)
		{
			if($size < 1024)
			{
				break;
			}

			if($s != $prev_s)
			{
				$size /= 1024;
			}
		}

		if($s == $sizes[0])
		{
			return sprintf('%1d %s', $size, $s);
		}
		else
		{
			return sprintf('%1.2f %s', $size, $s);
		}

	}

	public function isImage($type)
	{
		$ext = array('image/png','image/jpeg','image/jpg','image/gif');
		
		if(!in_array($type, $ext))
		{
			echo '<script>alert("You can upload only images")</script>';
			return false;
		}
	
		return true;
	}

	public function moveUploadedFile()
	{

		$uploadDir = getcwd();
		$uploadFile = $uploadDir.self::UPLOAD_DIR.$_FILES['userfile']['name'];
		
		if( $this->isImage($_FILES['userfile']['type']) )
		{
			if(move_uploaded_file($_FILES["userfile"]["tmp_name"], $uploadFile))
			{
				echo '<script>alert("File has been uploaded")</script>';	
				echo "Uploaded File Size :" . $this->sizeHumanNotation($_FILES['userfile']['size']);
			}
		}
	}
}
