<?php 
		#+--------------------------------+
		#|          PHP 8.1.4             |
		#+--------------------------------+

###########################[Объектно-ориентированное программирование]##########

//=========================[Объекты и классы]===================================
	/* Описанием объекта является класс, а объект представляет экземпляр этого 
	класса. */

	//class Person{}

	//$person = new Person();
	//print_r($person); //Person Object ( )

	// $person - объект класса Person

	/* При этом неважно, определяется класс до или после создания объекта. 
	Например, мы можем сначала определить переменную класса, а потом определить 
	этот класс: */

	//$person = new Person();

	//class Person {}

	//---------------------[Свойства и методы]----------------------------------

	class Person
	{
		public $name, $age;

		function hello()
		{
			echo "Hello!<br>";
		}
	}

	$eugene = new Person();
	$eugene -> name = "Eugene"; // установка свойства $name
	$eugene -> age = 25; // установка свойства $age
	$personName = $eugene -> name; // получение значения свойства $name

	//echo "Имя пользователя: " . $personName . "<br>";

	//$eugene -> hello(); // вызов метода hello()

	//print_r($eugene); //Person Object ( [name] => Eugene [age] => 25 )

	class Person1
	{
		// Cвойствам можно задать в классе некоторые начальные значения
		public $name = "Undefined", $age = 18;

		function hello()
		{
			echo "Hello!<br>";
		}
	}

	$tom = new Person1();
	$tom -> age = 36; // установка свойства $age

	//echo "Имя пользователя: " . $tom -> name . "<br>";
	//echo "Возраст пользователя: " . $tom -> age . "<br>";

	//---------------------[Ключевое слово this]--------------------------------
	/* Для обращения к свойствам и методам объекта внутри его класса применяется 
	ключевое слово this */

	class Person2
	{
		public $name = "Undefined", $age = 18;

		function displayInfo()
		{
			echo "Name: " . $this -> name . "; Age: " . $this -> age . "<br>"; 
			// также можно написать
			// echo "Name: $this->name; Age: $this->age<br>";
		}
	}

	$bob = new Person2();
	$bob -> name = "Bob";
	//$bob -> displayInfo(); // Name: Bob; Age: 18

	$kate = new Person2();
	$kate -> name = "Kate";
	$kate -> age = 22;
	//$kate -> displayInfo(); // Name: Kate; Age: 22

	//---------------------[Сравнение объектов]---------------------------------

	/* При сравнении объектов классов следует принимать во внимание ряд 
	особенностей. В частности, при использовании оператора равенства == два 
	объекта считаются равными, если они представляют один и тот же класс и их 
	свойства имеют одинаковые значения.

	А при использовании оператора эквивалентности === оба объекта считаются 
	равными, если обе переменных классах указывают на один и тот же экземпляр 
	класса. */

	class Person3
	{
		public $name, $age;

		function displayInfo()
    	{
        	echo "Name: $this->name; Age: $this->age<br>";
    	}
	}

	$masha = new Person3();
	$masha -> name = "Masha";
	$masha -> age = 24;

	$maria = new Person3();
	$maria -> name = "Masha";
	$maria -> age = 24;

	//if ($masha == $maria) echo "переменные masha и maria равны<br>"; //true
	//else echo "переменные masha и maria НЕ равны<br>";

	//if ($masha === $maria) echo "переменные masha и maria эквивалентны<br>";
	//else echo "переменные masha и maria НЕ эквивалентны<br>"; //false


	// когда обе переменных представляют один и тот же объект:

	$person = new Person3();

	$bart = $person;
	$bart -> name = "Bart";
	$bart -> age = 14;

	$bartholomew = $person;

	//if ($bart == $bartholomew) echo "переменные bart и bartholomew равны<br>"; //true
	//else echo "переменные bart и bartholomew НЕ равны<br>";

	//if ($bart === $bartholomew) echo "переменные bart и bartholomew эквивалентны<br>"; //true
	//else echo "переменные bart и bartholomew НЕ эквивалентны<br>";

