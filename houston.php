<?php
namespace root;

require_once 'vendor/autoload.php';

use root\rockets\C300;
use root\rockets\Proton;

class Houston
{
	private static $money = 50000000;


}

$FRS = FRS::getInstance();

//$FRS

$bankAtlantic = new Bank('Atlantic', 5000000);

$startPlaceA12 = new StartPlace();

$bankAtlantic->createNewAccount('Start Place A12');

		$startPlaceA12->addRocket(new C300(5));
		$startPlaceA12->addRocket($startPlaceA12->getStock()[0]->getObject(3));
		$startPlaceA12->addRocket(new Proton());

foreach($startPlaceA12->getStock() as $rocket){
	echo $rocket->getName()."\n";
	echo "count= {$rocket->getCount()}\n";
}
