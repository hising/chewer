<?php

namespace Chewer;

/**
 * Class AdrecordProduct
 * @package Chewer
 */
class AdrecordProduct extends Product {

    private $brand, $categories;

    public $crawler;

    /**
     * @param $callback
     */
    public function crawl ($callback) {
        $this->crawler = $this->client->request('GET', $this->getUrl());
        call_user_func_array($callback, [$this->crawler]);
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
    public function setBrand($brand)
    {
        $this->brand = $brand;
    }

    /**
     * @return mixed
     */
    public function getCategories()
    {
        return $this->categories;
    }

    /**
     * @param mixed $categories
     */
    public function setCategories($categories)
    {
        $this->categories = $categories;
    }
}