//=========================[Конструкторы и деструкторы]=========================

	/* Конструкторы представляют специальные методы, которые выполняются при 
	создании объекта и служат для начальной инициализации его свойств. */

	class Person4
	{
		public $name, $age;

		function __construct($name, $age)
		{
			$this -> name = $name;
			$this -> age = $age;
		}

		function displayInfo()
		{
			echo "Name: $this->name; Age: $this->age <br>";
		}
	}

	$roma = new Person4("Roma", 24);
	//$roma -> displayInfo(); // Name: Roma; Age: 24

	$andrew = new Person4("Andrew", 25);
	//$andrew -> displayInfo(); // Name: Andrew; Age: 25

	//---------------------[Параметры по умолчанию]-----------------------------

	class Person5
	{
		public $name, $age;

		function __construct($name = "Homer", $age = 37)
		{
			$this -> name = $name;
			$this -> age = $age;
		}

		function displayInfo()
		{
			echo "Name: $this->name; Age: $this->age <br>";
		}
	}

	$homer = new Person5();
	//$homer -> displayInfo(); // Name: Homer; Age: 37

	$james = new Person5("James"); 
	//$james -> displayInfo(); // Name: James; Age: 37

	$dan = new Person5("Dan", 33);
	//$dan -> displayInfo(); // Name: Dan; Age: 33

	//---------------------[Объявление свойств через конструктор]---------------

	/* Любой параметр конструктора, который имеет модификатор доступа, например, 
	public, будет автоматически представлять новое свойство. */

	class Person6
	{
		function __construct(public $name, public $age)
		{
			$this -> name = $name;
			$this -> age = $age;
		}

		function displayInfo()
		{
			echo "Name: $this->name; Age: $this->age <br>";
		}
	}

	$harry = new Person6("Harry", 44);
	//$harry -> displayInfo(); // Name: Harry; Age: 44


	// Можно сочетать оба способа объявления переменных:

	class Person7
	{
		public $name;

		function __construct($name, public $age)
		{
			$this -> name = $name;
			$this -> age = $age;
		}

		function displayInfo()
		{
			echo "Name: $this->name; Age: $this->age <br>";
		}
	}


	/* При подобном объявлении свойств также можно передавать им значения по 
	умолчанию: */

	class Person8
	{
		public $name;

		function __construct($name = "Danny", public $age = 27)
		{
			$this -> name = $name;
			$this -> age = $age;
		}

		function displayInfo()
		{
			echo "Name: $this->name; Age: $this->age <br>";
		}
	}

	$danny = new Person8();
	//$danny -> displayInfo(); // Name: Danny; Age: 27

	//---------------------[Деструкторы]----------------------------------------

	/* Деструкторы служат для освобождения ресурсов, используемых программой - 
	для освобождения открытых файлов, открытых подключений к базам данных и т.д. 
	Деструктор объекта вызывается самим интерпретатором PHP после потери 
	последней ссылки на данный объект в программе. */

	class Person9
	{
		public $name, $age;

		function __construct($name, $age)
		{
			$this -> name = $name;
			$this -> age = $age;
		}

		function getInfo()
		{
			echo "Name: $this->name; Age: $this->age <br>";
		}

		function __destruct()
		{
			echo "Вызов деструктора";
		}
	}

	/* Функция деструктора определяется без параметров, и когда на объект не 
	останется ссылок в программе, он будет уничтожен, и при этом будет вызван 
	деструктор. */

//=========================[Анонимные классы]===================================
	/* Анонимные классы - это классы, которые не имеют имени. Обычно такие 
	классы полезны, если нам необходимо один раз создать объект подобного 
	класса. И больше этот класс не будет использоваться. */
	
	$person1 = new class {};

	//print_r($person1); // class@anonymous Object ( )

	// Анонимные классы, как и обычные классы могут определять свойства и методы.

	$person2 = new class {

		public $name;

		function sayHello() {
			echo "Hello! <br>";
		}
	};

	//$person2 -> sayHello();
	$person2 -> name = "Hank";

	//echo "Name: " . $person2 -> name . "<br>";


	// Также анонимные классы могут определять конструкторы:

	$person3 = new class("Matt") { //вызов конструктора идет сразу

		public $name;

		function __construct($name)
		{
			$this -> name = $name;
		}

		function sayHello() {
			echo "Hello! <br>";
		}
	};

	//echo "Hello, " . $person3 -> name . "<br>"; //Hello, Matt


	/* Подобным образом можно определять свойства сразу в конструкторе, 
	сократив тем самым определение класса: */

	$person4 = new class("Matt", 36) {

		function __construct(public $name, public $age)
		{
			$this -> name = $name;
		}

		function displayInfo()
		{
			echo "Name: $this->name; Age: $this->age <br>";
		}
	};

	//$person4 -> displayInfo(); //Name: Matt; Age: 36

