<?php

require 'test.boot.php';

use Chewer\Adrecord;
use Chewer\AdrecordProduct;

$adrecord = new Adrecord('http://feed.adrecord.com/shirtstore.json?id=de0e20780f82');
$adrecord->import(function (AdrecordProduct $product) {
    echo($product->getName() . "\n");
}, ['name' => '/Monkey/i']);

/*$adrecord2 = new Adrecord('http://feed.adrecord.com/cellbes.xml?id=8e52fc1d5d64');
$adrecord2->import(function (AdrecordProduct $product) {
    echo($product->getName() . "\n");
}, []);*/