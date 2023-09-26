<?php

// Import the SimpleRouter

use Jdev2\Webscraper\app\controllers\ScraperController;
use Pecee\SimpleRouter\SimpleRouter;
//Import the controllers
use Jdev2\Webscraper\app\controllers\StaticController;

// First, it's necessary to define the routes of the app
SimpleRouter::get('/', [StaticController::class, "showLanding"]);
SimpleRouter::get('/search', [ScraperController::class, "returnScraping"]);
SimpleRouter::get('/about', function() {
    return "about";
});

// Then, finally start the routing
SimpleRouter::start();