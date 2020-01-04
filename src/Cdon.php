<?php

namespace Chewer;

/**
 * Class Cdon
 * @package Chewer
 */
class Cdon
{
    const SE = 'SE';
    const NO = 'NO';
    const FI = 'FI';
    const DK = 'DK';
    const EU = 'EU';

    private $fileName, $activeCategory, $defaultCountryCode;

    /**
     * Cdon constructor.
     * @param array $options
     */
    public function __construct($options = [])
    {
        $this->baseURL = "http://cdon.com/xml_files/";
        $this->fileName = "";
        $this->activeCategory = "";
        $this->defaultCountryCode = array_key_exists('countryCode', $options) ? $options['countryCode'] : self::SE;
    }

    /**
     * @param $parts
     */
    private function setFileName($parts)
    {
        $this->activeCategory = $parts[0];
        $this->fileName = "cdon_" . implode("_", $parts);
    }

    /**
     * @param null $countryCode
     * @return $this
     */
    public function album($countryCode = null)
    {
        $countryCode = $countryCode ? $countryCode : $this->defaultCountryCode;
        $this->setFileName(['album', $countryCode]);
        $this->toplist(50);
        return $this;
    }

    /**
     * @param null $countryCode
     * @return $this
     */
    public function bathroom($countryCode = null)
    {
        $countryCode = $countryCode ? $countryCode : $this->defaultCountryCode;
        $this->setFileName(['bathroom', $countryCode]);
        return $this;
    }

    /**
     * @param null $countryCode
     * @return $this
     */
    public function beauty($countryCode = null)
    {
        $countryCode = $countryCode ? $countryCode : $this->defaultCountryCode;
        $this->setFileName(['beauty', $countryCode]);
        return $this;
    }

    /**
     * @param null $countryCode
     * @return $this
     */
    public function books($countryCode = null)
    {
        $countryCode = $countryCode ? $countryCode : $this->defaultCountryCode;
        $this->setFileName(['books', $countryCode]);
        return $this;
    }

    /**
     * @param null $countryCode
     * @return $this
     */
    public function cellphone($countryCode = null)
    {
        $countryCode = $countryCode ? $countryCode : $this->defaultCountryCode;
        $this->setFileName(['cellphone', $countryCode]);
        return $this;
    }

    /**
     * @param null $countryCode
     * @return $this
     */
    public function clothing($countryCode = null)
    {
        $countryCode = $countryCode ? $countryCode : $this->defaultCountryCode;
        $this->setFileName(['clothing', $countryCode]);
        return $this;
    }

    /**
     * @param null $countryCode
     * @return $this
     */
    public function coursebooks($countryCode = null)
    {
        $countryCode = $countryCode ? $countryCode : $this->defaultCountryCode;
        $this->setFileName(['coursebooks', $countryCode]);
        return $this;
    }

    /**
     * @param null $countryCode
     * @return $this
     */
    public function digitalGames($countryCode = null)
    {
        $countryCode = $countryCode ? $countryCode : $this->defaultCountryCode;
        $this->setFileName(['digital_games', $countryCode]);
        return $this;
    }

    /**
     * @param null $countryCode
     * @return $this
     */
    public function digitalMovies($countryCode = null)
    {
        $countryCode = $countryCode ? $countryCode : $this->defaultCountryCode;
        $this->setFileName(['digital_movies', $countryCode]);
        return $this;
    }

    /**
     * @param null $countryCode
     * @return $this
     */
    public function ebooks($countryCode = null)
    {
        $countryCode = $countryCode ? $countryCode : $this->defaultCountryCode;
        $this->setFileName(['ebooks', $countryCode]);
        return $this;
    }

    /**
     * @param null $countryCode
     * @return $this
     */
    public function games($countryCode = null)
    {
        $countryCode = $countryCode ? $countryCode : $this->defaultCountryCode;
        $this->setFileName(['games', $countryCode]);
        return $this;
    }

    /**
     * @param null $countryCode
     * @return $this
     */
    public function homeAndGarden($countryCode = null)
    {
        $countryCode = $countryCode ? $countryCode : $this->defaultCountryCode;
        $this->setFileName(['home-and-garden', $countryCode]);
        return $this;
    }

    /**
     * @param null $countryCode
     * @return $this
     */
    public function homeElectronics($countryCode = null)
    {
        $countryCode = $countryCode ? $countryCode : $this->defaultCountryCode;
        $this->setFileName(['home-electronics', $countryCode]);
        return $this;
    }

    /**
     * @param null $countryCode
     * @return $this
     */
    public function household($countryCode = null)
    {
        $countryCode = $countryCode ? $countryCode : $this->defaultCountryCode;
        $this->setFileName(['household', $countryCode]);
        return $this;
    }

    /**
     * @param null $countryCode
     * @return $this
     */
    public function householdAppliances($countryCode = null)
    {
        $countryCode = $countryCode ? $countryCode : $this->defaultCountryCode;
        $this->setFileName(['household-appliances', $countryCode]);
        return $this;
    }

