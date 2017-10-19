<?php

namespace Chewer;

class AdrecordXML {
    private $feed;

    public function __construct($feed) {
        $this->feed = $feed;
    }

    public function import ($callback, $filter = []) {
        die("parse xml");
    }
}