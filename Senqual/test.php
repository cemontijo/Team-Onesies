<?php

abstract class Bar
{
	public function Test()
	{
		echo get_class($this);
	}
}

class Foo extends Bar {

	public function __construct()
	{
		
	}
	
	public function bar()
	{
		echo "lalalal";
	}
}

$bar = new Foo();
$bar->bar();
$bar->Test();
