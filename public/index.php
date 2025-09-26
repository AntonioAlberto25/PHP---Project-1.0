<?php


require '../Core/functions.php';


spl_autoload_register(function($class) {
    // $class = str_replace('\\', DIRECTORY_SEPARATOR, $class); require base_path("../{$class}.php")    
    require "../{$class}.php";
});


session_start();

require base_path('./config/routes.php');
