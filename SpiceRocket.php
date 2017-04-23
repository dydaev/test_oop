<?php

namespace root;

use root\rocketInterface;

class SpiceRocket implements rocketInterface
{
	protected $name;
	protected $price;

	public function getName()
	{
		return $this->name;
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
