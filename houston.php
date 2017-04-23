<?php

namespace root;

require_once 'vendor/autoload.php';

$c300 = new ArmyRocket('C300');
$proton = new SpiceRocket('Proton');

$startPlaceA12 = new StartPlace();

//var_dump($c300 instanceof rocketInterface);

$startPlaceA12->addRocket($c300);


