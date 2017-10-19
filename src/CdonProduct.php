<?php

namespace Chewer;

/**
 * Class CdonProduct
 * @package Chewer
 */
class CdonProduct extends Product {

    private $releaseDate, $bookable;

    /**
     * @return mixed
     */
    public function getReleaseDate()
    {
        return $this->releaseDate;
    }

    /**
     * @param mixed $releaseDate
     */
    public function setReleaseDate($releaseDate)
    {
        $this->releaseDate = $releaseDate;
    }

    /**
     * @return mixed
     */
    public function getBookable()
    {
        return $this->bookable;
    }

    /**
     * @param mixed $bookable
     */
    public function setBookable($bookable)
    {
        $this->bookable = $bookable;
    }
    public $crawler;

    /**
     * @param $callback
     */
    public function crawl ($callback) {
        $this->crawler = $this->client->request('GET', $this->getUrl());
        call_user_func_array($callback, [$this->crawler]);
    }
}