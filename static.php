<?php

class ParentClass
{
	protected static $a;
	protected static $nameClass = __CLASS__;

	function __construct()
	{
		static::$a++;
	}

	public function getA()
	{
		echo static::$nameClass.'->'.__CLASS__.'-'.static::$a;
	}
	public function setA($a)
	{
		static::$a = $a;
	}
}

class ChildClass extends ParentClass
{
	//protected static $a;
	protected static $nameClass = __CLASS__;
	public function getB()
	{
		echo static::$nameClass.'->'.__CLASS__.'-'.self::$a;
	}
}

$a1 = new ParentClass();
$a2 = new ParentClass();
$a3 = new ParentClass();
$b1 = new ChildClass();


echo $a1->getA()." objects var a1\n";
$a2->setA('set from parent');
echo $a1->getA()." var a1\n";
echo $b1->getB()." var b1\n";
$b1->setA('set from child');
echo $a1->getA()." var a1\n";
echo $b1->getA()." var b1\n";
