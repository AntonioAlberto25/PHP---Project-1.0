<?php

function base_path($path)
{
    return __DIR__ . '/../' . $path;
}


function view($view, $data = [])
{
    foreach ($data as $key => $value) {
        $$key = $value;
    }

    require base_path('views/template/app.php');
    
}

function viewRaw($view, $data = [])
{
    foreach ($data as $key => $value) {
        $$key = $value;
    }

     require base_path("views/{$view}.view.php");
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
    return new Core\Flash;
}

function config($key = null)
{
    $config = require base_path('dotenv.php');
    
    if(strlen($key) > 0){
        return $config[$key];
    }

    return $config;
}

function auth()
{
    // tempo de duração da sessão (7 dias)
    $duration = 7 * 24 * 60 * 60;

    // verifica se o usuário está autenticado
    if (!isset($_SESSION['auth'])) {
        return null;
    }

    // verifica expiração da sessão
    if (isset($_SESSION['login_time']) && (time() - $_SESSION['login_time'] > $duration)) {
        session_destroy();
        header('Location: /login');
        exit();
    }

    // retorna o usuário autenticado
    return $_SESSION['auth'];

}