    /**
     * @param null $countryCode
     * @return $this
     */
    public function movies($countryCode = null)
    {
        $countryCode = $countryCode ? $countryCode : $this->defaultCountryCode;
        $this->setFileName(['movies', $countryCode]);
        return $this;
    }

    /**
     * @param null $countryCode
     * @return $this
     */
    public function outdoor($countryCode = null)
    {
        $countryCode = $countryCode ? $countryCode : $this->defaultCountryCode;
        $this->setFileName(['outdoor_dp', $countryCode]);
        return $this;
    }

    /**
     * @param null $countryCode
     * @return $this
     */
    public function personalCare($countryCode = null)
    {
        $countryCode = $countryCode ? $countryCode : $this->defaultCountryCode;
        $this->setFileName(['personal-care', $countryCode]);
        return $this;
    }

    /**
     * @param null $countryCode
     * @return $this
     */
    public function music($countryCode = null)
    {
        $countryCode = $countryCode ? $countryCode : $this->defaultCountryCode;
        $this->setFileName(['music', $countryCode]);
        return $this;
    }

    /**
     * @param null $countryCode
     * @return $this
     */
    public function shoes($countryCode = null)
    {
        $countryCode = $countryCode ? $countryCode : $this->defaultCountryCode;
        $this->setFileName(['shoes', $countryCode]);
        return $this;
    }

    /**
     * @param null $countryCode
     * @return $this
     */
    public function sportsLeisure($countryCode = null)
    {
        $countryCode = $countryCode ? $countryCode : $this->defaultCountryCode;
        $this->setFileName(['sports-and-leisure', $countryCode]);
        return $this;
    }

    /**
     * @param null $countryCode
     * @return $this
     */
    public function toys($countryCode = null)
    {
        $countryCode = $countryCode ? $countryCode : $this->defaultCountryCode;
        $this->setFileName(['toy', $countryCode]);
        return $this;
    }

    /**
     * @param null $countryCode
     * @return $this
     */
    public function tshirt($countryCode = null)
    {
        $countryCode = $countryCode ? $countryCode : $this->defaultCountryCode;
        $this->setFileName(['tshirt', $countryCode]);
        return $this;
    }

    /**
     * @param null $countryCode
     * @return $this
     */
    public function whiteGoods($countryCode = null)
    {
        $countryCode = $countryCode ? $countryCode : $this->defaultCountryCode;
        $this->setFileName(['white-goods', $countryCode]);
        return $this;
    }

    /**
     * @param null $countryCode
     * @return $this
     */
    public function englishBooks($countryCode = null)
    {
        $countryCode = $countryCode ? $countryCode : $this->defaultCountryCode;
        $this->setFileName(['english_books', $countryCode]);
        return $this;
    }

    /**
     * @param int $numberOfItems
     * @return $this
     */
    public function toplist($numberOfItems = 0)
    {
        // TODO: Check if $activeCategory support toplist
        $this->fileName .= $numberOfItems > 0 ? '_top_' . $numberOfItems : '_toplist';
        return $this;
    }

    /**
     * @return $this
     */
    public function latest()
    {
        // TODO: Check if $activeCategory support latest
        $this->fileName .= '_latest';
        return $this;
    }

    /**
     * @param $callback
     * @param array $filter
     */
    public function import($callback, $filter = [])
    {
        $uri = $this->baseURL . $this->fileName . '.xml.gz';
        $xml = simplexml_load_file(sprintf("compress.zlib://%s", $uri));
        $products = $xml->countries->country;

        foreach ($products->children() as $product) {
            $is_filtered_product = true;

            foreach ($filter as $prop => $search) {
                if (!preg_match($search, $product->{$prop})) {
                    $is_filtered_product = false;
                    break;
                }
            }

            if ($is_filtered_product) {
                $cdonProduct = new CdonProduct();
                $cdonProduct->setName((string) $product->title);
                $cdonProduct->setEan((int) $product->ean);
                $cdonProduct->setUrl((string) $product->link);
                $cdonProduct->setType((string) $product['type']);
                $cdonProduct->setSellerId((int) $product->id);
                $cdonProduct->setSupplierId((string) $product->supplier_article_number);
                $cdonProduct->setPrice((int) $product->price);
                $cdonProduct->setOldPrice((int) $product->original_price);
                $cdonProduct->setFreight((int) $product->freight);
                $cdonProduct->setThumbnail(str_replace('http', 'https', (string) $product->thumbnail));
                $cdonProduct->setImage(str_replace('http', 'https', (string) $product->images->image));
                $cdonProduct->setBigImage(str_replace('http', 'https', (string) $product->big_images->big_image));
                $cdonProduct->setReleaseDate((string) $product->release_date);
                $cdonProduct->setBookable((bool) $product->bookable);
                $cdonProduct->setDescription((string) $product->description);

                call_user_func_array($callback, [$cdonProduct]);
            }
        }
    }
}
