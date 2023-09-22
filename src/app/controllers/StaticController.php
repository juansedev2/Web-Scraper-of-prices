<?php
namespace Jdev2\Webscraper\app\controllers;

use Jdev2\Webscraper\app\controllers\BaseController;
class StaticController extends BaseController{

    public function showLanding(){
        return static::returnView("Index");
    }
    public function show404(){
        return static::returnView("404"); // Si exisitera...
    }

}