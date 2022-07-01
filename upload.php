<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>METANIT.COM</title>
</head>
<body>
	<?php 
	if (isset($_FILES["filename"]) && $_FILES["filename"]["error"] == UPLOAD_ERR_OK)
	{
		$dir = "upload/" . $_FILES["filename"]["name"];
		move_uploaded_file($_FILES["filename"]["tmp_name"], $dir);
		echo "Файл загружен";
	}

	elseif (isset($_FILES["filename"]) && $_FILES["filename"]["error"] != UPLOAD_ERR_OK) 
	{
		echo "Файл не был прикреплен";
	}
	?>

	<h2>Загрузка файла</h2>
	<form method="POST" enctype="multipart/form-data">
		Выберите файл: <input type="file" name="filename" size="10" /><br /><br />
		<input type="submit" value="Загрузить">
	</form>

	<!---------------------[Мультизагрузка]------------------------------------>
	<?php
	echo "-------------------[Мультизагрузка]-------------------<br />";

	if (isset($_FILES["uploads"]))
	{
		$size = 0;

		foreach ($_FILES["uploads"]["error"] as $key => $error) {
			if ($error == UPLOAD_ERR_OK) {
				$tmp_name = $_FILES["uploads"]["tmp_name"][$key];
				$name = $_FILES["uploads"]["name"][$key];
				move_uploaded_file($tmp_name, $name);
			}

			$size += $_FILES["uploads"]["size"][$key];
		}

		if ($size == 0) {
			echo "Файлы не были прикреплены<br>";
		}
		else {
			echo "Файлы загружены<br>";
		}
		//echo $size;
	}
	?>

	<h2>Загрузка файлов</h2>
	<form method="POST" enctype="multipart/form-data">
		<input type="file" name="uploads[]" /><br />
		<input type="file" name="uploads[]" /><br />
		<input type="file" name="uploads[]" /><br /><br />
		<input type="submit" value="Загрузить" />
	</form>
</body>
</html>