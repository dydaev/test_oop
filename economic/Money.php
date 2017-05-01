<?php
namespace root\economic;

use root\economic\FRS;

final class Money
{
	private static $checkSum;
	private $sum;
	private $currency;
	private $keySum;

	public function get_key_sum()
	{
		return $this->keySum;
	}

	private function error($idError)
	{
		$errors = Array(
			1 => "Error creating money!\n"
		);
		throw new Exception($errors[$idError]);
	}

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
		if ($sum <= $this->getSum() && $sum > 0) {
			self::$checkSum -= $sum;
			$oldSum = $this->sum;
			$this->sum -= $sum;
			try{
				$this->keySum = rand(0637543202,0967823420);
				return new $this($this, $this->keySum, $sum, $this->currency);
				$this->keySum = 0;
				$this->error(1);

			} catch (Exception $error) {
				echo $error->getMessage();
				return null;
			}
		} else {
			echo "Can`t give much money, dont have much\n";
			return new $this($this, 0, $this->currency);
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

	final public function __construct($key, $keySum, $sum, $currency = 'usd')
	{
		$this->currency = $currency;
		if ($key instanceof FRS || 
				($key instanceof Money && $key->get_key_sum() === $keySum)) {
			self::$checkSum += $sum;
			$this->sum = $sum;
		} else {
			echo "BAD key for create money, it`s must be FRS or Money class!!!\n";
			//unset($this);
			$this->sum = 0;
			//$this->__destruct() ;
		}
	}
	
	final public function __invoke($value = null)
	{
		if ($value instanceof Money) {
			return $this->takeMoney($value);
		} elseif ($value && is_int($value)) {
			return $this->giveMoney($value);
		}
		return null;
	}

	function __destruct()
	{
		echo "goodbay mi love goodbay))"."\n";
	}

	public function __toString()
	{
		return $this->sum."({$this->currency})";
	}
}
