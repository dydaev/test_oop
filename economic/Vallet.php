<?php
namespace root\economic;

abstract class Vallet
{
	private $moneys = Array();

	public function putMoney(Money $money)
	{
		if ($this->checkCurrency($money)) {
			$this->moneys[$money->getCurrency()]->takeMoney($money);
		} else {
			$this->moneys[$money-getCurrency()] = $money;
		}
	}

	protected function getMoney($sum, $currecy = 'cvu')
	{
		if (array_key_exists($currency, $this->moneys)) {
			return $this->moneys[$currency]->giveMoney($sum);
		} else {
			echo "The vallet dont have this currecy!\n";
			return null;
		}
		$this->clearEmptyMoney();
	}

	private function clearEmptyMoney()
	{
		array_walk($this->moneys, function($currancy, $money) use ($this->money){
			if ($money->getSum() <= 0) {
				unset($this->money[$currancy]);
			}
		});
	}

	public function checkCurrency(Money $money)
	{
		return array_key_exists($money->getCurrency(),$this->moneys);
	}


}
