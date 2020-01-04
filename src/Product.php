<?php

namespace Chewer;
use Goutte\Client;

/**
 * Class Product
 * @package Chewer
 */
class Product
{
    public $name,
        $type,
        $sellerId,
        $ean,
        $supplierId,
        $price,
        $oldPrice,
        $freight,
        $deliveryTime,
        $url,
        $inStock,
        $thumbnail,
        $image,
        $bigImage,
        $description,
        $fields,
        $currency,
        $brand,
        $program;

    protected $client;

    /**
     * Product constructor.
     * @param array $properties
     */
    public function __construct(array $properties = [])
    {
        foreach ($properties as $key => $value) {
            $this->{$key} = $value;
        }
        $this->client = new Client();
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getSellerId()
    {
        return $this->sellerId;
    }

    /**
     * @param mixed $sellerId
     */
    public function setSellerId($sellerId): void
    {
        $this->sellerId = $sellerId;
    }

    /**
     * @return mixed
     */
    public function getEan()
    {
        return $this->ean;
    }

    /**
     * @param mixed $ean
     */
    public function setEan($ean): void
    {
        $this->ean = $ean;
    }

    /**
     * @return mixed
     */
    public function getSupplierId()
    {
        return $this->supplierId;
    }

    /**
     * @param mixed $supplierId
     */
    public function setSupplierId($supplierId): void
    {
        $this->supplierId = $supplierId;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price): void
    {
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getOldPrice()
    {
        return $this->oldPrice;
    }

    /**
     * @param mixed $oldPrice
     */
    public function setOldPrice($oldPrice): void
    {
        $this->oldPrice = $oldPrice;
    }

    /**
     * @return mixed
     */
    public function getFreight()
    {
        return $this->freight;
    }

    /**
     * @param mixed $freight
     */
    public function setFreight($freight): void
    {
        $this->freight = $freight;
    }

    /**
     * @return mixed
     */
    public function getDeliveryTime()
    {
        return $this->deliveryTime;
    }

    /**
     * @param mixed $deliveryTime
     */
    public function setDeliveryTime($deliveryTime): void
    {
        $this->deliveryTime = $deliveryTime;
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param mixed $url
     */
    public function setUrl($url): void
    {
        $this->url = $url;
    }

    /**
     * @return mixed
     */
    public function getInStock()
    {
        return $this->inStock;
    }

    /**
     * @param mixed $inStock
     */
    public function setInStock($inStock): void
    {
        $this->inStock = $inStock;
    }

    /**
     * @return mixed
     */
    public function getThumbnail()
    {
        return $this->thumbnail;
    }

    /**
     * @param mixed $thumbnail
     */
    public function setThumbnail($thumbnail): void
    {
        $this->thumbnail = $thumbnail;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image): void
    {
        $this->image = $image;
    }

    /**
     * @return mixed
     */
    public function getBigImage()
    {
        return $this->bigImage;
    }

    /**
     * @param mixed $bigImage
     */
    public function setBigImage($bigImage): void
    {
        $this->bigImage = $bigImage;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description): void
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getFields()
    {
        return $this->fields;
    }

    /**
     * @param mixed $fields
     */
    public function setFields($fields): void
    {
        $this->fields = $fields;
    }

    /**
     * @return mixed
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @param mixed $currency
     */
    public function setCurrency($currency): void
    {
        $this->currency = $currency;
    }

    /**
     * @return mixed
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * @param mixed $brand
     */
    public function setBrand($brand): void
    {
        $this->brand = $brand;
    }
    /**
     * @return mixed
     */
    public function getProgram()
    {
        return $this->program;
    }

    /**
     * @param mixed $program
     */
    public function setProgram($program): void
    {
        $this->program = $program;
    }

    public function toJson()
    {
        return json_encode($this->toArray(), JSON_THROW_ON_ERROR, 512);
    }

    public function toArray()
    {
        return [
            'name' => $this->name,
            'type' => $this->type,
            'sellerId' => $this->sellerId,
            'ean' => $this->ean,
            'supplierId' => $this->supplierId,
            'price' => $this->price,
            'oldPrice' => $this->oldPrice,
            'freight' => $this->freight,
            'deliveryTime' => $this->deliveryTime,
            'url' => $this->url,
            'inStock' => $this->inStock,
            'thumbnail' => $this->thumbnail,
            'image' => $this->image,
            'bigImage' => $this->bigImage,
            'description' => $this->description,
            'fields' => $this->fields,
            'currency' => $this->currency,
            'brand' => $this->brand,
            'program' => $this->program
        ];
    }
}
