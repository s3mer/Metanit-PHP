<!DOCTYPE html>
<html>
<head>
	<title>METANIT(PHP)</title>
	<meta charset="utf-8" />
</head>
<body>
	<?php

		#+--------------------------------+
		#|          PHP 8.1.4             |
		#+--------------------------------+

#######################[Основы PHP]#############################################
		
//=====================[Типы данных]============================================
		//PHP является языком с динамической типизацией

		// bool (логический тип) -> скалярный 

		// int (целые числа) -> скалярный

		// float (дробные числа) -> скалярный

		// string (строки) -> скалярный

		// array (массивы)

		// object (объекты)

		// callable (функции)

		// mixed (любой тип)

		// resource (ресурсы)

		// null (отсутствие значения)

		//-------------[int (целочисленный тип)]--------------------------------
		$num = -100;
		//echo $num;

		//Шаблоны чисел для других систем:

		// шестнадцатеричные : 0[xX][0-9a-fA-F]

		// восьмеричные : 0[0-7]

		// двоичные : 0b[01]


		// Все числа в десятичной системе имеют значение 28
		$num_10 = 28; // десятичное число
		$num_2 = 0b11100; // двоичное число (28 в десятичной системе)
		$num_8 = 034; // восьмеричное число (28 в десятичной)
		$num_16 = 0x1C; // шестнадцатиричное число (28 в десятичной)

		//echo "num_10 = $num_10 <br>";
		//echo "num_2 = $num_2 <br>";
		//echo "num_8 = $num_8 <br>";
		//echo "num_16 = $num_16 <br>";

		/* Переменная типа int занимает в памяти 32 бита, то есть может 
		принимаь значения от -2 147 483 648 до 2 147 483 647 */

		//-------------[Тип float (числа с плавающей точкой)]-------------------
		$a1 = 1.5;
		$a2 = 1.3e4; // 1.3 * 10^4
		$a3 = 6E-8; // 0.00000006

		//-------------[Тип bool (логический тип)]------------------------------
		$foo = true;
		$boo = false;

		//-------------[Тип string (строки)]------------------------------------
		$a = 10;
		$b = 5;
		$result = "$a + $b <br>";
		//echo $result; // 10 + 5
		$result = '$a + $b'; 
		//echo $result; // $a + $b

		$text = "Модель \"Apple II\"";
		//echo $text;

		//-------------[Специальное значение null]------------------------------
		$c = null;
		//or
		$d = NULL;
		//echo "c = $c<br>d = $d";

		//-------------[Динамическая типизация]---------------------------------
		$id = 123;
		//echo "<p>id = $id </p>";
		$id = "UA";
		//echo "<p>id = $id </p>";

