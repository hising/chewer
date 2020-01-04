<?php

namespace Chewer;

/**
 * Class AdtractionProduct
 * @package Chewer
 */
class AdtractionProduct extends Product
{
    public $crawler;

    /**
     * @param $callback
     */
    public function crawl($callback)
    {
        $this->crawler = $this->client->request('GET', $this->getUrl());
        $callback($this->crawler);
    }
}
