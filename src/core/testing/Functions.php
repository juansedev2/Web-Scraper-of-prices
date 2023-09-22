<?php
// This file contains functions to make testing how for example die and dump
function dd(mixed $variable){ // * dd -> die and dump
    return die(var_dump($variable));
}