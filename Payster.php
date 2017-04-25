<?php
namespace root;

abstract class Payster
{
	private $balans;

	/**
	 *@object who payment (realisation abstract class Transaction)
	 *@object to whom payment (realisation abstract class Transaction)
	 *@int how much money
	 *@return if transaction true retun id transaction else null
	 */
	final protected function pay(Payster $who, Payster $whom, $money)
	{
		return $whom->setMoney($who->getMoney($money, $tax)) ? $money : null;
	}

	final private function getMoney($countMoney)
	{
		$result = null;
		if ($countMoney <= $this->balans) {
			$this->balans -= $countMoney;
			$result = $countMoney;
		}
		return $result;
	}
	final private function setMoney($money)
	{
		$result = null;
		if (is_int($money) && $money > 0) {
			$this->balans += $money;
			$result = $money;
		}
		return $result;
	}
	final protected function getBalans()
	{
		return $this->balans;
	}
}
