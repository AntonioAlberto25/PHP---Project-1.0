<?php

session_start();

define('SESSION_DURATION', 7 * 24 * 60 * 60);

function auth()
{
    if(!isset($_SESSION['auth'])) { return null; }       
    return $_SESSION['auth'];   
}

if(isset($_SESSION['login_time']) && (time() - $_SESSION['login_time'] > SESSION_DURATION))
{
    session_destroy();
    header('Location:/login');
    exit();
}


