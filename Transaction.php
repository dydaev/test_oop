<?php
namespace root;

use root\Payster;

class Transaction extends Payster
{
	protected $id;
	protected $tax;
	private $transactions = Array();

	/**
	 *@object who payment (realisation abstract class Transaction)
	 *@object to whom payment (realisation abstract class Transaction)
	 *@int how much money
	 *@return if transaction true retun id transaction else null
	 */
	protected function newTransaction(
		Bank $whoBank,
		$whoBankAccount,
		Bank $whomBank,
	       	$whomBankAccount,
		$money
	){
	
		
		$idTransaction = null;
		if ($whom->setMoney($who->getMoney($money-($money * $this->tax)))) {
			$idTransaction = $this->getNewTransactionId();
			$this->transactions[$idTransaction] = [
				'date' => Date(),
				'who' => $who->getId(),
				'whom' => $whom->getId(),
				'money' => $money,
				'tax' => $tax
			];
		}
		return $idTransaction;
	}

	final public function getTransaction($id)
	{
		return array_key_exists($this->transactions, $id) ? $this->tramsactions[$id] : null;
	}

	final public function getTax()
	{
		return $this->tax;
	}

	final public function getIdTransaction()
	{
		return $this->id;
	}

	final private function genNewTransactionId()
	{
		$id = 0;
		do {
			$id = rand(100000000000000, 999999999999999);
		} while (array_key_exists($this->transactions, $id));
		return $id;
	}
}
