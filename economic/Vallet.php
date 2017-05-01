<?php
namespace root\economic;

abstract class Vallet
{
	private $moneys = Array();

	public function putMoney(Money $money)
	{
		if (array_key_exists($this->moneys, $money->getCurrency())) {
			$this->moneys[$money->getCurrency()]->takeMoney($money);
		} else {
			$this->moneys[$money-getCurrency()] = $money;
		}
	}

}