//=====================[Операции в PHP]=========================================
		//-------------[Арифметические операции]--------------------------------
		$a = 8 + 3; // 11, сложение
		$a = 8 - 3; // 5, вычитание
		$a = 8 * 3; // 24, умножение
		$a = 8 / 4; // 2, деление
		$a = 10 % 3; // 1, деление по модулю (получение остатка от деления)
		$a = 8 ** 2; // 64, возведение в степень 

		//-------------[Инкремент и декремент]----------------------------------
		$a = 12;
		$b = ++$a; // (префиксный инкремент)
		//echo "a = $a  b = $b"; //a = 13 b = 13

		$a = 12;
		$b = $a++; // (постфиксный инкремент)
		//echo "a = $a  b = $b"; //a = 13 b = 12

		$a = 12;
		$b = --$a; // (префиксный декремент)		
		//echo "a = $a  b = $b"; //a = 11 b = 11

		$a = 12;
		$b = $a--; // (постфиксный декремент)
		//echo "a = $a  b = $b"; //a = 11 b = 12

		//-------------[Объединение строк]--------------------------------------	
		$a = "Hello";
		$b = "world";
		//echo $a . " " . $b . "!";

		//-------------[Операции сравнения]-------------------------------------

		// == - оператор равенства

		// === - оператор тождественности

		// != - не равно

		// !== - тождественно не равно

		// > - больше

		// < - меньше

		// >= - больше или равно

		// <= - меньше или равно

		//-------------[Оператор равенства и тождественности]-------------------
		$a = (2 == "2");    // true (значения равны)
		$b = (2 === "2");   // false (значения представляют разные типы)

		$a = (2 != "2");    // false, так как значения равны
		$b = (2 !== "2");   // true, так как значения представляют разные типы

		//-------------[Оператор <=>]-------------------------------------------
		$a = 2 <=> 2; // 0    (эквивалентно 2 == 2)
		$b = 3 <=> 2; // 1    (эквивалентно 3 > 2)
		$c = 1 <=> 2; // -1   (эквивалентно 1 < 2)
		#echo "a=$a  b=$b  c=$c"; // a=0  b=1  c=-1

		//-------------[Логические операции]------------------------------------

		// && - И

		// and - И

		// || - Или

		// or - Или

		// ! - Отрицание

		// xor - Исключающее или

		$a = (true && false);  // false
		// аналогично
		$a = (true and false); // false
			 
		$b = (true || false);  // true
		// аналогично следующей операции
		$b = (true or false);  // true
			 
		$c = !true;            // false

		$a = (true xor true);   //  false
		$b = (false xor true);  //  true
		$c = (false xor false); //  false

		//-------------[Поразрядные операции]-----------------------------------
		// & (логическое умножение)
		$a = 4; //100
		$b = 5; //101
		//echo $a & $b; // равно 4 - 100
		/* Поразрядно умножим числа и получим (1*1, 0*0, 0*1) = 100, 
		то есть число 4 в десятичном формате. */

		// | (логическое сложение)
		$a = 4; //100
		$b = 5; //101
		//echo $a | $b; // равно 5 - 101
		/* Поразрядно сложим числа и получим (1+1, 0+0, 0+1) = 101, 
		то есть число 5 в десятичном формате. */

		// ^ (операция исключающего ИЛИ)
		$a = 5 ^ 4; // 101^100=001  - в десятичой системе 1
		$b = 7 ^ 4; // 111^100=011  - в десятичой системе 3
		/* Поразрядно произведем операцию 5 ^ 4 (в двоичной системе она 
		аналогична операции 101^100): (1^1, 0^0, 0^1) = 001. В случае с 1^1 
		значения разрядов совпадают, поэтому возвращается 0. Во втором 
		случае - 0^0 значения также совпадают, поэтому также возвращается 0. 
		В третьем случае - 0^1 значения разные, поэтому возвращается 1. 
		В итоге получится 001 или число 1 в десятичной системе. */

		// ~ (логическое отрицание)
		$a = 4;   //00000100
		$b = ~$a; //11111011  -5
		//echo $b; // равно -5
		/* инвертирует все разряды: если значение разряда равно 1, то оно 
		становится равным нулю, и наоборот. */

		// << (операция сдвига влево)
		$a = 4; //100
		$b = 1; //1
		//echo $a << $b; //1000 = 8
		/* x<<y - сдвигает число x влево на y разрядов. Например, 4<<1 
		сдвигает число 4 (которое в двоичном представлении 100) на один 
		разряд влево, то есть в итоге получается 1000 или число 8 в 
		десятичном представлении */

		// >> (операция сдвига вправо)
		$a = 16; //10000
		$b = 1; //1
		#echo $a >> $b; //1000 = 8
		/* x>>y - сдвигает число x вправо на y разрядов. Например, 16>>1 
		сдвигает число 16 (которое в двоичном представлении 10000) на один 
		разряд вправо, то есть в итоге получается 1000 или число 8 в 
		десятичном представлении */

		//-------------[Операции присваивания]----------------------------------

		// =
		// Приравнивает переменной определенное значение: $a = 5

		// +=
		$a = 12;
		$a += 5;
		//echo $a; //17
		// Сложение с последующим присвоением результата

		// -=
		$a = 12;
		$a -= 5;
		//echo $a; //7
		// Вычитание с последующим присвоением результата

		// *=
		$a = 12;
		$a *= 5;
		//echo $a; //60
		// Умножение с последующим присвоением результата

		// /=
		$a = 12;
		$a /= 5;
		//echo $a; //2.4
		// Деление с последующим присвоением результата

		// .=
		$a = 12;
		$a .= 5;
		//echo $a; //125
		// идентично
		$b = "12";
		$b .= "5";
		//echo "<br>" . $b; //125
		// Объединение строк с присвоением результата

		// %=
		$a = 12;
		$a %= 5;
		//echo $a; //2
		// Получение остатка от деления с последующим присвоением результата

		// **=
		$a = 8;
		$a **= 2;
		//echo $a; //64
		// Получение результата от возведения в степень

		// &=
		$a = 5;
		$a &= 4; //101&100=100 = 4
		// Получение результата от операции логического умножения

		// |=
		$a = 5;
		$a |= 4; //101|100=101 - 5
		// Получение результата от операции логического сложения

		// ^=
		$a = 5; $a ^= 4; // 101^100=001 - 1
		// Получение результата от операции исключающего ИЛИ

		// <<=
		$a = 8; $a <<= 1; // 1000 << 1 = 10000 - 16
		// Получение результата от операции сдвига влево

		// >>=
		$a = 8; $a >>= 1; // 1000 >> 1 = 100 = 4
		//echo $a;
		// Получение результата от операции сдвига вправо

		//-------------[Приоритет операций]-------------------------------------

		// **
		// ++ -- ~
		// !
 		// * / %
		// + - .
		// << >>
		// < > <= >=
		// == != === !== << <=<
		// &
		// ^
		// |
		// &&
		// ||
		// ? : (тернарный оператор)
		// = += -= *= **= /= .= %= &= |= ^= <<= >>= (операторы присваивания)
		// and
		// xor
		// or

