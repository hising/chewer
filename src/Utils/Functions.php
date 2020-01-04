<?php

namespace Chewer\Utils;

use DOMDocument;

function isFiltered ($node, $filter) {
    $dom = new DOMDocument();
    $n = $dom->importNode($node, true);
    $dom->appendChild($n);
    $product = json_decode(json_encode(simplexml_import_dom($n)));

    foreach ($filter as $prop => $search) {
        if (!preg_match($search, $product->{$prop})) {
            return false;
            break;
        }
    }
    return true;
}