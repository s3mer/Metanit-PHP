<?php
namespace base\classes;
const adminName = "Eugene";
function printPerson($person)
{
	echo $person -> name . "<br>";
}

class Person4
{
	public $name;
	function __construct($name) { $this -> name = $name; }
}
?>