//=====================[Конструкция if..else и тернарная операция]==============
		//-------------[Конструкция if..else]-----------------------------------
		$a = 5;
		if ($a > 0) {
			//echo "Переменная а больше нуля";
		}
		elseif ($a < 0) {
			//echo "Переменная а меньше нуля";
		}
		else {
			//echo "Переменная а равна нулю";
		}

		// альтернативный синтаксис
		$a = 5;
		if ($a > 0):
			//echo "Переменная а больше нуля";
		elseif ($a < 0):
			//echo "Переменная а меньше нуля"; 
		else:
			//echo "Переменная а равна нулю";
		endif;
		//echo "<br>Конец выполнения программы";

		//-------------[Определение условия]------------------------------------			
		if (0) {}       // false
		if (-0.0) {}    // false
		if (-1) {}      // true 
		if ("") {}      // false (пустая строка)
		if ("a") {}     // true (непустая строка)
		if (null) {}    // false (значие отсутствует)

		//-------------[Комбинированный режим HTML и PHP]-----------------------
		?>

		<?php
			$a = 5;
		?>

		<?php if ($a > 0) { ?>
			<!--<h2>Переменная а больше нуля</h2>-->
		<?php } ?>

		<?php
		//-------------[Тернарная операция]-------------------------------------
		//[первый операнд - условие] ? [второй операнд] : [третий операнд]
		$a = 7;
		$b = 2;
		$z = $a < $b ? $a + $b : $a - $b;
		#echo $z;

//=====================[Конструкции switch и match]=============================
		//-------------[Конструкция switch..case]-------------------------------
		$a = 7;

		switch ($a)
		{
			case 1:
				echo "сложение";
				break;
			case 2:
				echo "вычитание";
				break;
			case 3:
				echo "умножение";
				break;
			case 4:
				echo "деление";
				break;
			default:
				#echo "действие по умолчанию<br>";
				break;
		}

		// альтернативный синтаксис
		$b = 3;

		switch ($b):
			case 1:
				echo "сложение";
				break;
			case 2:
				echo "вычитание";
				break;
			default:
				#echo "действие по умолчанию<br>";
				break;
		endswitch;

		//-------------[match]--------------------------------------------------
		$a = 2;
		$operation = match($a)
		{
			1 => "сложение",
			2 => "вычитание",
			default => "действие по умолчанию",
		};
		#echo $operation; 


		$a = 3;
		match ($a) 
		{
			1 => $operation = "сложение",
			2 => $operation = "вычитание",
			default => $operation = "действие по умолчанию",
		};
		#echo $operation;

		//-------------[Сравнение значений и типов]-----------------------------
		switch (8.0) {
		 	case "8.0":
		    	$result = "строка";
		    	break;
		  	case 8.0:
			   	$result = "число";
			   	break;
		}
		//echo $result . "<br>"; // строка

		match (8.0) {
			"8.0" => $result = "строка",
			8.0 => $result = "число"
		};
		//echo $result; // число

//=====================[Циклы]==================================================
		//-------------[Цикл for]-----------------------------------------------
		for ($i = 1; $i < 10; $i++)
		{
			//echo "Квадрат числа $i равен " . $i * $i . "<br/>";  
		}

		$i = 0;
		for (; $i < 10; $i++)
		{
			//echo $i;
		}

		$i = 0;
		for (; $i < 10;)
		{
			//echo $i;
			$i += 2;
		}

		for ($i = 1, $j = 1; $i + $j < 10; $i++, $j += 2)
		{
			//echo "$i + $j = " . $i + $j . "<br/>";
		}

		//альтернативный синтаксис
		for ($i = 1; $i < 10; $i++):
			//echo "Квадрат числа $i равен " . $i * $i . "<br/>";
		endfor;

		//-------------[Цикл while]---------------------------------------------
		$counter = 1;
		while ($counter < 10)
		{
			//echo $counter * $counter . "<br/>";
			$counter++;
		}


		$counter = 0;
		//while (++$counter < 10)
			//echo $counter * $counter . "<br/>";
			
		//альтернативный синтаксис
		$counter = 1;
		while ($counter < 10):
			//echo $counter * $counter . "<br/>";
			$counter++;
		endwhile;

		//-------------[Цикл do..while]-----------------------------------------
		//$counter = 1;
		//do
		//{
			//echo $counter * $counter . "<br/>";
			//$counter++;
		//}
		//while ($counter < 10)

		//-------------[Операторы continue и break]-----------------------------
		// break - выйти из цикла, не дожидаясь его завершения

		for ($i = 1; $i < 10; $i++)
		{
			$result = $i * $i;
			if ($result > 10) 
			{
				break;
			}
			//echo "Квадрат числа $i равен $result <br/>";
		}

		// continue - осуществляет переход к следующей итерации цикла

		for ($i = 1; $i < 10; $i++)
		{
			if ($i == 5)
			{
				continue;
			}
			//echo "Квадрат числа $i равен " . $i * $i . "<br/>";
		}

		//-------------[Вложенные циклы]----------------------------------------
		#Таблица умножения
		echo "<table>";
		for ($i = 1; $i < 10; $i++)
		{
			echo "<tr>";
			for ($j = 1; $j < 10; $j++)
			{
				//echo "<td>" . $i * $j . "</td>";
			}
			echo "</tr>";
		}
		echo "</table>";

		#output
		#1	2	3	4	5	6	7	8	9
		#2	4	6	8	10	12	14	16	18
		#3	6	9	12	15	18	21	24	27
		#4	8	12	16	20	24	28	32	36
		#5	10	15	20	25	30	35	40	45
		#6	12	18	24	30	36	42	48	54
		#7	14	21	28	35	42	49	56	63
		#8	16	24	32	40	48	56	64	72
		#9	18	27	36	45	54	63	72	81

