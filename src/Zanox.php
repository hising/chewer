<?php

namespace Chewer;

use XMLReader;
use DOMDocument;

/**
 * Class Zanox
 * @package Chewer
 */
class Zanox {
    public function __construct($feed, $options = []) {
        $this->feed = $feed;
    }

    public function import ($callback, $filter = []) {
        $file = 'compress.zlib://' . $this->feed;

        $reader = new XMLReader();
        $reader->open($file);

        while($reader->read()) {

            switch ($reader->nodeType) {
                case (XMLReader::ELEMENT):
                    if ($reader->localName == 'product') {
                        $node = $reader->expand();
                        $dom = new DOMDocument();
                        $n = $dom->importNode($node, true);
                        $dom->appendChild($n);
                        $product = json_decode(json_encode(simplexml_import_dom($n)));

                        $is_filtered_product = True;

                        foreach ($filter as $prop => $search) {
                            if (!preg_match($search, $product->{$prop})) {
                                $is_filtered_product = False;
                                break;
                            }
                        }


                        if ($is_filtered_product) {
                            $zanoxProduct = new ZanoxProduct();
                            $zanoxProduct->setName($product->name);
                            $zanoxProduct->setDescription($product->description);
                            call_user_func_array($callback, [$zanoxProduct]);
                        }
                    }
                    break;
            }
        }

    }
}
