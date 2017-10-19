<?php

namespace Chewer;

class AdrecordJson {
    private $feed;

    public function __construct($feed) {
        $this->feed = $feed;
    }

    public function import ($callback, $filter = []) {
        $json = json_decode(file_get_contents($this->feed));
        foreach($json->products as $product) {


            $is_filtered_product = True;

            foreach ($filter as $prop => $search) {
                if (!preg_match($search, $product->{$prop})) {
                    $is_filtered_product = False;
                    break;
                }
            }

            if ($is_filtered_product) {
                $adrecordProduct = new AdrecordProduct();

                $adrecordProduct->setName($product->name);
                $adrecordProduct->setDescription($product->description);
                $adrecordProduct->setCategories($product->categories);
                $adrecordProduct->setBrand($product->brand);
                $adrecordProduct->setThumbnail($product->graphicUrl);
                $adrecordProduct->setImage($product->graphicUrl);
                $adrecordProduct->setBigImage($product->graphicUrl);
                $adrecordProduct->setInStock((bool) $product->inStock);
                $adrecordProduct->setPrice((int) $product->price);
                $adrecordProduct->setOldPrice((int) $product->regularPrice);
                $adrecordProduct->setFreight((int) $product->shippingPrice);
                $adrecordProduct->setUrl($product->productUrl); //TODO: Remove affiliate link and get correct url
                $adrecordProduct->setDeliveryTime($product->deliveryTime);
                $adrecordProduct->setEan($product->EAN);
                $adrecordProduct->setSellerId($product->SKU);

                call_user_func_array($callback, [$adrecordProduct]);
            }
        }
    }
}