//=====================[Массивы]================================================
		$numbers = array();

		$numbers = [];

		$numbers = [1, 2, 3, 4];

		$numbers = array(1, 2, 3, 4);


		$numbers = [1, 4, 9, 16];
		//echo $numbers[2]; //9


		$numbers = [1, 4, 9, 16];
		$numbers[1] = 6;
		//echo $numbers[1]; //6


		$numbers = [1, 4, 9, 16];
		$numbers[5] = 76;
		//echo $numbers[5]; //76


		$numbers = [1, 4, 9, 16];
		$numbers[] = 25;
		//echo $numbers[4]; //25
		//print_r($numbers);

			
		$digits[] = 20;
		$digits[] = 120;
		$digits[] = 720;
		//print_r($digits); // Array ( [0] => 20 [1] => 120 [2] => 720 )

		//-------------[Оператор =>]--------------------------------------------
		$numbers = [0 => 1, 1 => 4, 2 => 9, 3 => 16];
		$numbers = array(0 => 1, 1 => 4, 2 => 9, 3 => 16);

		$numbers = [1 => 1, 2 => 4, 5 => 25, 4 => 16];
		//echo $numbers[2]; //4


		$numbers = [4 => 16, 25, 36, 49, 64];
		//print_r($numbers); // Array ( [4] => 16 [5] => 25 [6] => 36 [7] => 49 [8] => 64 )

		//-------------[Перебор массива]----------------------------------------
		$users = ["Tom", "Sam", "Bob", "Alice"];
		$num = count($users);
		for ($i = 0; $i < $num; $i++)
		{
			//echo "$users[$i] <br />";
		}

		//-------------[Цикл foreach]-------------------------------------------
		$users = [1 => "Tom", 4 => "Sam", 5 => "Bob", 21 => "Alice"];
			
		foreach ($users as $element)
		{
			//echo "$element <br />";
		}


		foreach ($users as $key => $value)
		{
			//echo "$key - $value <br />";
		}

//=====================[Ассоциативные массивы]==================================
		$words = array("red" => "красный", "blue" => "синий", "green" => "зеленый");
		$words = ["red" => "красный", "blue" => "синий", "green" => "зеленый"];


		$countries = ["Germany" => "Berlin", "France" => "Paris", "Spain" => "Madrid"];
		//echo $countries["Spain"]; //Madrid
		echo "<br />";
		$countries["Spain"] = "Barcelona";
		//echo $countries["Spain"]; //Barcelona

		$countries["Italy"] = "Rome"; //определяем новый элемент с ключом "Italy"
		//echo $countries["Italy"]; //Rome


		$countries["Germany"] = "Berlin";
		$countries["France"] = "Paris";
		$countries["Spain"] = "Madrid";
		$countries["Italy"] = "Rome";

		//echo $countries["France"]; //Paris


		$words = ["red" => "червоний", "blue" => "синій", "green" => "зелений"];

		foreach ($words as $english => $ukrainian)
		{
			//echo "$english : $ukrainian <br />";
		}

		//-------------[Смешанные массивы]--------------------------------------
		$data = [1 => "Tom", "id132" => "Sam", 56 => "Bob"];
		//echo $data[1]; //Tom
		//echo "<br />";
		//echo $data["id132"]; //Sam

