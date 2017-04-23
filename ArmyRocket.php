<?php

namespace root;

use root\rocketInterface;

class ArmyRocket implements rocketInterface
{
	private $name;

	function __construct($name)
	{
		$this->name = $name;
	}

	public function getName()
	{
		return $this->name;
	}
}
