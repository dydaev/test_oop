<?php

namespace root;

use root\Payster;

class FRS extends Payster
{
	private static $instance = null;
	const ALL_MONEY = 42000000000;
	private static $tax = 0.02;
	private static $balans;
	private static $residents = Array();

	private function __construct(){}
	private function __clone(){}
	
	public static function getInstance()
	{
		if (self::$instance === null) {
			self::$balans = self::ALL_MONEY;
			self::$instance = new self();
		}
		return self::$instance;
	}
	
	public function addResident($nameResident)
	{
		$num = 0;
		do {
			$num = rand(10000, 99999);
		} while (array_key_exists($num, self::$residents));
		self::$residents[$num] = ['date' => '121212', 'name' => $nameResident, 'credit' => 0];
		return $num;
	}

	public function getCredit(Bank $bank, $sum)
	{
		if (self::checkResident($bank->getBankId())) {
			if (self::$balans >= $sum) {
				self::$balans -=$sum;
				self::$residents[$bank->getBankId()]['credit'] += $sum;
				return $sum;
			}
			echo "Sorry less money in Federal Reserv System\n";
		} else {
			echo "Dont get credit, because bank {$bank->getName()} isn`t in reestr\n";
		}
		//static::pay(self(), $bank, $sum);
		return null;
	}
		

	public function checkResident($id)
	{
		return array_key_exists($id, self::$residents);
	}

}
