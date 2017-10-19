<?php

namespace Chewer;

class Adrecord {

    private $parser;
    public function __construct($feed) {
        $extension = explode('?', pathinfo($feed, PATHINFO_EXTENSION))[0];

        switch ($extension) {
            case 'json':
                $this->parser = new AdrecordJson($feed);
                break;
            case 'xml':
                $this->parser = new AdrecordXML($feed);
                break;
        }

    }

    public function import ($callback, $filter = []) {
        $this->parser->import($callback, $filter);
    }
}


