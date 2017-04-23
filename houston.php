<?php
namespace root;

require_once 'vendor/autoload.php';

use root\rockets\C300;
use root\rockets\Proton;

class Houston
{
	private static $money = 50000000;


}

$startPlaceA12 = new StartPlace();

for($i = 10; $i >= 0; $i--){
	if($i % 2){
		$startPlaceA12->addRocket(new C300());
	}else{
		$startPlaceA12->addRocket(new Proton());
	}
}

foreach($startPlaceA12->getStock() as $rocket){
	echo $rocket->getName()."\n";
}
