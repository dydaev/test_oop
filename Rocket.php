<?php

namespace root;

use root\rocketInterface;
use root\Counter;

abstract class Rocket extends Counter implements rocketInterface
{
	protected $name;
	protected $price;

	public function getName()
	{
		return $this->name;
	}
	
	abstract public function propellant();

	abstract public function engine();
}

