<?php
		#+--------------------------------+
		#|          PHP 8.1.4             |
		#+--------------------------------+

###########################[Отправка данных на сервер]##########################

//=========================[Получение данных из строки запроса. GET-запросы]====

	//include 'user(get).php';

	/* Строка запроса представляет набор параметров, которые помещаются в адресе 
	после вопросительного знака. */

	/* Когда мы вводим в адресную строку браузера некий адрес и нажимаем на 
	отправку, то серверу отправляется запрос типа GET */

	// Строка запроса:
	// http://localhost/Metanit(PHP)/sending_data_to_the_server.php?name=Eugene&age=25

	//output from user.php
	// Имя: Eugene
	// Возраст: 25

//=========================[Отправка форм. POST-запросы]========================

	//---------------------[POST-запросы]---------------------------------------
	//include 'form.html';

	// Строка запроса не изменилась:
	// http://localhost/Metanit(PHP)/sending_data_to_the_server.php

	//output from form.php
	// Имя: Maria
	// Возраст: 23


	// Если бы мы отправляли GET'ом, то строка запроса также имела бы следующий вид:
	// http://localhost/Metanit(PHP)/sending_data_to_the_server.php?name=Maria&age=23

//=========================[Безопасность данных]================================
	//include 'form.php';

	// Если мы введем в форму <script>alert("hi")</script>:


	// $name = ($_POST["name"]);
	// скрипт выполнится

	/* $name = htmlentities($_POST["name"]); // функция в качестве параметра 
	принимает значение, которое надо экранировать */
	//output
	// Имя: <script>alert("hi")</script>

	// $name = htmlspecialchars($_POST["name"]); // похожа по действию с предыдущей
	//output
	// Имя: <script>alert("hi")</script>

	// $name = strip_tags($_POST["name"]); // позволяет полностью исключить теги html
	//output
	// Имя: alert("hi")

//=========================[Отправка массивов]==================================
	//include "users.html";

	// Передача в запросе типа GET

	// http://localhost/Metanit(PHP)/sending_data_to_the_server.php?users_get[]=Tom&users_get[]=Bob&users_get[]=Sam

	//output
	// В массиве 3 элемента/ов
	// Tom
	// Bob
	// Sam


	// Передача данных в запросе POST из формы

	//output
	// В массиве 3 элемента/ов
	// Eugene
	// Maria
	// Andrew


	//print_r($_GET); // Array ( [users_get] => Array ( [0] => Tom [1] => Bob [2] => Sam ) )
	echo "<br>";
	//print_r($_POST); // Array ( [users_post] => Array ( [0] => Eugene [1] => Maria [2] => Andrew ) )

	// Если в элементах формы мы явным образом укажем ключи
	// Array ( [users_post] => Array ( [first] => Tom [second] => Bob [third] => Sam ) )

//=========================[Работа с полями ввода форм]=========================
	//include 'second_form.html';

//=========================[Пример обработки форм]==============================
	//include "third_form.html";

//=========================[Отправка файлов на сервер]==========================
	include "upload.php";

	// У каждого объекта файла есть свои параметры, которые мы можем получить:

	// $_FILES["file"]["name"]: имя файла

	// $_FILES["file"]["type"]: тип содержимого файла, например, image/jpeg

	// $_FILES["file"]["size"]: размер файла в байтах

	// $_FILES["file"]["tmp_name"]: имя временного файла, сохраненного на сервере

	//$_FILES["file"]["error"]: код ошибки при загрузке

	echo "<pre>";
	print_r($_FILES);
	echo "</pre>";


	// Array ( [filename] => Array ( [name] => penguin.png [full_path] => penguin.png [type] => image/png [tmp_name] => /tmp/phpUMhKpY [error] => 0 [size] => 1208 ) ) 

	//---------------------[Ограничения и настройка загрузки]-------------------

	// in php.ini

	// upload_tmp_dir = "/home/eugene/localhost/Metanit(PHP)/upload"
	// upload_max_filesize = 10M
?>