//=========================[Наследование]=======================================

	class Person10 // Родительский или базовый класс
	{
		public $name;

		function __construct($name)
		{
			$this -> name = $name;
		}

		function displayInfo()
		{
			echo "Name: $this->name <br>";
		}
	}

	class Employee extends Person10 // Класс-наследник или производный класс
	{}

	$lisa = new Employee("Lisa");
	//$lisa -> displayInfo(); // Name: Lisa

	//---------------------[Переопределение функционала]------------------------

	class Person11
	{
		public $name;

		function __construct($name)
		{
			$this -> name = $name;
		}

		function displayInfo()
		{
			echo "Name: $this->name <br>";
		}
	}

	class Employee1 extends Person11 
	{
		public $company;

		function __construct($name, $company)
		{
			$this -> name = $name;
			$this -> company = $company;
		}

		function displayInfo()
		{
			echo "Name: $this->name <br>";
			echo "Works at $this->company <br>";
		}
	}

	$frank = new Employee1("Frank", "Microsoft");
	//$frank -> displayInfo(); // Name: Frank
							 // Works at Microsoft

	//---------------------[Вызов функционала родительского класса]-------------

	/* Если нам надо обратиться к методу родительского класса, то мы можем 
	использовать ключевое слово parent, после которого используется двойное 
	двоеточие :: и затем вызываемый метод. */

	class Person12
	{
		public $name;

		function __construct($name)
		{
			$this -> name = $name;
		}

		function displayInfo()
		{
			echo "Name: $this->name <br>";
		}
	}

	class Employee2 extends Person12 
	{
		public $company;

		function __construct($name, $company)
		{
			parent::__construct($name);
			$this -> company = $company;
		}

		function displayInfo()
		{
			parent::displayInfo();
			echo "Works at $this->company <br>";
		}
	}

	$greg = new Employee2("Greg", "Microsoft");
	//$greg -> displayInfo(); // Name: Greg
							// Works at Microsoft

	/* Мы также можем вызывать функционал родительского класса через имя этого 
	класса: */

	class Employee3 extends Person12 
	{
		public $company;

		function __construct($name, $company)
		{
			Person12::__construct($name);
			$this -> company = $company;
		}

		function displayInfo()
		{
			Person12::displayInfo();
			echo "Works at $this->company <br>";
		}
	}

	//---------------------[Оператор instanceof]--------------------------------

	/* Оператор instanceof позволяет проверить принадлежность объекта 
	определенному классу. */

	class Person13
	{
		public $name;

		function __construct($name)
		{
			$this -> name = $name;
		}

		function displayInfo()
		{
			echo "Name: $this->name <br>";
		}
	}

	class Employee4 extends Person13 
	{
		public $company;

		function __construct($name, $company)
		{
			Person13::__construct($name);
			$this -> company = $company;
		}

		function displayInfo()
		{
			Person13::displayInfo();
			echo "Works at $this->company <br>";
		}
	}

	class Manager {}

	$david = new Employee4("David", "Google");

	/* Слева от оператора располагается объект, котоый надо проверить, а 
	справа - название класса. И если объект представляет класс, то оператор 
	возвращает true. */

 	//var_dump($david instanceof Employee4); // bool(true) 
	//var_dump($david instanceof Person13); // bool(true) 
	//var_dump($david instanceof Manager); // bool(false)

	//---------------------[Запрет наследования и оператор final]---------------

	class Person14
	{
		public $name;

		function __construct($name)
		{
			$this -> name = $name;
		}

		final function displayInfo() //запретить переопределения этого метода
		{
			echo "Name: $this->name <br>";
		}
	}

	class Employee5 extends Person14 
	{
		public $company;

		function __construct($name, $company)
		{
			Person14::__construct($name);
			$this -> company = $company;
		}

		//function displayInfo() //Fatal error: Cannot override final method Person14::displayInfo()
		//{
			//Person14::displayInfo();
			//echo "Works at $this->company <br>";
		//}

		function displayEmployeeInfo()
		{
			Person14::displayInfo();
			echo "Works at $this->company <br>";
		}
	}

	$chris = new Employee5("Chris", "Apple");
	//$chris -> displayEmployeeInfo(); // Name: Chris
									 // Works at Apple


	final class Person15 // запретить наследование от этого класса
	{
		public $name;

		function __construct($name)
		{
			$this -> name = $name;
		}

		final function displayInfo()
		{
			echo "Name: $this->name <br>";
		}
	}

	//class Teacher extends Person15 {} // Fatal error: Class Teacher cannot extend final class Person15