//=====================[Многомерные массивы]====================================
		$families = array(array("Tom", "Alice"), array("Bob", "Kate"));

		$families = [["Tom", "Alice"], ["Bob", "Kate"]];
		//print_r($families[0]); //Array ( [0] => Tom [1] => Alice )

		//echo $families[0][0] . "<br />"; //Tom
		//echo $families[0][1] . "<br />"; //Alice
		//echo $families[1][0] . "<br />"; //Bob
		//echo $families[1][1] . "<br />"; //Kate

		echo "<table>";
		$families = [["Tom", "Alice"], ["Bob", "Kate"], ["Sam", "Mary"]];
		foreach ($families as $family)
		{
			echo "<tr>";
			foreach ($family as $user)
			{
				//echo "<td>$user</td>";
			}
			echo "</tr>";
		}
		echo "</table>";


		$phones = array(
			"apple" => array("iPhone 12", "iPhone X", "iPhone 12 Pro"),
			"samsung" => array("Samsung Galaxy S20", "Samsung Galaxy S20 Ultra"),
			"nokia" => array("Nokia 8.3", "Nokia 3.4")
		);
		foreach ($phones as $brand => $items)
		{
			//echo "<h3>$brand</h3>";
			echo "<ul>";
			foreach ($items as $key => $value)
			{
				//echo "<li>$value</li>";
			}
			echo "</ul>";
		}

		//echo $phones["apple"][0] . "<br />"; //iPhone 12
		//echo $phones["nokia"][1]; //Nokia 3.4


		$gadgets = array(
			"phones" => array("apple" => "iPhone 12",
			                  "samsung" => "Samsung S20",
			                  "nokia" => "Nokia 8.3"),
			"tablets" => array("lenovo" => "Lenovo Yoga Smart Tab",
				               "samsung" => "Samsung Galaxy Tab S5",
				               "apple" => "Apple iPad Pro")
		);
		foreach ($gadgets as $gadget => $items)
		{
			//echo "<h3>$gadget</h3>";
			echo "<ul>";
			foreach ($items as $key => $value)
			{
				//echo "<li>$key : $value</li>";
			}
			echo "</ul>";
		}

		//echo $gadgets["phones"]["nokia"] . "<br>"; //Nokia 8.3
		// присвоим одному из элементов другое значение
		$gadgets["phones"]["nokia"] = "Nokia 9";
		//echo $gadgets["phones"]["nokia"]; //Nokia 9


		//сокращенный вариант
		$gadgets = [
			"phones" => ["apple" => "iPhone 12",
			             "samsung" => "Samsung S20",
			             "nokia" => "Nokia 8.3"],
			"tablets" => ["lenovo" => "Lenovo Yoga Smart Tab",
			              "samsung" => "Samsung Galaxy Tab S5",
			              "apple" => "Apple iPad Pro"]
		];

		//echo $gadgets["phones"]["samsung"]; //Samsung S20

//=====================[Функции]================================================
		//hello(); // можно сначала вызвать функцию, а потом определить

		//function hello()
		{
			//echo "<h2>Hello PHP</h2>";
		}

		//hello(); // или определить, а потом вызвать
			
//=====================[Параметры функции]======================================
		function hello($name)
		{
			echo "<h2>Hello $name</2>";
		}

		//hello("Tom");
		//hello("Bob");
		//hello("Sam");

		$userName = "Eugene";
		//hello($userName);


		function displayInfo($name, $age)
		{
			echo "<div>Имя: $name <br />Возраст: $age</div><hr>";
		}

		//displayInfo("Tom", 36);
		//displayInfo("Bob", 39);
		//displayInfo("Sam", 28);

		//-------------[Необязательные параметры]-------------------------------
		function personalInfo($name, $age = 18) //$age - необязательный параметр
		{
			echo "<div>Имя: $name <br />Возраст: $age</div><hr>";	
		}

		//personalInfo("Tom", 36);
		//personalInfo("Sam");

		//-------------[Именнованные параметры]---------------------------------
		function info($name, $age = 18)
		{
			echo "<div>Имя: $name <br />Возраст: $age</div><hr>";	
		}		

		//info(age: 23, name: "Bob");
		//info(name: "Tom", age: 36);
		//info(name: "Alice");
		//info("Eugene", age: 25); // любые именованные необязательные 
		//параметры должны располагаться после НЕименованных параметров

		//-------------[Переменное количество параметров]-----------------------
		//function sum(...$numbers) // принять переменное кол-во параметров
		//{
			//$result = 0;
			//foreach ($numbers as $number)
			//{
				//$result += $number;
			//}
			//echo "<p>Сумма: $result</p>";
		//}

		//sum(1, 2, 3);
		//sum(2, 3);
		//sum(4, 5, 8, 10);

		$numbers = [3, 5, 7, 8];
		//sum(...$numbers); // передать переменное кол-во параметров //23


		function getAverageScore($name, ...$scores)
		{
			$result = 0.0;
			foreach ($scores as $score) 
			{
				$result += $score;
			}
			$result = $result / count($scores);
			echo "<p>$name: $result</p>";
		}

		//getAverageScore("Tom", 5, 5, 4, 5);
		//getAverageScore("Bob", 4, 3, 4, 4, 4);

