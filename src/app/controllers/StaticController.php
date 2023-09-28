<?php
namespace Jdev2\Webscraper\app\controllers;

use Jdev2\Webscraper\app\controllers\BaseController;
//use Jdev2\Webscraper\app\models\AmazonScraper;
use Jdev2\Webscraper\app\models\EbayScraper;
use Jdev2\Webscraper\app\models\MercadoLibreScraper;

class StaticController extends BaseController{

    public function showLanding(){
        return static::returnView("Index");
    }

    public function show403(){
        return static::returnView("403"); // View to 403 - forbidden
    }

    public function show404(){
        return static::returnView("404"); // View to 404 - not found
    }

}
