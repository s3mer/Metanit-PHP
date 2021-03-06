<?php

		#+--------------------------------+
		#|          PHP 8.1.4             |
		#+--------------------------------+

#######################[Работа с файловой системой]#############################
		
//=====================[Чтение и запись файлов]=================================

	//-----------------[Открытие и закрытие файлов]-----------------------------
	
	/* 
	● 'r': файл открывается только для чтения. Если файла не существует, 
	возвращает false

	● 'r+': файл открывается только для чтения с возможностью записи. Если 
	файла не существует, возвращает false

	● 'w': файл открывается для записи. Если такой файл уже существует, то он 
	перезаписывается, если нет - то он создается

	● 'w+': файл открывается для записи с возможностью чтения. Если такой файл 
	уже существует, то он перезаписывается, если нет - то он создается

	● 'a': файл открывается для записи. Если такой файл уже существует, то 
	данные записываются в конец файла, а старые данные остаются. Если файл не 
	существует, то он создается

	● 'a+': файл открывается для чтения и записи. Если файл уже существует, то 
	данные дозаписываются в конец файла. Если файла нет, то он создается 
	

	Результатом функции fopen будет дескриптор файла. Этот дескриптор 
	используется для операций с файлом и для его закрытия.
	*/

	//$fd = fopen("text.txt", 'r') or die("не удалось открыть файл");
	//fclose($fd);

	//-----------------[Чтение файла]-------------------------------------------

	/* Для построчного чтения используется функция fgets(), которая получает 
	дескриптор файла и возвращает одну считанную строку. */

	/*$fd = fopen("text.txt", 'r') or die("не удалось открыть файл");
	while(!feof($fd))
	{
		$str = htmlentities(fgets($fd));
		echo $str;
	}
	fclose($fd); */

	/* При каждом вызове fgets() PHP будет помещать указатель в конец считанной 
	строки. Чтобы проследить окончание файла, используется функция feof(), 
	которая возвращает true при завершении файла. И пока не будет достигнут 
	конец файла, мы можем применять функцию fgets(). */

	//-----------------[Чтение файла полностью]---------------------------------

	/* Если нам надо прочитать файл полностью, то мы можем облегчить себе жизнь, 
	применив функцию file_get_contents(): */

	//$str1 = htmlentities(file_get_contents("text.txt"));
	//echo $str1;

	/* При этом нам не надо открывать явно файл, получать дескриптор, а затем 
	закрывать файл. */

	//-----------------[Поблочное считывание]-----------------------------------

	/* Также можно провести поблочное считывание, то есть считывать 
	определенное количество байт из файла с помощью функции fread(): */

	/*$fd = fopen("text.txt", 'r') or die ("не удалось открыть файл");
	$str2 = htmlentities(fread($fd, 17));
	echo $str2; //Lorem ipsum dolor
	fclose($fd); */ 

	/* Функция fread() принимает два параметра: дескриптор считываемого файла и 
	количество считываемых байтов. При считывании блока указатель в файле 
	становится в конец этого блока. */

	//-----------------[Запись файла]-------------------------------------------

	/* Для записи файла применяется функция fwrite(), которая записывает в 
	файл строку: */

	/*$fd = fopen("hello.txt", 'w') or die ("не удалось создать файл");
	$str = "Hello world!";
	fwrite($fd, $str);
	fclose($fd);

	// Аналогично работает другая функция fputs():

	$fd2 = fopen("hello.txt", 'w') or die ("не удалось создать файл");
	$str2 = "Hello there";
	fputs($fd2, $str2);
	fclose($fd2);*/

	//-----------------[Работа с указателем файла]------------------------------

	/* При открытии файла для чтения или записи в режиме 'w', указатель в файле 
	помещается в начало. При считывании данных PHP перемещает указатель в файле 
	в конец блока считанных данных. Однако мы также вручную можем управлять 
	указателем в файле и устанавливать его в произвольное место. Для этого надо 
	использовать функцию fseek, которая имеет следующее формальное определение:

	int fseek (resource $handle , int $offset [, int $whence = SEEK_SET ] )

	Параметр $handle представляет дескриптор файла. Параметр $offset - смещение 
	в байтах относительно начала файла, с которого начнется считывание/запись. 
	Третий необязательный параметр задает способ установки смещения. Он может 
	принимать три значения:

	● SEEK_SET: значение по умолчанию, устанавливает смещение в offset байт 
	относительно начала файла

	● SEEK_CUR: устанавливает смещение в offset байт относительно начала текущей 
	позиции в файле

	● SEEK_END: устанавливает смещение в offset байт от конца файла

	В случае удачной установки указателя функция fseek() возвращает 0, а при 
	неудачной установке возвращает -1. */

	/*$fd = fopen("example.txt", 'w+') or die ("Failed to open file");
	$str = "King Eugene"; // строка для записи
	fwrite($fd, $str); // запишем строку в начало
	fseek($fd, 0, SEEK_END); // поместим указатель в конец
	fwrite($fd, " says"); // запишем в конец
	fseek($fd, 16); // поместим указатель в конце первой строки
	fwrite($fd, "\n$str does"); // запишем на след. строке еще одну строку
	fclose($fd);

	if (file_exists("example.txt"))
	{
		//echo "Done";
	} */

	/* example.txt:
	King Eugene says
	King Eugene does
	*/