//=====================[Возвращение значений и оператор return]=================
		function add($a, $b)
		{
			return $a + $b;
		}

		//$result = add(5, 6);
		//echo $result; //11
		//echo add(5, 5);


		function plus($a, $b)
		{
			$sum = $a + $b;
			return $sum; // завершение функции
			echo "sum = $sum"; // эта инструкция не выполнится 
		}

		plus(7, 7); //empty


		function addition($a, $b)
		{
			$sum = $a + $b;
			//echo "sum = $sum<br />";
			//return $sum;
		}

		//addition(55, 5);
		$result = addition(5, 6); /* если не используется оператор return 
		то функция все равно возвращает значение - null */
		//echo $result . "<br />";

		//if ($result === null)
			//echo "result = null";
		//else
			//echo "result != null";

//=====================[Анонимные функции]======================================
		$hello = function($name)
		{
			echo "<h2>Hello $name</h2>";
		};

		//$hello("Tom");
		//$hello("Bob");


		$sum = function($a, $b)
		{
			return $a + $b;
		};

		$number = $sum(5, 11); //16
		//echo $number;

		// функция обратного вызова или коллбек (callback function)
		function welcome($message)
		{
			$message();
		}

		welcome(function()
		{
			//echo "Hello!";
		});


		$goodMorning = function() { echo "<h3>Good morning</h3>"; };
		$goodEvening = function() { echo "<h3>Good evening</h3>"; };

		//welcome($goodMorning);
		//welcome($goodEvening);

		//welcome(function(){ echo "<h3>Hello</h3>"; });


		//function sum($numbers, $condition)
		//{
			//$result = 0;
			//foreach ($numbers as $number) {
				//if ($condition($number))
				//{
					//$result += $number;	
				//}
			//}
			//return $result;
		//}

		//для четных чисел
		//$isEvenNumber = function($n){ return $n % 2 === 0; };

		//для положительных чисел
		//$isPositiveNumber = function($n){ return $n > 0; };


		//$myNumbers = [-2, -1, 0, 1, 2, 3, 4, 5];
		//$positiveSum = sum($myNumbers, $isPositiveNumber);
		//$evenSum = sum($myNumbers, $isEvenNumber);
		//echo "Сумма положительных чисел: $positiveSum <br /> Сумма четных чисел: $evenSum";

//=====================[Замыкания / Closure]====================================
		$number = 89;

		$showNumber = function() use($number)
		{
			echo $number;
		};

		//$showNumber();


		$a = 8;
		$b = 10;

		$closure = function($c) use($a, $b)
		{
			return $a + $b + $c;
		};

		$result = $closure(22);
		//echo $result; //40

//=====================[Стрелочные функции (arrow function)]====================
		$a = 8;
		$b = 10;

		$closure = fn($c) => $a + $b + $c;

		$result = $closure(22); //40

		//аналогично
		$closure = function($c) use($a, $b)
		{
			return $a + $b + $c;
		};


		/* Также стрелочные функции могут применяться в качестве параметров 
		функции */
		function sum($numbers, $condition)
		{
			$result = 0;
			foreach ($numbers as $number) {
				if ($condition($number))
				{
					$result += $number;
				}
			}
			return $result;
		}

		$myNumbers = [-2, -1, 0, 1, 2, 3, 4, 5];

		$positiveSum = sum($myNumbers, fn($n) => $n > 0);
		$evenSum = sum($myNumbers, fn($n) => $n % 2 === 0);
		//echo "Сумма положительных чисел: $positiveSum <br />Сумма четных чисел: $evenSum";
 
//=====================[Генераторы]=============================================
		function generator() {

			yield 21;
		}

		foreach (generator() as $number)
		{
			//echo $number; //21
		}

		function generateNumbers0()
		{
			for ($i = 10; $i <= 15; $i++) {

				yield $i;
			}
		}

		//аналогично
		//function generateNumbers0()
		//{
		    //yield 10;
		    //yield 11;
		    //yield 12;
		    //yield 13;
		    //yield 14;
		    //yield 15;
		//}

		foreach(generateNumbers0() as $index => $number)
		{
			//echo "$index - $number<br/>"; //012345
		}

		function generateNumbers1()
		{
			yield 1;
			yield from [2, 3, 4];
			yield 5;
		}

		foreach (generateNumbers1() as $number)
		{
			//echo $number; //12345
		}


		function generateNumbers($start, $end)
		{
			for ($i = $start; $i < $end; $i++){
				yield $i;
			}
		}

		foreach (generateNumbers(4, 9) as $number)
		{
			//echo $number; //45678
		}
			
//=====================[Ссылки]=================================================
		$tom = "Tom";
		$sam = &$tom; //передача ссылки
		$sam = "Sam";
		//echo "tom = $tom <br>"; //tom = Sam
		//echo "sam = $sam"; //sam = Sam

		//Присвоить ссылку на переменную можно двумя способами:
		$sam = &$tom;
		//or
		$sam = & $tom;

		//-------------[Передача по ссылке]-------------------------------------
		//Стандартная передача параметра по значению
		function square0($a)
		{
			$a *= $a;
			//echo "a = $a"; //a = 25
		}

		$number0 = 5;
		square0($number0);
		//echo "<br />number = $number0<br />"; //number = 5

		//Передача параметра по ссылке
		function square(&$a)
		{
			$a *= $a;
			//echo "a = $a"; //a = 25
		}

		$number = 5;
		square($number);
		//echo "<br />number = $number"; //number = 25

		//-------------[Возвращение ссылки из функции]--------------------------
		function &checkName(&$name)
		{
			if ($name == "admin") $name = "Tom";
			return $name;
		}

		$userName = "admin";
		$checkedName = &checkName($userName);
		//echo "<br />userName: $userName"; //userName: Tom
		//echo "<br />checkedName: $checkedName"; //checkedName: Tom

