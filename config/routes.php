<?php

use App\Controllers\DashboardController;
use App\Controllers\GetOrderController;
use Core\Route;
use App\Controllers\IndexController;
use App\Controllers\LoginController;
use App\Controllers\LogoutController;
use App\Controllers\RegisterController;

(new Route())

->get('/', DashboardController::class)

->get('/login', [LoginController::class, 'index'])
->post('/login', [LoginController::class, 'login'])

->get('/registrar', [RegisterController::class, 'index'])
->post('/register', [RegisterController::class, 'register'])

->get('/logout', LogoutController::class)

->post('/dashboard', [DashboardController::class, 'create'])

// ->get('/dashboard?=id', GetOrderController::class)

->run();

