<?php

require 'test.boot.php';

use Chewer\Adrecord;
use Chewer\AdrecordProduct;

$adrecord = new Adrecord('http://feed.adrecord.com/shirtstore.json?id=de0e20780f82');
$adrecord->import(static function (AdrecordProduct $product) {
    echo($product->getName() . "\n");
}, ['name' => '/Monkey/i']);