//=====================[Область видимости переменной]===========================
		//-------------[Переменные в блоках цикла и условных конструкций]---
		$condition = true;
		if ($condition){
			$name ="Tom";
		}
		//echo $name; //Tom

		$i = 6;
		switch($i){
			case 5: $name = "Tom"; break;
			case 6: $name = "Bob"; break;
			default: $name = "Sam"; break;
		}
		//echo $name; //Bob

		//-------------[Локальные переменные]-----------------------------------
		function showName(){
			$name0 = "Harry";
			echo $name0;
		}

		//showName();
		//echo $name0; // так написать нельзя, так как 
            		   // переменная $name0 существует
             		   // только внутри функции showName()

		//вне функции ее параметры также не существуют

		//-------------[Статические переменные]---------------------------------
		function getCounter()
		{
			static $counter = 0;
			$counter++;
			echo $counter;
		}

		//getCounter(); //counter=1
		//getCounter(); //counter=2
		//getCounter(); //counter=3

		//-------------[Глобальные переменные]----------------------------------
		$name1 = "Mary";
		function hello1()
		{
			echo "Hello " . $name1;
		}
		//hello1(); //Warning: Undefined variable $name1

		function hello2()
		{
			global $name1;
			echo "Hello " . $name1;
		}
		//hello2(); //Hello Mary

		$name2 = "Eugene";
		function changeName()
		{
			global $name2;
			$name2 = "Winston";
		}
		changeName();
		//echo $name2; //Winston

		/* альтернатива global - обащение к глобальным переменным используя 
		встроенный массив $GLOBALS */
		$name3 = "Bill";
		function changeName1()
		{
			$username = $GLOBALS["name3"];
			echo "Old name: $username <br>";
			//изменяем значение переменной $name3
			$GLOBALS["name3"] = "Winston";
		}
		//changeName1();
		//echo "New name: " . $name3;

//=====================[Константы]==============================================
		//-------------[Оператор const]-----------------------------------------
		const PI = 3.14;
		//echo PI . "<br>";

		const PI1 = 2.1415 + 1;
		//echo PI1; //3.1415

		//-------------[Функция define]-----------------------------------------
		//define(string $name, string $value);

		define("NUMBER", 22);
		//echo NUMBER; //22

		//-------------[Магические константы]-----------------------------------
		
		// __FILE__ : хранит полный путь и имя текущего файла

		// __LINE__ : хранит текущий номер строки, которую обрабатывает интерпретатор

		// __DIR__ : хранит каталог текущего файла

		// __FUNCTION__ : название обрабатываемой функции

		// __CLASS__ : название текущего класса

		// __TRAIT__ : название текущего трейта

		// __METHOD__ : название обрабатываемого метода

		// __NAMESPACE__ : название текущего пространства имен

		// ::class/span> : полное название текущего класса

		//echo "Строка " . __LINE__ . " в файле " . __FILE__;

		//-------------[Проверка существования константы]-----------------------
		const PI2 = 3.14;

		if (!defined("PI2"))
			define("PI2", 3.14);
		else
			//echo "Константа PI2 уже определена";

//=====================[Проверка существования переменной]======================
		$e;
		//echo $e; //Warning: Undefined variable $e

		//-------------[Оператор isset]-----------------------------------------
		$message;
		if (isset($message)) //false
			echo $message;
		else 
			//echo "переменная message не определена" . "<br>"; //<-

		$message = "Hello PHP";
		if (isset($message)) //true
			//echo $message . "<br>"; //<-
		//else
			//echo "переменная message не определена" . "<br>";

		$message = null;
		if (isset($message)) //false
			echo $message;
		else
			//echo "переменная message не определена"; //<-

		//-------------[empty]--------------------------------------------------
		$message = "";
		if (empty($message)) //true
			//echo "переменная message не определена"; //<-
		//else
			//echo $message;

		//-------------[unset]--------------------------------------------------
		$f = 20;
		//echo $f; //20

		unset($f);
		//echo $f; //Warning: Undefined variable $f

