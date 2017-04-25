<?php

namespace root;

class FRS
{
	private static $instance = null;
	public const ALL_MONEY = 42000000000;
	private static $balans;
	private static $residents = Array();

	function __construct()
	{
		self::$balans = ALL_MONEY;
		return self::getInstance();
	}
	
	private static function getInstance()
	{
		if (self::$instance === null) {
			self::$instance = new self();
		}
		return self::$instance;
	}
	
	public function addResident($nameResident)
	{
		$num = 0;
		do {
			$num = rand(10000, 99999);
		} while (array_key_exists(self::$residents, $num));
		self::$residents[$num] = $name;
	}

}
