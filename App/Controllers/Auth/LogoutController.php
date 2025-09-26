<?php

namespace App\Controllers\Auth;


class LogoutController
{

    public function __invoke()
{
    session_destroy();
    return header('Location:/login');

}

}