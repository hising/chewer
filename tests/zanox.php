<?php

require 'test.boot.php';

use Chewer\Zanox;
use Chewer\ZanoxProduct;

$zanox = new Zanox('http://productdata.zanox.com/exportservice/v1/rest/34840652C828938107.xml?ticket=8B8691472561713F894B9A66542E92402F44A57F3B403A4032E76A163B2B5C41&productIndustryId=1&gZipCompress=yes');

$zanox->import(function (ZanoxProduct $product) {
    echo ($product->getName() . "\n");
}, []);