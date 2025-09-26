<?php

use App\Controllers\Pedidos;
use App\Controllers\Auth;
use App\Middlewares\AuthMiddleware;
use App\Middlewares\GuestMiddleware;
use Core\Route;

(new Route())

->get('/login', [Auth\LoginController::class, 'index'], GuestMiddleware::class)
->post('/login', [Auth\LoginController::class, 'login'], GuestMiddleware::class)

->get('/register', [Auth\RegisterController::class, 'index'], GuestMiddleware::class)
->post('/register', [Auth\RegisterController::class, 'register'], GuestMiddleware::class)

->get('/logout', Auth\LogoutController::class, AuthMiddleware::class)

->get('/pedidos', Pedidos\IndexController::class, AuthMiddleware::class)
->post('/pedido/criar', Pedidos\CreateController::class, AuthMiddleware::class)
->get('/pedido/editar', [Pedidos\EditController::class, 'index'], AuthMiddleware::class)

->run();

