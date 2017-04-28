<?php

namespace root;

use root\Transaction;
use root\FRS;

class Bank extends Transaction
{
	private $balans;
	private $bankName;
        private $bankId;//{\d}5
        private $accounts = Array();	

	function __construct($bankName, $credit)
	{
		$this->bankName = $bankName;
		$this->bankId = FRS::getInstance()->addResident($this->bankName);
		$this->balance = FRS::getInstance()->getCredit($this, $credit);
	}

	public function getBankId()
	{
		return $this->bankId;
	}

	public function getName()
	{
		return $this->bankName;
	}

	public function createNewAccount($name)
	{
		$num; //{3-6}1{\d}5{\d}9{\d}1
		$paySystem;
		do{
			$paySystem = rand(3, 6);
			$num = $paySystem.$this->bankId.rand(100000000, 999999999);
			$num1 = '';//https://ru.wikipedia.org/wiki/%D0%90%D0%BB%D0%B3%D0%BE%D1%80%D0%B8%D1%82%D0%BC_%D0%9B%D1%83%D0%BD%D0%B0
			for($i = 0; $i < count($num); $i++) {
				if ($i % 2) {
					if ($num[$i] * 2 >= 10) {
						$num1 += ((int)($num[$i] * 2)/10) + ($num[$i] * 2) % 10;
					} else { 
						$num1 += $num[$i] * 2;
					}
				} else {
					$num1 += $num[$i];
				}
			}
			$num = $num.($num1 % 10);
		}while(array_filter($this->accounts, function($acc) use ($num)
		{
			return $acc->accountNumber == $num ? false : true;
		}));
		$this->accounts[$num] =  Account($name, $bankId, $num);
		return $num;
	}

	public function getCredit(Account $acc, $sum)
	{
		if ($this->getBalans > $sum) {
			$this->pay($this, $acc, $sum);
			return $sum;
		}
		echo "Bank dont give credit, is`s few money";
		return null;
	}

}

class Account extends Payster
{
	private $accountNumber;
	private $accountName;
	private $bankId;

	function __construct($number, $bankId, $name)
	{
		$this->accountNumber = $number;
		$this->accountName = $name;
		$this->bankId = $bunkId;
	}
}
