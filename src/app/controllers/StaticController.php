<?php
namespace Jdev2\Webscraper\app\controllers;

use Jdev2\Webscraper\app\controllers\BaseController;
//use Jdev2\Webscraper\app\models\AmazonScraper;
use Jdev2\Webscraper\app\models\EbayScraper;
use Jdev2\Webscraper\app\models\MercadoLibreScraper;

class StaticController extends BaseController{

    public function showLanding(){
        $mercadoLibre = new MercadoLibreScraper("pc gamer");
        $mercadoLibre->scrapPage();
        $mercado_libre_results = $mercadoLibre->getResults();
        $ebay = new EbayScraper("pc gamer");
        $ebay->scrapPage();
        $ebay_results = $ebay->getResults();
        return static::returnView("Index", [
            "ebay_results" => $ebay_results,
            "mercado_libre_results" => $mercado_libre_results
        ]);
    }
    public function show404(){
        return static::returnView("404"); // Si exisitera...
    }

}
