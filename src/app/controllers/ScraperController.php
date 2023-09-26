<?php
namespace Jdev2\Webscraper\app\controllers;

use Jdev2\Webscraper\app\models\EbayScraper;
use Jdev2\Webscraper\app\controllers\BaseController;
use Jdev2\Webscraper\app\models\MercadoLibreScraper;

class ScraperController extends BaseController{

    public function returnScraping(){

        $keywords = $_GET["keywords"] ?? null;
        
        if(is_null($keywords) or empty($keywords)){
            return static::returnView("Index");
        }

        $mercadoLibre = new MercadoLibreScraper($keywords);
        $ebay = new EbayScraper($keywords);

        if(isset($_GET["order"]) and $_GET["order"] == "asc"){
            $mercadoLibre->scrapPage()->orderUpward();
            $ebay->scrapPage()->orderUpward();;        
        }else if(isset($_GET["order"]) and $_GET["order"] == "dsc"){
            $mercadoLibre->scrapPage()->orderFalling();
            $ebay->scrapPage()->orderFalling();        
        }else{
            $mercadoLibre->scrapPage();
            $ebay->scrapPage();
        }

        $mercado_libre_results = $mercadoLibre->getResults();
        $ebay_results = $ebay->getResults();

        return static::returnView("Search", [
            "mercado_libre_results" => $mercado_libre_results,
            "ebay_results" => $ebay_results
        ]);
    }
}