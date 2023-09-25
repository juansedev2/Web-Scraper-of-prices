<?php
namespace Jdev2\Webscraper\app\models;

use simplehtmldom\HtmlWeb;
use simplehtmldom\HtmlDocument;

// This class represents the model of all of the scrapers
abstract class ScraperModel {

    /**
     * @var string $url is the URL of the webpage to search and do scraping
    */
    protected static string $url_base = "";
    /**
     * @var string $url_query is the URL that contains the url with the query string to the webpage to do scraping
    */
    protected string $url_query = "";
    /**
     * @var string $product is the name of the product to filter in the query string to load the $url
    */
    protected string $product = "";
    /**
     * @var HtmlWeb $htmlWeb is the object that represents the query objetct that get the HTML content of a spececific web page
    */
    protected HtmlWeb $htmlWeb;
    /**
     * @var HtmlDocument $htmlDoc is the object that allows get specifics fragments and manipulate it of a complete HTML doc
    */
    protected HtmlDocument $htmlDoc;

    public function __construct(string $product) {
        $this->product = $product;
        $this->htmlWeb = new HtmlWeb();
        $this-> htmlDoc = new HtmlDocument();
    }

    /**
     * This function makes the scraping on the webpage, each model can define it properly according this methods
    */
    abstract public function scrapPage();
    /**
     * This function concats the product in the url to complete the query string
    */
    protected function concatProductWihtURL(){

        trim($this->product);

        /* if(str_contains($this->product, " ")){
            $this->product = str_replace(" ", "+", $this->product);
        } */

        // This is better with this great function
        $this->product = "k=" . urlencode($this->product);
        $this->url_query = static::$url_base . $this->product;
    }


}