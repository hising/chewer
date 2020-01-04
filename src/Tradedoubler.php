<?php

namespace Chewer;
use XMLReader;
use function Chewer\Utils\isFiltered;

class Tradedoubler
{
    private $feed;

    public function __construct($feed, $options = [])
    {
        $this->feed = $feed;
    }

    public function import($callback, $filter = [])
    {
        $file = 'compress.zlib://' . $this->feed;

        $reader = new XMLReader();
        $reader->open($file);

        while ($reader->read()) {
            $nodeType = $reader->nodeType;
            if ($nodeType === XMLReader::ELEMENT && $reader->localName === 'product') {
                $is_filtered_product = isFiltered($reader->expand(), $filter);
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
                    $tdProduct->setInStock((bool) $product->inStock);

                    $tdProduct->setCategories(explode(' > ', $product->merchantCategoryName));
                    $tdProduct->setEan((int) $product->ean);

                    try {
                        $tdProduct->setThumbnail($product->fields->extraImageProductSmall);
                        $tdProduct->setBigImage($product->fields->extraImageProductLarge);
                        $tdProduct->setSellerId($product->fields->advertiser_id);
                    } catch (Exception $e) {
                    }

                    $tdProduct->setFields($product->fields);

                    $callback($tdProduct);
                }
            }
        }
    }
}
