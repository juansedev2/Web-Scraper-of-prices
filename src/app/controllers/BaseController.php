<?php
namespace Jdev2\Webscraper\app\controllers;
class BaseController{

    protected static function returnView(string $name, Array $params = []) : void {
        extract($params);
        require "./public/views/{$name}.view.php";
    }
    protected static function redirect(string $route){
        header("Location: /$route");
    }
}