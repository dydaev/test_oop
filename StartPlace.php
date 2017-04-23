<?php

namespace root;

use root\rocketInterface;

class StartPlace
{
	private $rockets = Array();
	
	public function addRocket(rocketInterface $rocket)
	{
		array_push($this->rockets, $rocket);
	}

}
