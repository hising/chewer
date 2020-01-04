<?php

namespace Chewer;

/**
 * Class ZanoxProduct
 * @package Chewer
 */
class ZanoxProduct extends Product
{
    public $crawler;

    /**
     * @param $callback
     */
    public function crawl($callback)
    {
        $this->crawler = $this->client->request('GET', $this->getUrl());
        call_user_func_array($callback, [$this->crawler]);
    }
}
