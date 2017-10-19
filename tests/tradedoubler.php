<?php

require 'test.boot.php';

use Chewer\Tradedoubler;
use Chewer\TradedoublerProduct;

$tradedoubler = new Tradedoubler('http://pf.tradedoubler.com/export/export?myFeed=12372831371632058&myFormat=12373201671632058');

$tradedoubler->import(function (TradedoublerProduct $product) {
    echo ($product->getName() . "\n");
}, ['name' => '/Blue/']);