//=====================[Получение и установка типа переменной. Преобразование типов]====
		//-------------[Получение типа переменной]------------------------------
		$a = 10;
		$b = "10";
		//echo gettype($a); //integer
		//echo "<br>";
		//echo gettype($b); //string

		/* is_integer($a) : возвращает значение true, если переменная $a 
		хранит целое число */

		/* is_string($a) : возвращает значение true, если переменная $a 
		хранит строку */

		/* is_double($a) : возвращает значение true, если переменная $a 
		хранит действительное число */

		/* is_numeric($a) : возвращает значение true, если переменная $a 
		представляет целое или действительное число или является строковым 
		представлением числа */

		/* is_bool($a) : возвращает значение true, если переменная $a 
		хранит значение true или false */

		/* is_scalar($a) : возвращает значение true, если переменная $a 
		представляет один из простых типов: строку, целое число, 
		действительное число, логическое значение */

		/* is_null($a) : возвращает значение true, если переменная $a 
		хранит значение null */

		/* is_array($a) : возвращает значение true, если переменная $a 
		является массивом */

		/* is_object($a) : возвращает значение true, если переменная $a 
		содержит ссылку на объект */

		$a = 10;
		$b = "10";
		//echo is_numeric($a); //1
		//echo "<br>";
		//echo is_numeric($b); //1

		//-------------[Установка типа. Функция settype()]----------------------
		$a = 10.7;
		settype($a, "integer"); //true
		//echo $a; //10

		//-------------[Преобразование типов]-----------------------------------
		$boolVar = false;
		$intVar = (int)$boolVar; //0
		//echo "boolVar = $boolVar<br>intVar = $intVar";


		// (int), (integer) : преобразование в int (в целое число)

		// (bool), (boolean) : преобразование в bool

		// (float), (double), (real) : преобразование в float

 		// (string) : преобразование в строку

		// (array) : преобразование в массив

		// (object) : преобразование в object

//=====================[Операции с массивами]===================================
		//-------------[Функция is_array]---------------------------------------
		$users = ["Tom", "Bob", "Sam"];
		$isArray = is_array($users);
		//echo ($isArray==true)?"is array":"it's not an array";

		//-------------[Функции count/sizeof]-----------------------------------
		$number = count($users);
		// то же самое, что
		// $number = sizeof($users);

		//echo "В массиве users $number элемента/ов";

		//-------------[Функция shuffle]----------------------------------------
		$users = ["Tom", "Bob", "Sam", "Alice"];
		//shuffle($users);
		//print_r($users);
		// один из возможных вариантов
		// Array ( [0] => Alice [1] => Bob [2] => Sam [3] => Tom )

		//-------------[Функция compact]----------------------------------------
		$model = "Apple II";
		$producer = "Apple";
		$year = 1978;

		$data = compact("model", "producer", "year");
		//print_r($data); 
		//Array ( [model] => Apple II [producer] => Apple [year] => 1978 )

		//-------------[Сортировка массивов]------------------------------------
		$users = ["Tom", "Bob", "Sam", "Alice"];
		//asort($users); // отсортируется по алфавиту
		//print_r($users);
		// вывод отсортированного массива
		//Array ( [3] => Alice [1] => Bob [2] => Sam [0] => Tom )


		//Дополнительный параметр может принимать три значения:

		// SORT_REGULAR : автоматический выбор сортировки

		// SORT_NUMERIC : числовая сортировка

		// SORT_STRING : сортировка по алфавиту

		//Укажем явно тип сортировки
		//asort($users, SORT_REGULAR);
		//print_r($users);
		//Array ( [3] => Alice [1] => Bob [2] => Sam [0] => Tom )

		//отсортировать массив в обратном порядке
		//arsort($users);
		//print_r($users);
		//Array ( [0] => Tom [2] => Sam [1] => Bob [3] => Alice )

		//-------------[Сортировка по ключам]-----------------------------------
		$states = ["Spain" => "Madrid", "France" => "Paris", "Germany" => "Berlin", ];

		asort($states);
		//print_r($states);
		// массив после asort   - сортировка по значениям элементов
		// Array ( [Germany] => Berlin [Spain] => Madrid [France] => Paris )

		echo "<br>"; 

		ksort($states);
		//print_r($states);
		// массив после ksort - сортировка по ключам элементов
		// Array ( [France] => Paris [Germany] => Berlin [Spain] => Madrid )

		echo "<br>";

		// Сортировка по ключам в обратном порядке
		krsort($states);
		//print_r($states);
		// Array ( [Spain] => Madrid [Germany] => Berlin [France] => Paris )

		//-------------[Естественная сортировка]--------------------------------
		$os = array("Windows 7", "Windows 8", "Windows 10");
		asort($os);
		//print_r($os);
		// Array ( [2] => Windows 10 [0] => Windows 7 [1] => Windows 8 )

		echo "<br>";

		natsort($os);
		//print_r($os);
		// Array ( [0] => Windows 7 [1] => Windows 8 [2] => Windows 10 )

		echo "<br>";

		//естественная сортировка без учета регистра
		natcasesort($os);
		//print_r($os);
		// Array ( [0] => Windows 7 [1] => Windows 8 [2] => Windows 10 )
	?>
</body>
</html>


