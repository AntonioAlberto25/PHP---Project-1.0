<?php

namespace App\Middlewares;

class AuthMiddleware
{
    public function handle()
    {
        if(!auth()){
            header('Location: /login');
        }
    }
}