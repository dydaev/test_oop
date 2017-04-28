<?php
namespace root\economic;

use root\economic\FRS;

final class Money
{
	private static $checkSum;
	private $sum;
	private $currency;

	final public function getSum()
	{
		return $this->sum;
	}

	final public function getCurrency()
	{
		return $this->currency;
	}

	final public function giveMoney($sum)
	{
		if ($sum <= $this->getSum()) {
			self::$checkSum -= $sum;
			$this->sum -= $sum;
			return new $this( $sum, $this->currency);
		} else {
			echo "Can`t give much money, dont have much\n";
			return null;
		}
	}

	final public function takeMoney(Money $money)
	{
		if ($money->getCurrency() === $this->getCurrency()) {
			$this->sum += $money->getSum();
		} else {
			echo "Can`t take money, because they`s other currency\n";
			return null;
		}
	}

	final private function __clone() {}

	final public function __construct( $sum, $currency = 'usd')
	{
		self::$checkSum += $sum;
		$this->currency = $currency;
		$this->sum = $sum;
	}
	
	final public function __invoke($value = null)
	{
		if ($value instanceof Money) {
			return $this->takeMoney($value);
		} elseif (is_int($value)) {
			return $this->giveMoney($value);
		}
		return null;
	}

	public function __toString()
	{
		return $this->sum."({$this->currency})";
	}
}


$a = new Money(50);
$b = $a->giveMoney(20);
echo "a = {$a}, b = {$b} \n";
$a($b->giveMoney(13));
echo "a = {$a}, b = {$b} \n";
$b($a->giveMoney(2000));
echo "a = {$a}, b = {$b} \n";
