<?php

namespace root;

use root\Rocket;

class StartPlace extends Payster
{
	private $rockets = Array();
	private $money;
	
	public function addRocket(Rocket $rocket)
	{
		array_push($this->rockets, $rocket);
	}

	public function getStock()
	{
		return $this->rockets;
	}
	
	public function payment($howMuchMoney)
	{
		if ($howMuchMoney <= $this->money) {
			$this->money -= $howMuchMoney;
		} else {
			return null;
		}
		return $this->money;
	}
}
