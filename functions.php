<?php

function view($view, $data = [])
{
    foreach ($data as $key => $value) {
        $$key = $value;
    }

    require 'views/template/app.php';
}

function viewRaw($view, $data = [])
{
    foreach ($data as $key => $value) {
        $$key = $value;
    }

     require "views/{$view}.view.php";
}

function dd(...$dump)
{
    echo '<pre>';
    var_dump($dump);
    die();
    echo '</pre>';
}

function abort($code)
{
    http_response_code($code);
    view($code);
    die();
}

function flash()
{
    return new Flash;
}

function config($key = null)
{
    $config = require 'dotenv.php';
    
    if(strlen($key) > 0){
        return $config[$key];
    }

    return $config;
}

