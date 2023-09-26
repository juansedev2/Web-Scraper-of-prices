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
    /**
     * @var array $results is the array that contains all of the results of the scraping
    */
    protected Array $results;
    public function __construct(string $product) {
        $this->product = $product;
        $this->htmlWeb = new HtmlWeb();
        $this-> htmlDoc = new HtmlDocument();
        $this->results = [];
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
    /**
     * This function returns the results of the scraping
    */
    public function getResults(): array{
        return $this->results;
    }
    /**
     * This function order the results by upward - ASC
    */
    public function orderUpward(): static{
        
        usort($this->results, function($productC, $productN){
            
            //$productC = Currently product and $productN = Next product
            $productC = str_replace("US$", "", str_replace(',', '', $productC["price"]));  
            $productN = str_replace("US$", "", str_replace(',', '', $productN["price"]));  
            
            $productC = floatval($productC);
            $productN = floatval($productN);

            if ($productC == $productN) {
                return 0;
            }
            return ($productC < $productN) ? -1 : 1;
        });

        return $this;
    }

    public function orderFalling(): static{
        
        usort($this->results, function($productC, $productN){
            
            //$productC = Currently product and $productN = Next product
            $productC = str_replace("US$", "", str_replace(',', '', $productC["price"]));  
            $productN = str_replace("US$", "", str_replace(',', '', $productN["price"]));  
            
            $productC = floatval($productC);
            $productN = floatval($productN);

            if ($productC == $productN) {
                return 0;
            }
            return ($productC > $productN) ? -1 : 1;
        });

        return $this;
    }


}