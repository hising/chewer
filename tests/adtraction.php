<?php

require 'test.boot.php';

use Chewer\Adtraction;
use Chewer\AdtractionProduct;

$adtraction = new Adtraction(
    'https://adtraction.com/productfeed.htm?type=feed&format=XML&encoding=UTF8&epi=0&zip=1&cdelim=tab&tdelim=singlequote&sd=0&sn=0&apid=1070072049&asid=1086036436',
    [
        'status' => 'https://adtraction.com/productfeed.htm?type=status&format=XML&encoding=UTF8&epi=0&zip=1&cdelim=tab&tdelim=singlequote&sd=0&sn=0&apid=1070072049&asid=1086036436'
    ]
);