//=========================[Модификаторы доступа]===============================

	/* public - к свойствам и методам, объявленным с данным модификатором, можно 
	обращаться из внешнего кода и из любой части программы

	protected - свойства и методы с данным модификатором доступны из текущего 
	класса, а также из классов-наследников

	private - свойства и методы с данным модификатором доступны только из 
	текущего класса */

	class Modifier
	{
		public $publicA = "public";
		protected $protectedA = "protected";
		private $privateA = "private";

		public function getPublicMethod()
		{
			echo "public method <br>";
		}

		protected function getProtectedMethod()
		{
			echo "protected method <br>";
		}

		private function getPrivateMethod()
		{
			echo "privat method <br>";
		}

		function test()
		{
			$this -> getPublicMethod();
			$this -> getProtectedMethod();
			$this -> getPrivateMethod();

			echo "<br>";

			echo "$this->publicA <br>";
			echo "$this->protectedA <br>";
			echo "$this->privateA <br>";
		}

		/* Из любого метода этого класса мы можем обратиться к любом методу и 
		любому свойству. Если метод не имеет модификатора доступа, то по 
		умолчанию его видимость аналогична модификатору public. */
	}

	$modifier = new Modifier();
	//$modifier -> test(); // public method
					 // protected method
					 // privat method

					 // public
					 // protected
					 // private

	class Item extends Modifier
	{
		function test()
		{
			$this -> getPublicMethod();
			$this -> getProtectedMethod();
			//$this -> getPrivateMethod(); // Fatal error: Call to private method

			echo "<br>";

			echo "$this->publicA <br>";
			echo "$this->protectedA <br>";
			//echo "$this->privateA <br>"; // Warning: Undefined property
		}

		/* Классу-наследнику доступны все свойства и методы с модификаторами 
		public и protected, но недоступны методы и свойства с модификатором 
		private. */
	}

	$item = new Item();
	//$item -> test();


	// Использование класса Modifier во внешнем коде:

	$mod = new Modifier();
	//echo $mod -> publicA;
	//echo $mod -> protectedA; // Fatal error: Cannot access protected property
	//echo $mod -> privateA; // Fatal error: Cannot access private property

	echo "<br>";

	//$mod -> getPublicMethod();
	//$mod -> getProtectedMethod(); // Fatal error: Call to protected method
	//$mod -> getPrivateMethod(); // Fatal error: Call to private method

	/* При использовании объектов данного класса нам доступны только публичные 
	методы и свойства, а свойства и методы с модификаторами private и protected 
	не доступны. */

	//---------------------[Доступ к методам и свойствам объекта]---------------

	class Account
	{
		private $sum = 0;

		function __construct($sum)
		{
			$this -> sum = $sum;
		}

		function getSumFrom($otherAccount, $money)
		{
			$otherAccount -> sum -= $money; //400-200=200
			$this -> sum += $money; //100+200=300
		}

		function printSum()
		{
			echo "На счете $this->sum у.е. <br>"; //300
		}
	}

	$acc1 = new Account(100);
	$acc2 = new Account(400);

	$acc1 -> getSumFrom($acc2, 200);
	//$acc1 -> printSum(); // На счете 300 у.е.

	//print_r($acc1); // Account Object ( [sum:Account:private] => 300 )
	echo "<br>";
	//print_r($acc2); // Account Object ( [sum:Account:private] => 200 )

	/* Класс Account представляет условный класс банковского счета. В приватной 
	переменной $sum хранится сумма на счете.

	В методе getSumFrom() в качестве параметра получаем объект этого же класса 
	Account и сумму перевода. И поскольку объект представляет тот же класс 
	Account, то мы можем обратиться к его свойствам и методам с модификаторами 
	private или protected.

	И таким образом, выполнить условный денежный перевод с счета на счет. */

