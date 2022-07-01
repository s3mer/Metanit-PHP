<?php
namespace base\classes;
class Person3
{
	public $name;
	function __construct($name) { $this -> name = $name; }
}

class Employee extends Person3 {} 
?>