<?php

use Core\Database;
use Core\Validacao;
use App\Models\Order;

if(!auth()){
    header('Location: /login');
    exit();
}

$user_id = auth()->user_id;

$search = $_REQUEST['search'] ?? '';

$orders = Order::all($search, $user_id);

foreach ($orders as $i => $order){
    $order->numero = $i + 1;
};

   
view('dashboard', compact('orders'));