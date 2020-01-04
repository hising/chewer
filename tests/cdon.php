<?php

require 'test.boot.php';

use Chewer\Cdon;
use Chewer\CdonProduct;

$platformNames = [
    'ps4',
    'playstation 4',
    'ps 4',
    'playstation4'
];

$cdon = new Cdon();

$cdon->games()->import(static function (CdonProduct $product) {
    echo($product->toJson());
}, ['platform' => '/' . implode("|", $platformNames) . '/i']);