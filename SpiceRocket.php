<?php

namespace root;

use rootRocket;

class SpiceRocket extends Rocket
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
