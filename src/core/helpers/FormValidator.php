<?php
namespace Jdev2\Webscraper\core\helpers;

class FormValidator{

    public static function sanitizeInput(string $input): string{
        return htmlentities($input, ENT_QUOTES, "UTF-8");
    }
}