<?php

namespace Chewer;

use XMLReader;
use function Chewer\Utils\isFiltered;

/**
 * Class Zanox
 * @package Chewer
 */
class Zanox {
    private $feed;

    public function __construct($feed, $options = []) {
        $this->feed = $feed;
    }

    public function import ($callback, $filter = []) {
        $file = 'compress.zlib://' . $this->feed;

        $reader = new XMLReader();
        $reader->open($file);

        while($reader->read()) {
            $nodeType = $reader->nodeType;
            if (($nodeType === XMLReader::ELEMENT) && $reader->localName === 'product') {
                $is_filtered_product = isFiltered($reader->expand(), $filter);
                if ($is_filtered_product) {
                    $zanoxProduct = new ZanoxProduct();
                    $zanoxProduct->setName($product->name);
                    $zanoxProduct->setDescription($product->description);
                    $callback($zanoxProduct);
                }
            }
        }

    }
}
