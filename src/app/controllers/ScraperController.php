<?php
namespace Jdev2\Webscraper\app\controllers;

use Jdev2\Webscraper\app\models\EbayScraper;
use Jdev2\Webscraper\app\controllers\BaseController;
use Jdev2\Webscraper\app\models\MercadoLibreScraper;
// Validators
use Jdev2\Webscraper\core\helpers\FormValidator;

class ScraperController extends BaseController{

    public function returnScraping(){

        $keywords = $_GET["keywords"] ?? null;

        if(is_null($keywords) or empty($keywords)){
            return static::returnView("Index");
        }

        $keywords = FormValidator::sanitizeInput($keywords);
        $mercadoLibre = new MercadoLibreScraper($keywords);
        $ebay = new EbayScraper($keywords);
        $resultScrapML = $mercadoLibre->scrapPage();
        $resultScrapEB = $ebay->scrapPage();

        if(!$resultScrapML or !$resultScrapEB){
            
            if(isset($_GET["keywords"])){
                $_GET["keywords"] = FormValidator::sanitizeInput($_GET["keywords"]);
            }else if(isset($_GET["order"])){
                $_GET["order"] = FormValidator::sanitizeInput($_GET["order"]);
            }
            return static::returnView("Index");
        }

        if(isset($_GET["order"]) and $_GET["order"] == "asc"){
            $mercadoLibre->orderUpward();
            $ebay->orderUpward();;        
        }else if(isset($_GET["order"]) and $_GET["order"] == "dsc"){
            $mercadoLibre->orderFalling();
            $ebay->orderFalling();        
        }

        $mercado_libre_results = $mercadoLibre->getResults();
        $ebay_results = $ebay->getResults();

        return static::returnView("Search", [
            "mercado_libre_results" => $mercado_libre_results,
            "ebay_results" => $ebay_results
        ]);
    }
}