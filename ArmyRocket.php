<?php

namespace root;

use root\Rocket;

class ArmyRocket extends Rocket 
{
	protected $name;
	protected $price;

	public function getName()
	{
		return $this->name;
	}
	
	public function propellant()
	{
		return "solid";
	}

	public function engine()
	{
		return "300KW";
	}
}
