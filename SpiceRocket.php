<?php

namespace root;

use root\rocketInterface;

class SpiceRocket implements rocketInterface
{
	private $name;

	function __construct($name)
	{
		$this->name = $name;
	}

	public function propellant()
	{
		return 'liquid';
	}

	public function engine()
	{
		return '5TW';
	}
}
