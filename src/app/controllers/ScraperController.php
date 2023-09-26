<?php
namespace Jdev2\Webscraper\app\controllers;

use Jdev2\Webscraper\app\models\EbayScraper;
use Jdev2\Webscraper\app\controllers\BaseController;
use Jdev2\Webscraper\app\models\MercadoLibreScraper;

class ScraperController extends BaseController{

    public function returnScraping(){
        
        $mercadoLibre = new MercadoLibreScraper("pc gamer");
        $mercadoLibre->scrapPage();
        $mercado_libre_results = $mercadoLibre->getResults();
        $ebay = new EbayScraper("pc gamer");
        $ebay->scrapPage();
        $ebay_results = $ebay->getResults();

        return static::returnView("Search", [
            "mercado_libre_results" => $mercado_libre_results,
            "ebay_results" => $ebay_results
        ]);
    }
}