//=========================[Статические методы и свойства]======================

	/* Статические методы и свойства создаются один раз для всего класса и 
	относятся ко всему классу, тогда для нестатических свойств и методов 
	создается отдельная копия для каждого объекта. */

	class Person16
	{
		public $name, $age;
		static $retirementAge = 65;

		function __construct($name, $age)
		{
			$this -> name = $name;
			$this -> age = $age;
		}

		function sayHello()
		{
			echo "Привет, меня зовут $this->name <br>";
		}

		static function printPerson($person)
		{
			echo "Имя: $person->name Возраст: $person->age <br>";
			// в статических методах можно обращаться к статическим методам и свойствам
			echo "Пенсионный возраст: " . self::$retirementAge . "<br>";
			// но нельзя обращаться к нестатическим методам и свойствам
			//echo "Имя: " . $this -> name . "<br>"; // так нельзя
			//$this -> sayHello(); // так нельзя
		}

		/* Для обращения к статическим свойствам и методам внутри класса вместо 
		имени класса может применяться ключевое слово self. */

		function checkAge()
		{
			if ($this -> age >= self::$retirementAge)
				echo "Пора на пенсию";
			else
				echo "До пенсии еще " . (Person16::$retirementAge - $this -> age) . " лет <br>";
		}
	}

	/* При обращении к статическим методам и свойствам используется имя класса 
	и оператор ::, вместо операции доступа ->, так как статический метод 
	относится ко всему классу, а не к конкретному объекту этого класса. */

	$dave = new Person16("Dave", 40);	
	//вызов нестатического метода
	//$dave -> sayHello();

	//вызов статического метода
	//Person16::printPerson($dave);
	//обращение к статическому свойству
	//echo "Пенсионный возраст: " . Person16::$retirementAge . "<br>"; 


	$mike = new Person16("Mike", 36);
	//$mike -> checkAge();


	// Статические методы и свойства также могут иметь модификаторы доступа.

	class Person17
	{
		public $name;
		private $id;
		private static $counter = 0;

		function __construct($name)
		{
			self::$counter++;
			$this -> id = self::$counter;
			$this -> name = $name;
		}

		static function getCounter()
		{
			return self::$counter;
		}

		function getId()
		{
			return $this -> id;
		}
	}

	$martin = new Person17("Martin");
	$josh = new Person17("Josh");
	//echo "$martin->name имеет id: " . $martin -> getId() . "<br>";
	//echo "$josh->name имеет id: " . $josh -> getId() . "<br>";
	//echo "Всего пользователей: " . Person17::getCounter();

