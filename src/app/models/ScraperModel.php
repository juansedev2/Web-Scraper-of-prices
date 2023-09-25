<?php
namespace Jdev2\Webscraper\app\models;

// This class represents the model of all of the scrapers
abstract class ScraperModel {

    /**
     * @var string $url is the URL of the webpage to do scraping
    */
    protected static string $url = "";
    /**
     * @var string $product is the name of the product to filter in the query string to load the $url
    */
    protected static string $product = "";

    /**
     * This function makes the scraping on the webpage
    */
    abstract public static function scrapPage();
    /**
     * This function concats the product in the url to complete the query string
    */
    protected static function concatProductWihtURL(string $product = ""){

        $product = trim($product);

        if(str_contains($product, " ")){
            $product = str_replace(" ", "+", $product);
        }

        static::$product = "k=" . $product;
        static::$url .= static::$product;
    }


}