<?php

use App\Controllers\CreateOrderController;
use App\Controllers\DashboardController;
use App\Controllers\GetOrderController;
use Core\Route;
use App\Controllers\LoginController;
use App\Controllers\LogoutController;
use App\Controllers\RegisterController;

(new Route())

->get('/login', [LoginController::class, 'index'])
->post('/login', [LoginController::class, 'login'])

->get('/registrar', [RegisterController::class, 'index'])
->post('/register', [RegisterController::class, 'register'])

->get('/logout', LogoutController::class)

->get('/', DashboardController::class)

->post('/create', CreateOrderController::class, 'create')

->get('/pedido', [GetOrderController::class, 'index'])

->run();

