<?php
namespace root;

use root\Payster;
use root\Rocket;
use root\rockets\C300;
use root\rockets\Proton;

class RocketFactory extends Payster
{
	private $iron;
	private $fuell;
	private $oil;
	private $products = [
		'Proton' => ['description' => 'Spice rocket', 'price' => 5700000],
		'C300' => ['description' => 'Army rocket', 'price' => 375000]
	];

	public function addNewTypeRocket($name, $description, $price)
	{
		if ($name || $description || $price) {
			$this->products[$name] = ['description' => $description, 'price' => $price];
			return true;
		}
		return null;
	}

	public function getProducts()
	{
		return $this->products;
	}

	private function createNewRockets($type, $count)
	{
		switch ($type) {
		case "Proton":
			return new Proton($count);
			break;
		case "C300":
			return new C300($count);
			break;
		}
		return null;
	}
}

