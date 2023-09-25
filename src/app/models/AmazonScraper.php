<?php
namespace Jdev2\Webscraper\app\models;

use simplehtmldom\HtmlWeb;
use simplehtmldom\HtmlDocument;
use Jdev2\Webscraper\app\models\ScraperModel;

class AmazonScraper extends ScraperModel{

    /**
     * @var string $url is the URL of the webpage to do scraping
    */
    protected static string $url = "https://www.amazon.com/s?language=es_US&currency=COP&";
    /**
     * @var string $product is the name of the product to filter in the query string to load the $url
    */
    protected static string $product = "";

    /**
     * This function makes the scraping on the webpage
    */
    #Override
    public static function scrapPage(){

        static::concatProductWihtURL("pc+gamer");
        
        $webPage = new HtmlWeb();
        $webDocument = new HtmlDocument();
        $html = $webPage->load(static::$url); // Get all DOM of the specific web page
        $allNodes = $html->find("div[data-component-type]"); // Filter to an element and a specific attribute
        $allProducts = [];

        foreach ($allNodes as $node) {
            $productNode = $webDocument->load($node); // Load an specific portion or new document since an existing DOM
            // Get all of the necessary data/attributes and get the magic attribute
            $tittle = ($productNode->find("h2")[0])->plaintext ?? null;
            $url = ($productNode->find("h2 a")[0])->href ?? null ;
            //$url = "https://www.amazon.com" . $url;
            $image = ($productNode->find("img")[0])->src ?? null;
            $price = ($productNode->find("span[class=a-offscreen]")[0]->plaintext) ?? null;
            $delivery = ($productNode->find("div[class=a-row a-size-base a-color-secondary s-align-children-center]")[0]->plaintext) ?? null;
            $delivery_country = ($productNode->find("div[class=a-row a-size-base a-color-secondary s-align-children-center]")[1]->plaintext) ?? null;
            $allProducts[] = [
                "tittle" => $tittle,
                "url" => $url,
                "image" => $image,
                "price" => $price,
                "delivery" => $delivery,
                "delivery_country" => $delivery_country
            ];
        }

        static::deleteNullProducts($allProducts);
        return $allProducts;        
    }

    protected static function deleteNullProducts(&$array){
        
        foreach ($array as $key => &$products) {            
            foreach ($products as $key2 => &$value) {
                if(is_null($value)){
                    unset($array[$key]);
                }
            }
        }

    }

}