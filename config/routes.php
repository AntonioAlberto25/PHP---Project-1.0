<?php

use App\Controllers\Pedidos;
use App\Controllers\Auth;
use App\Controllers\Dashboard;
use App\Controllers\Receitas;
use App\Middlewares\AuthMiddleware;
use App\Middlewares\GuestMiddleware;
use Core\Route;

(new Route())

->get('/', Dashboard\DashboardController::class, AuthMiddleware::class)

->get('/login', [Auth\LoginController::class, 'index'], GuestMiddleware::class)
->post('/login', [Auth\LoginController::class, 'login'], GuestMiddleware::class)

->get('/register', [Auth\RegisterController::class, 'index'], GuestMiddleware::class)
->post('/register', [Auth\RegisterController::class, 'register'], GuestMiddleware::class)

->get('/logout', Auth\LogoutController::class, AuthMiddleware::class)

->get('/pedidos', Pedidos\IndexController::class, AuthMiddleware::class)
->post('/pedido/criar', Pedidos\CreateController::class, AuthMiddleware::class)
->get('/pedido/editar', [Pedidos\EditController::class, 'index'], AuthMiddleware::class)

->get('/receitas', Receitas\IndexController::class, AuthMiddleware::class)

->get('/receitas/criar', [Receitas\CreateController::class, 'index'], AuthMiddleware::class)
->post('/receitas/criar', [Receitas\CreateController::class, 'create'], AuthMiddleware::class)

->get('/receitas/edit', [Receitas\EditController::class, 'index'], AuthMiddleware::class)
->put('/receitas/edit', [Receitas\EditController::class, 'edit'], AuthMiddleware::class)

->delete('/receitas', Receitas\DeleteController::class, AuthMiddleware::class)

->run();