//=====================[Управление файлами и каталогами]========================

	//-----------------[Перемещение файла]--------------------------------------

	//Для перемещения файла применяется функция rename():

	//if (!rename("hello.txt", "subdir/hello.txt"))
		//echo "Ошибка перемещения файла";
	//else echo "Файл перемещен";

	/* Если у нас в каталоге файла hello.txt имеется подкаталог subdir, то файл 
	будет в него перемещен. Если файл был успешно перемещен, функция возвратит 
	значение true. */

	//-----------------[Копирование файла]--------------------------------------

	/* Для копирования файла используется функция copy(). Она принимает имя 
	копируемого файла, и имя копии файла. И если копирование прошло успешно, 
	возвращает значение true: */

	//if (copy("hello.txt", "hello_copy.txt"))
		//echo "Копия файла создана <br>";
	//else echo "Ошибка копирования файла";

	//-----------------[Удаление файла]-----------------------------------------

	/* Для удаления файла применяется функция unlink, которая принимает имя 
	файла и возвращает значение true при успешном удалении файла: */

	//if (unlink("hello_copy.txt"))
		//echo "Файл удален <br>";
	//else echo "Ошибка при удалении файла";

	//-----------------[Создание каталога]--------------------------------------

	//Для создания каталога используется функция mkdir():

	//if (mkdir("newdir"))
		//echo "Каталог создан <br>";
	//else 
		//echo "Ошибка при создании каталога <br>";

	/* В данном случае mkdir создает новый каталог "newdir" в текущем каталоге. 
	Если создание пройдет успешно, то функция возвращает значение true, иначе - 
	false

	Для создания новой папки в корневом каталоге можно использовать выражение 
	mkdir("/newdir"). */

	//-----------------[Удаление каталога]--------------------------------------

	/* Для удаления каталога применяется функция rmdir(). Ее использование 
	аналогично mkdir(): */

	//if (rmdir("newdir"))
		//echo "Каталог удален <br><br>";
	//else 
		//echo "Ошибка при удалении каталога <br>";

	//-----------------[Операции с каталогами]----------------------------------

	/* Для получения абсолютного пути к текущему каталогу используется функция 
	getcwd(), которая возвращает путь в виде строки: */

	//$path = getcwd();
	//echo $path . "<br><br>"; // /home/eugene/localhost/metanit-php

	/* Функция opendir() открывает определенный каталог для считывания из него 
	информации о файлах и каталогах. При успешном открытии каталога функция 
	возвращает дескриптор открытого каталога. После окончания работы с каталогом 
	его надо закрыть функцией closedir().

	Для считывания имени отдельного файла в открытом каталоге применяется 
	функция readdir().

	Теперь объединим эти функции и выведем на страницу все файлы и подкаталоги 
	из текущего каталога: */

	//$dir = getcwd(); // получаем текущий каталог

	//if (is_dir($dir)) // является ли путь каталогом
	//{
		//if ($dh = opendir($dir)) // открываем каталог
		//{
			//$dh - дескриптор открытого каталога
			//var_dump($dh); // resource(6) of type (stream)
			//echo "<br>";
			//echo $dh; // Resource id #6
			//echo "<br><br>";

			//echo "========================================================<br>";
			// считываем по одному файлу или подкаталогу
        	// пока не дойдем до конца
        	//while (($file = readdir($dh)) !== false) 
        	//{
        		// пропускаем символы . и ..
        		//if ($file == '.' || $file == '..') continue;
        		// если каталог или файл
        		//if (is_dir($file)) echo "каталог: $file <br>";
        		//else echo "файл: $file <br>";
        	//}
        	//closedir($dh); // закрываем каталог
		//}
	//}

