<?php
namespace Jdev2\Webscraper\Core;

// This class is the dependency injecto of the app
class AppInjector{

    // It must be static because it's necessary saved it in memory in time of execution
    private static array $dependencies = [];

    // To save the dependencie
    public static function set(string $name, mixed $dependence): void{
        self::$dependencies[$name] = $dependence; // Add a new dependence
    }

    // To return a specific dependence
    public static function get(string $name){
        if(array_key_exists($name, self::$dependencies)){
            return self::$dependencies[$name];
        }
    }
}