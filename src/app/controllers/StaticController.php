<?php
namespace Jdev2\Webscraper\app\controllers;

use Jdev2\Webscraper\app\controllers\BaseController;
//Import the class to get the page web
use simplehtmldom\HtmlDocument;
use simplehtmldom\HtmlWeb;
use Jdev2\Webscraper\app\models\AmazonScraper;

class StaticController extends BaseController{

    public function showLanding(){

        /* $webPage = new HtmlWeb();
        $webDocument = new HtmlDocument();
        $html = $webPage->load("https://www.amazon.com/s?language=es_US&currency=COP&k=pc+gamer"); // Get all DOM of the specific web page
        $allNodes = $html->find("div[data-component-type]"); // Filter to an element and a specific attribute
        $allProducts = [];

        foreach ($allNodes as $node) {
            $productNode = $webDocument->load($node); // Load an specific portion or new document since an existing DOM
            // Get all of the necessary data/attributes and get the magic attribute
            $tittle = ($productNode->find("h2")[0])->plaintext;
            $url = ($productNode->find("h2 a")[0])->href;
            //$url = "https://www.amazon.com" . $url;
            $image = ($productNode->find("img")[0])->src;
            $price = ($productNode->find("span[class=a-offscreen]")[0]->plaintext);
            $delivery = ($productNode->find("div[class=a-row a-size-base a-color-secondary s-align-children-center]")[0]->plaintext);
            $delivery_country = ($productNode->find("div[class=a-row a-size-base a-color-secondary s-align-children-center]")[1]->plaintext);
            $allProducts[] = [
                "tittle" => $tittle,
                "url" => $url,
                "image" => $image,
                "price" => $price,
                "delivery" => $delivery,
                "delivery_country" => $delivery_country
            ];
        }
        dd($allNodes[1]->innertext); */
        $amazon_results = AmazonScraper::scrapPage();
        return static::returnView("Index", [
            "amazon_results" => $amazon_results
        ]);
    }
    public function show404(){
        return static::returnView("404"); // Si exisitera...
    }

}
