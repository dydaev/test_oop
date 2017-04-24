<?php

namespace root;

use root\rocketInterface;

abstract class Rocket implements rocketInterface
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

