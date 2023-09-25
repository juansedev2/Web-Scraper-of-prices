<?php
namespace Jdev2\Webscraper\app\controllers;

use Jdev2\Webscraper\app\controllers\BaseController;
//Import the class to get the page web
use simplehtmldom\HtmlDocument;
use simplehtmldom\HtmlWeb;
use Jdev2\Webscraper\app\models\AmazonScraper;

class StaticController extends BaseController{

    public function showLanding(){
        $amazon_results = (new AmazonScraper("pc gamer"))->scrapPage();
        return static::returnView("Index", [
            "amazon_results" => $amazon_results
        ]);
        // TODO: HACER MÉTODOS DE ORDENAMIENTO DESC Y ASCN, RETORNAR OBJETO Y PROPIEDAD, NO RESULTADO
    }
    public function show404(){
        return static::returnView("404"); // Si exisitera...
    }

}
