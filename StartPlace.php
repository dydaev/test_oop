<?php

namespace root;

use root\rocketInterface;

class StartPlace
{
	private $rockets = Array();
	private $money;
	
	function __construct($money)
	{
		$this->money = $money;
	}
	public function addRocket(rocketInterface $rocket)
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