//=====================[Блокировка файла. Функция flock]========================

	/* Чтобы ограничить доступ к файлу, в PHP используется функция flock(). 
	Эта функция блокирует доступ к файлу, когда он уже занят одним 
	пользователем, а все остальные запросы ставит в очередь. При освобождении 
	файла он разблокируется, передается первому в очереди пользователю и снова 
	блокируется. 
	
	Функция имеет следующее определение:

	bool flock (resource $handle , int $operation [, int &$wouldblock ])


	Первый параметр - дескриптор файла, возвращаемые функцией fopen().

	Второй параметр указывает на тип блокировки. Он может принимать следующие 
	значения:

	● LOCK_SH (или число 1): разделяемая блокировка (чтение файла)

	● LOCK_EX (или число 2): исключительная блокировка (запись файла)

	● LOCK_UN (или число 3): для снятия блокировки

	● LOCK_NB (или число 4): эта константа используется только вместе с одной из 
	предыдущих в битовой маске (LOCK_EX | LOCK_NB), если не надо ждать пока 
	flock() получит блокировку

	Третий необязательный параметр $wouldblock будет содержать true, если 
	блокировка будет блокирующей.

	При успешном выполнении функция flock возвратит значение true, а в случае 
	ошибки - false. */

	$fd = fopen("hello.txt", 'r+') or die ("Ошибка открытия файла");
	$str = "Hello World!";

	if (flock($fd, LOCK_EX)) // установка исключительной блокировки на запись
	{
		fseek($fd, 0, SEEK_END); // переход в конец файла
		fwrite($fd, "\n$str") or die ("Ошибка записи"); // запись
		flock($fd, LOCK_UN); // снятие блокировки
	}

	fclose($fd);

	/* При открытии файла здесь использовался режим 'r+', а не 'w' или 'w+', 
	так как 'w' и 'w+' уже подразумевают изменение файла. Поэтому при 
	блокировке, даже если надо делать запись, не рекомендуется использование 
	'w' и 'w+'.

	Если нам надо стереть все содержимое файла и перезаписать файл по-новому, 
	то мы можем воспользоваться функцией ftruncate: */

	$fd1 = fopen("hello.txt", 'r+') or die ("Ошибка открытия файла");
	$str1 = "Greetings";

	if (flock($fd1, LOCK_EX)) // установка исключительной блокировки на запись
	{
		ftruncate($fd1, 0); // очищаем файл
		fwrite($fd1, "$str1") or die ("Ошибка записи"); // запись
		flock($fd1, LOCK_UN); // снятие блокировки
	}

	fclose($fd1);
?>