//=========================[Интерфейсы]=========================================
	
	/* Интерфейс определяет абстрактный дизайн, которому должен соответствовать 
	применяющий его класс. Интерфейс определяет методы без реализации. А класс 
	затем применяет интерфейс и реализует эти методы. Применение интерфейса 
	гарантирует, что класс имеет определенный функционал, описываемый 
	интерфейсом. */

	//Обычно имя интерфейса начинается со строчной буквы "i", но это условность.

	/* Внутри блока интерфейса в фигурных скобках определяются сигнатуры 
	методов. Причем все эти методы могут быть только публичными, то есть с 
	модификатором public, либо без модификатора доступа (что аналоично 
	модификатору public) */

	interface iMessenger 
	{
		function send();
	}

	class EmailMessenger implements iMessenger
	{
		function send()
		{
			echo "Отправка сообщения на e-mail";
		}
	}
	/* Класс EmailMessenger реализует интерфейс iMessenger. Если класс применяет 
	интерфейс, то он должен реализовать все методы этого интерфейса. */

	$outlook = new EmailMessenger();
	//$outlook -> send();


	//Интерфейсы также могут наследоваться от других интерфейсов:
	interface iMessenger1
	{
		function send();
	}

	interface iEmailMessenger extends iMessenger1 {}

	class SimpleEmailMessenger implements iEmailMessenger
	{
		function send()
		{
			echo "Отправка сообщения на e-mail";
		}
	}

	$outlook1 = new SimpleEmailMessenger();
	//$outlook1 -> send();


	interface iMessenger2
	{
		function send($message);
	}

	function sendMessage(iMessenger2 $messenger, $text)
	{
		$messenger -> send($text);
	}

	class EmailMessenger1 implements iMessenger2
	{
		function send($message)
		{
			echo "Отправка сообщения на e-mail: $message";
		}
	}

	$outlook2 = new EmailMessenger1();
	//sendMessage($outlook2, "Hello World");

	/* Для отправки сообщения здесь определена функция sendMessage(), которая в 
	качестве первого параметра принимает объект мессенджера, а в качестве 
	второго параметра - отправляемый текст. Причем определение первого параметра 
	говорит, что передаваемое этому параметру значение должно реализовать 
	интерфейс iMessenger2. В самой функции мы знаем, что первый параметр - это 
	объект, который обязательно реализует интерфейс iMessenger2, поэтому мы 
	можем вызвать у него метод send() для отправки сообщения */

	//---------------------[Множественное применение интерфейсов]---------------

	interface iCamera
	{
		function makeVideo();
		function makePhoto();
	}

	interface iMessenger3
	{
		function sendMessage($message);
	}

	// Класс должен реализовать методы всех применяемых интерфейсов:
	class Mobile implements iCamera, iMessenger3
	{
		function makeVideo() { echo "Запись видео <br>";}
		function makePhoto() { echo "Съемка фото <br>";}
		function sendMessage($message) { echo "Отправка сообщения $message <br>";}
	}

	$pixel5 = new Mobile();
	//$pixel5 -> makeVideo();
	//$pixel5 -> makePhoto();
	//$pixel5 -> sendMessage("\"Google better than Apple\"");

//=========================[Абстрактные классы и методы]========================

	/* Абстрактный класс представляет частичную реализацию для 
	классов-наследников. */

	/* Одной из ключевых особенностей абстрактных классов является то, что мы 
	не можем напрямую создать объекты абстрактного класса с помощью вызова его 
	конструктора */

	abstract class Messenger {}

	//$outlook3 = new Messenger(); // Fatal error: Cannot instantiate abstract class Messenger

	/* Но другой особенностью абстрактных классов является то, что они могут 
	содержать абстрактные методы. Это методы, которые не имеют реализации. 
	Реализацию для них предоставляют классы-наследники. */

	abstract class Messenger1
	{
		abstract function send($message); // абстрактный метод
	}

	/* Абстрактные методы могут размещаться только в абстрактных классах. 
	Обычный неабстрактный класс не может иметь абстрактных методов.

	Если неабстрактный класс наследуется от абстрактного класса, то он обязан 
	реализовать все его абстрактные методы. */

	abstract class Messenger2
	{
		protected $name;

		function __construct($name)
		{
			$this -> name = $name;
		} 

		abstract function send($message);

		function close()
		{
			echo "Выход из мессенджера...";
		}
	}

	class EmailMessenger2 extends Messenger2
	{
		function send($message)
		{
			echo "$this->name отправляет сообщение: $message <br>";
		}
	}

	$telegram = new EmailMessenger2("Telegram");
	//$telegram -> send("Hello PHP 8");
	//$telegram -> close();

	/* Можно заметить, что абстрактные классы похожи на интерфейсы - и те, и 
	другие могут определять методы без реализации, которые реализуются в других 
	классах. Однако, абстрактные классы, как и обычные классы, могут иметь 
	переменные, неабстрактные методы, конструкторы, а интерфейсы нет. 
	Кроме того, в PHP один класс может наследоваться только от одного класса, 
	тогда как один класс может применять сразу несколько интерфейсов. */

