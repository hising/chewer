<?php

namespace Chewer;
use XMLReader;
use DOMDocument;

class Tradedoubler {

    private $feed;

    public function __construct($feed, $options = []) {
        $this->feed = $feed;
    }

    public function import ($callback, $filter = []) {
        //$xml = simplexml_load_file(sprintf("compress.zlib://%s", $this->feed), 'SimpleXMLElement', LIBXML_NOERROR |  LIBXML_ERR_NONE);
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
                            $tdProduct = new TradedoublerProduct();
                            $tdProduct->setName($product->name);
                            $tdProduct->setDescription($product->description);
                            $tdProduct->setUrl($product->advertiserProductUrl);
                            $tdProduct->setImage($product->imageUrl);
                            $tdProduct->setPrice((int) $product->price);
                            $tdProduct->setOldPrice((int) $product->previousPrice);
                            $tdProduct->setCurrency($product->currency);
                            $tdProduct->setBrand($product->brand);
                            $tdProduct->setType($product->TDCategoryName);
                            $tdProduct->setSupplierId($product->TDProductId);
                            $tdProduct->setProgram($product->programName);

                            $tdProduct->setDeliveryTime((string) $product->deliveryTime->child);
                            $tdProduct->setFreight((string) $product->shippingCost->child);
                            $tdProduct->setInStock((boolean) $product->inStock);

                            $tdProduct->setCategories(explode(' > ', $product->merchantCategoryName));
                            $tdProduct->setEan((int) $product->ean);

                            try {
                                $tdProduct->setThumbnail($product->fields->extraImageProductSmall);
                                $tdProduct->setBigImage($product->fields->extraImageProductLarge);
                                $tdProduct->setSellerId($product->fields->advertiser_id);
                            } catch (Exception $e) {
                            }

                            $tdProduct->setFields($product->fields);

                            call_user_func_array($callback, [$tdProduct]);
                        }
                    }
                    break;
            }
        }

    }
}