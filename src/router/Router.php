<?php

// Import the SimpleRouter
use Pecee\Http\Request;
use Pecee\SimpleRouter\SimpleRouter;
//Import the controllers
use Jdev2\Webscraper\app\controllers\StaticController;
use Jdev2\Webscraper\app\controllers\ScraperController;

// First, it's necessary to define the routes of the app
SimpleRouter::get('/', [StaticController::class, "showLanding"]);
SimpleRouter::get('/search', [ScraperController::class, "returnScraping"]);
// Add views to specific http error codes
SimpleRouter::get('/404', [StaticController::class, "show404"]);
SimpleRouter::get('/403', [StaticController::class, "show403"]);

SimpleRouter::error(function(Request $request, \Exception $exception) {

    switch($exception->getCode()) {
        // Page not found
        case 404:            
            //response()->redirect('/404');
            $request->setRewriteCallback([StaticController::class, "show404"]);
        // Forbidden
        case 403:
            $request->setRewriteCallback([StaticController::class, "show403"]);
            //response()->redirect('/403');
    }
    
});

// Then, finally start the routing
SimpleRouter::start();