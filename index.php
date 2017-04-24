<?php
namespace classes;

spl_autoload_register(function($className)
{
	$file =  $className . ".php";
	if( !file_exists($file) )
	{
		die("$file not found");
	}

	require_once($file);
});

if($_POST)
{
	$upFile = new UploadFile();
	$upFile->moveUploadedFile();
}

?>

<!doctype html>
<html>
<head>
	<title></title>
</head>
<body>

<form action="index.php" method="POST" enctype="multipart/form-data">
	<input name="userfile" type="file">
	<input type="submit" name="submit" value="Загрузить файл">
</form>

</body>
</html>