//=========================[Traits]=============================================

	/* Traits представляют группу методов, которые могут быть добавлены в 
	классы. Traits позволяют определять блоки функционала и многократно 
	повторно использовать в классах без необходимости усложнять код классов, 
	которые используют эти методы. */

	trait Printer {}

	//Traits могут содержать только статические и нестатические методы.

	trait Printer1
	{
		public function printSimpleText($text) { echo "$text <br>"; }
		public function printHeaderText($text) { echo "<h2>$text</h2>"; }
	}

	class Message
	{
		use Printer1;
	}

	$myMessage = new Message();
	//$myMessage -> printSimpleText("Hello World!");
	//$myMessage -> printHeaderText("Hello PHP 8");

	/* При наследовании методы трейта переопределяют унаследованные методы с 
	тем же именем */

	class Data
	{
		function print() { echo "Print from Data"; }
	}

	trait Printer2
	{
		function print() { echo "Print from Printer"; }
	}

	class Message1 extends Data 
	{
		use Printer2;
	}

	$myMessage1 = new Message1();
	//$myMessage1 -> print(); // Print from Printer

//=========================[Копирование объектов классов]=======================

	class Person18
	{
		public $name;

		function __construct($name)
		{
			$this -> name = $name;
		}
	}

	$amanda = new Person18("Amanda");
	$zach = $amanda;

	$zach -> name = "Zach";
	//echo $amanda -> name; // Zach

	/* В данном случае после присваивания $zach = $amanda; обе переменных будут 
	указывать на один и тот же объект. Поэтому если мы поменяем свойство $name 
	у одной переменной, то это измение затронет и другую переменую. Так как они 
	ссылаются на один и тот же объект. */

	class Person19
	{
		public $name;

		function __construct($name)
		{
			$this -> name = $name;
		}
	}

	$alec = new Person19("Alec");
	$jim = clone $alec; // копируем объект из $alec в переменную $jim
	$jim -> name = "Jim";
	//echo $alec -> name; // Alec
	
	/* При применении оператора clone все свойства, которые представляют 
	примитивные типы и массивы, копируются в новый объект. Однако, что если у 
	нас свойство класса представляет другой класс: */

	class Company
	{
		public $name;
		function __construct($name) { $this -> name = $name; }
	}

	class Person20
	{
		public $name, $company;
		function __construct($name, $company)
		{
			$this -> name = $name;
			$this -> company = $company;
		}
	}

	$microsoft = new Company("Microsoft");
	$christopher = new Person20("Christopher", $microsoft);

	$suzanne = clone $christopher; // копируем объект из $christopher в переменную $suzanne
	$suzanne -> name = "Suzanne";
	$suzanne -> company -> name = "Google"; // Изменяем у Suzanne название компании
	$suzanne -> languages[0] = "french";
	//echo $christopher -> company -> name; // Google - у Christopher тоже изменилась компания


	/* Чтобы выйти из этой ситуации, необходимо в классе определить 
	метод __clone. Он вызывается при клонировании и может применяться для 
	клонирования вложенных объектов: */

	class Company1
	{
		public $name;
		function __construct($name) { $this -> name = $name; }
	}

	class Person21
	{
		public $name, $company;
		function __construct($name, $company)
		{
			$this -> name = $name;
			$this -> company = $company;
		}

		function __clone()
		{
			$this -> company = clone $this -> company;
		}
	}

	$hooli = new Company("Hooli");
	$richard = new Person21("Richard", $hooli);

	$erlich = clone $richard; // копируем объект из $richard в переменную $erlich
	$erlich -> name = "Erlich";
	$erlich -> company -> name = "Pied Piper"; // изменяем у Erlich название компании
	$erlich -> languages[0] = "french";
	//echo $richard -> company -> name; // Hooli - у Richard НЕ изменилась компания

	echo "<br>";
	print_r($hooli);
	// Company Object ( [name] => Hooli )
	echo "<br>";
	print_r($richard);
	// Person21 Object ( [name] => Richard [company] => Company Object ( [name] => Hooli ) )
	echo "<br>";
	print_r($erlich);
	/* Person21 Object ( [name] => Erlich [company] => Company Object ( [name] 
	=> Pied Piper ) [languages] => Array ( [0] => french ) ) */
?>